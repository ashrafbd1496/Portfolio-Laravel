<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogPaginate;
use App\Models\Admin\BlogSection;
use App\Models\Admin\Category;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $language = getLanguage();
        $blogs = Blog::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $categories = Category::where('language_id', $language->id)->get();
        $blog_section = BlogSection::where('language_id', $language->id)->first();

        if (count($categories) > 0) {

            return view('admin.blog.post.index', compact( 'blogs', 'categories', 'blog_section'));

        } else{

            return redirect()->route('blog-category.create')
                ->with('success', 'content.please_create_a_category');

        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $language = getLanguage();
        $categories = Category::where('language_id', $language->id)->get();

        if (count($categories) > 0) {

            return view('admin.blog.post.create', compact(  'categories'));

        } else{

            return redirect()->route('blog-category.create')
                ->with('success', 'content.please_create_a_category');

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'category_id'   =>  'integer|required',
            'title'   =>  'required',
            'type' => 'in:with_this_account,anonymous',
            'status'   =>  'in:published,draft',
            'image_status'   =>  'in:show,hide',
            'blog_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048',
            'breadcrumb_status'   =>  'in:yes,no',
            'custom_breadcrumb_image' => 'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('blog_image')){

            // Get image file
            $blog_image_file = $request->file('blog_image');

            // Folder path
            $folder = 'uploads/img/blog/';
            $folder1 = 'uploads/img/blog/thumbnail/';

            // Make image name
            $blog_image_name = time().'-'.$blog_image_file->getClientOriginalName();

            // Resizing an uploaded file
            Image::make($request->file('blog_image'))->fit(600, 450)->save($folder1.$blog_image_name);

            // Original size upload file
            $blog_image_file->move($folder, $blog_image_name);

            // Set input
            $input['blog_image']= $blog_image_name;

        } else {
            // Set input
            $input['blog_image']= null;
        }

        if($request->hasFile('custom_breadcrumb_image')){

            // Get image file
            $custom_breadcrumb_image_file = $request->file('custom_breadcrumb_image');

            // Folder path
            $folder = 'uploads/img/blog/breadcrumb/';

            // Make image name
            $custom_breadcrumb_image_name = time().'-'.$custom_breadcrumb_image_file->getClientOriginalName();

            // Original size upload file
            $custom_breadcrumb_image_file->move($folder, $custom_breadcrumb_image_name);

            // Set input
            $input['custom_breadcrumb_image']= $custom_breadcrumb_image_name;

        } else {
            // Set input
            $input['custom_breadcrumb_image']= null;
        }


        // Set author
        $author_name = null;
        $user_id = null;

        if ($input['type'] == "with_this_account") {
            $author_name =  Auth::user()->name;
            $user_id = Auth::id();
        }

        // Find category
        $category = Category::find($input['category_id']);

        // Record to database
        Blog::create([
            'language_id' => getLanguage()->id,
            'category_name' => $category->category_name,
            'category_id' => $input['category_id'],
            'author_name' => $author_name,
            'user_id' => $user_id,
            'title' => $input['title'],
            'desc' => Purifier::clean($input['desc']),
            'short_desc' => $input['short_desc'],
            'image_status' => $input['image_status'],
            'blog_image' => $input['blog_image'],
            'type' => $input['type'],
            'tag' => $input['tag'],
            'status' => $input['status'],
            'meta_desc' => $input['meta_desc'],
            'meta_keyword' => $input['meta_keyword'],
            'breadcrumb_status' => $input['breadcrumb_status'],
            'custom_breadcrumb_image' => $input['custom_breadcrumb_image']
        ]);

        return redirect()->route('blog.index')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieving models
        $language = getLanguage();
        $blog = Blog::findOrFail($id);
        $categories = Category::where('language_id', $language->id)->get();

        return view('admin.blog.post.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id'   =>  'integer|required',
            'title'   =>  'required',
            'type' => 'in:with_this_account,anonymous',
            'status'   =>  'in:published,draft',
            'image_status'   =>  'in:show,hide',
            'blog_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048',
            'breadcrumb_status'   =>  'in:yes,no',
            'custom_breadcrumb_image' => 'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        $blog = Blog::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('blog_image')){

            // Get image file
            $blog_image_file = $request->file('blog_image');

            // Folder path
            $folder = 'uploads/img/blog/';
            $folder1 = 'uploads/img/blog/thumbnail/';

            // Make image name
            $blog_image_name = time().'-'.$blog_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$blog->blog_image));
            File::delete(public_path($folder1.$blog->blog_image));

            // Resizing an uploaded file
            Image::make($request->file('blog_image'))->fit(600, 450)->save($folder1.$blog_image_name);

            // Original size upload file
            $blog_image_file->move($folder, $blog_image_name);

            // Set input
            $input['blog_image']= $blog_image_name;

        }

        if($request->hasFile('custom_breadcrumb_image')) {

            // Get image file
            $custom_breadcrumb_image_file = $request->file('custom_breadcrumb_image');

            // Folder path
            $folder = 'uploads/img/blog/breadcrumb/';

            // Make image name
            $custom_breadcrumb_image_name =  time().'-'.$custom_breadcrumb_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$blog->custom_breadcrumb_image));

            // Original size upload file
            $custom_breadcrumb_image_file->move($folder, $custom_breadcrumb_image_name);

            // Set input
            $input['custom_breadcrumb_image']= $custom_breadcrumb_image_name;

        }

        // Set author
        if ($input['type'] == "with_this_account") {
            $input['author_name'] =  Auth::user()->name;
            $input['user_id'] = Auth::id();
        }

        // Find category
        $category = Category::find($input['category_id']);
        $input['category_name'] = $category->category_name;

        // XSS Purifier
        $input['desc'] = Purifier::clean($input['desc']);

        // Update to database
        Blog::find($id)->update($input);

        return redirect()->route('blog.index')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve a model
        $blog = Blog::find($id);

        // Folder path
        $folder = 'uploads/img/blog/';
        $folder1 = 'uploads/img/blog/thumbnail/';
        $folder2 = 'uploads/img/blog/breadcrumb/';

        // Delete Image
        File::delete(public_path($folder.$blog->blog_image));
        File::delete(public_path($folder1.$blog->blog_image));
        File::delete(public_path($folder2.$blog->custom_breadcrumb_image));

        // Delete record
        $blog->delete();

        return redirect()->route('blog.index')
            ->with('success', 'content.deleted_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_checked(Request $request)
    {
        // Get All Request
        $input = $request->input('checked_lists');

        $arr_checked_lists = explode(",", $input);

        if (array_filter($arr_checked_lists) == []) {
            return redirect()->route('blog.index')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $blog = Blog::findOrFail($id);

            // Folder path
            $folder = 'uploads/img/blog/';
            $folder1 = 'uploads/img/blog/thumbnail/';
            $folder2 = 'uploads/img/blog/breadcrumb/';

            // Delete Image
            File::delete(public_path($folder.$blog->blog_image));
            File::delete(public_path($folder1.$blog->blog_image));
            File::delete(public_path($folder2.$blog->custom_breadcrumb_image));

            // Delete record
            $blog->delete();

        }

        return redirect()->route('blog.index')
            ->with('success', 'content.deleted_successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_paginate()
    {
        // Retrieving a model
        $blog_paginate= BlogPaginate::first();

        return view('admin.blog.paginate.create', compact('blog_paginate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_paginate(Request $request)
    {
        // Form validation
        $request->validate([
            'homepage_item' => 'integer|required',
            'grid_view_paginate' => 'integer|required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        BlogPaginate::firstOrCreate([
            'homepage_item' => $input['homepage_item'],
            'grid_view_paginate' => $input['grid_view_paginate']
        ]);

        return redirect()->route('blog-paginate.create_paginate')
            ->with('success', 'content.created_successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_paginate(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'homepage_item' => 'integer|required',
            'grid_view_paginate' => 'integer|required',
        ]);

        // Get All Request
        $input = $request->all();

        // Update model
        BlogPaginate::find($id)->update($input);

        return redirect()->route('blog-paginate.create_paginate')
            ->with('success', 'content.updated_successfully');
    }

}
