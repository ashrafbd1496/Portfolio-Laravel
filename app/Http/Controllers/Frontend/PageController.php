<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Breadcrumb;
use App\Models\Admin\ColorOption;
use App\Models\Admin\Contact;
use App\Models\Admin\ContactSection;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\Page;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use App\Models\Admin\TawkTo;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($page_slug)
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

        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 'published')
            ->where('blogs.status', 'published')
            ->orderBy('blogs.id', 'desc')
            ->take(3)
            ->get();

        $blog_count_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('blogs.status', 'published')
            ->groupBy('category_id')
            ->get();

        $page = Page::where('pages.page_slug', '=', $page_slug)
            ->firstOrFail();

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


        return view('frontend.page.show', compact('page', 'site_info', 'google_analytic', 'tawk_to',
            'socials', 'color_option', 'breadcrumb', 'external_url', 'page','header_pages', 'footer_pages', 'recent_posts',
            'blog_count_categories'));
    }

}
