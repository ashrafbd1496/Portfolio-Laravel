<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Portfolio;
use App\Models\Admin\PortfolioCategory;
use App\Models\Admin\PortfolioSection;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
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
        $portfolios = Portfolio::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $categories = PortfolioCategory::where('language_id', $language->id)->get();
        $portfolio_section = PortfolioSection::where('language_id', $language->id)->first();

        if (count($categories) > 0) {

            return view('admin.portfolio.index', compact(  'portfolios', 'portfolio_section'));

        } else{

            return redirect()->route('portfolio-category.create')
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
        $categories = PortfolioCategory::where('language_id', $language->id)->get();

        if (count($categories) > 0) {

            return view('admin.portfolio.create', compact('categories'));

        } else{

            return redirect()->route('portfolio-category.create')
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
            'category_id' => 'integer|required',
            'title' => 'required',
            'image_status'   =>  'in:show,hide',
            'thumbnail_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048',
            'status' => 'in:published,draft',
            'order'   =>  'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('thumbnail_image')){

            // Get image file
            $thumbnail_image_file = $request->file('thumbnail_image');

            // Folder path
            $folder = 'uploads/img/portfolio/';

            // Make image name
            $thumbnail_image_name = time().'-'.$thumbnail_image_file->getClientOriginalName();

            // Original size upload file
            $thumbnail_image_file->move($folder, $thumbnail_image_name);

            // Set input
            $input['thumbnail_image']= $thumbnail_image_name;

        } else {
            // Set input
            $input['thumbnail_image']= null;
        }

        // Find category
        $category = PortfolioCategory::find($input['category_id']);

        // Record to database
        Portfolio::create([
            'language_id' => getLanguage()->id,
            'category_name' => $category->category_name,
            'category_id' => $input['category_id'],
            'title' => $input['title'],
            'image_status' => $input['image_status'],
            'thumbnail_image' => $input['thumbnail_image'],
            'status' => $input['status'],
            'order' => $input['order']
        ]);

        return redirect()->route('portfolio.index')
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
        $portfolio = Portfolio::findOrFail($id);
        $categories = PortfolioCategory::where('language_id', $language->id)->get();

        return view('admin.portfolio.edit', compact('portfolio', 'categories'));
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
        // Form validation
        $request->validate([
            'category_id' => 'integer|required',
            'title' => 'required',
            'image_status'   =>  'in:show,hide',
            'thumbnail_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048',
            'status' => 'in:published,draft',
            'order'   =>  'required|integer',
        ]);

        $portfolio = Portfolio::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('thumbnail_image')){

            // Get image file
            $thumbnail_image_file = $request->file('thumbnail_image');

            // Folder path
            $folder = 'uploads/img/portfolio/';

            // Make image name
            $thumbnail_image_name = time().'-'.$thumbnail_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$portfolio->thumbnail_image));

            // Original size upload file
            $thumbnail_image_file->move($folder, $thumbnail_image_name);

            // Set input
            $input['thumbnail_image']= $thumbnail_image_name;

        }

        // Find category
        $category = PortfolioCategory::find($input['category_id']);
        $input['category_name'] = $category->category_name;

        // Record to database
        Portfolio::find($id)->update($input);

        return redirect()->route('portfolio.index')
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
        $portfolio = Portfolio::find($id);

        // Folder path
        $folder1 = 'uploads/img/portfolio/';

        // Delete Image
        File::delete(public_path($folder1.$portfolio->thumbnail_image));

        // Delete record
        $portfolio->delete();

        return redirect()->route('portfolio.index')
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
            return redirect()->route('portfolio.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $portfolio = Portfolio::find($id);

            // Folder path
            $folder1 = 'uploads/img/portfolio/';

            // Delete Image
            File::delete(public_path($folder1.$portfolio->thumbnail_image));

            // Delete record
            $portfolio->delete();

        }

        return redirect()->route('portfolio.index')
            ->with('success', 'content.deleted_successfully');
    }
}
