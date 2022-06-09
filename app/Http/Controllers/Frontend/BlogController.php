<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogPaginate;
use App\Models\Admin\Breadcrumb;
use App\Models\Admin\Category;
use App\Models\Admin\ColorOption;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\Page;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use App\Models\Admin\TawkTo;
use App\Models\Frontend\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Default values
        $grid_view_paginate_limit = 9;

        // Get site language
        $language = getSiteLanguage();

        // Retrieving models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $tawk_to = TawkTo::first();
        $socials = Social::where('status', 1)->get();
        $color_option = ColorOption::first();
        $breadcrumb = Breadcrumb::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->where('status', 'enable')->first();

        $header_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 1)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $footer_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 0)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $blog_paginate = BlogPaginate::first();

        if (isset($blog_paginate)) {
            $grid_view_paginate_limit = $blog_paginate->grid_view_paginate;
        }

        $blogs = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 'published')
            ->where('blogs.status', 'published')
            ->orderBy('blogs.id', 'desc')
            ->paginate($grid_view_paginate_limit);

        return view('frontend.blog.index', compact(  'site_info', 'google_analytic', 'tawk_to',
            'socials', 'breadcrumb', 'external_url', 'header_pages', 'footer_pages', 'blogs', 'color_option'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        // Get site language
        $language = getSiteLanguage();

        // Retrieving models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $tawk_to = TawkTo::first();
        $socials = Social::where('status', 1)->get();
        $color_option = ColorOption::first();
        $breadcrumb = Breadcrumb::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->where('status', 'enable')->first();

        $header_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 1)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $footer_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 0)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $blog = Blog::where('blogs.slug', '=', $slug)
            ->firstOrFail();

        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 'published')
            ->where('blogs.status', 'published')
            ->orderBy('blogs.id', 'desc')
            ->take(3)
            ->get();

        if(isset($blog)){
            // Previous blog
            $previous_id = Blog::where('id', '<', $blog->id)->where('status', 'published')->max('id');
            $previous = Blog::where('id', $previous_id)->first();

            // Next blog
            $next_id = Blog::where('id', '>', $blog->id)->where('status', 'published')->min('id');
            $next = Blog::where('id', $next_id)->first();
            // Update view column
            Blog::find($blog->id)->update(
                ['view' => $blog->view + 1]
            );
        }

        // Get comments
        $comments = Comment::where('blog_id', '=', $blog->id)->where('approval', '=', 1)->get();

        $blog_count_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('blogs.status', 'published')
            ->groupBy('category_id')
            ->get();


        return view('frontend.blog.show', compact('site_info', 'google_analytic', 'tawk_to',
            'socials', 'breadcrumb', 'external_url', 'header_pages', 'footer_pages', 'recent_posts', 'blog',
            'comments', 'blog_count_categories', 'previous', 'next', 'color_option'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_name
     * @return \Illuminate\Http\Response
     */
    public function category_show($category_name)
    {
        // Get site language
        $language = getSiteLanguage();

        // Retrieving models
        // Retrieving models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $tawk_to = TawkTo::first();
        $socials = Social::where('status', 1)->get();
        $color_option = ColorOption::first();
        $breadcrumb = Breadcrumb::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->where('status', 'enable')->first();

        $header_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 1)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $footer_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 0)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $blogs = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.category_slug', '=', $category_name)
            ->where('blogs.status', 'published')
            ->orderBy('blogs.id', 'desc')
            ->paginate(9);

        $category =  Category::where('language_id', $language->id)
        ->where('category_slug', '=', $category_name)->first();

        if (count($blogs) < 1) {
            abort(404);
        }

        return view('frontend.blog.category-show', compact('site_info',
            'google_analytic', 'tawk_to', 'socials', 'breadcrumb', 'external_url',
              'header_pages', 'footer_pages', 'blogs', 'category', 'color_option'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Get site language
        $language = getSiteLanguage();

        // Retrieving models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $tawk_to = TawkTo::first();
        $socials = Social::where('status', 1)->get();
        $color_option = ColorOption::first();
        $breadcrumb = Breadcrumb::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->where('status', 'enable')->first();

        $header_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 1)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $footer_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 0)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        // Search
        $search = $request->get('search');

        $blogs = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 'published')
            ->where('blogs.status', 'published')
            ->where('title', 'like', '%'.$search.'%')
            ->orderBy('blogs.id', 'desc')
            ->get();

        return view('frontend.blog.search-index', compact ('site_info',
            'google_analytic', 'tawk_to', 'socials', 'breadcrumb', 'external_url',
              'header_pages', 'footer_pages', 'blogs', 'color_option'));
    }

}
