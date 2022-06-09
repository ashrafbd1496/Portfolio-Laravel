<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Breadcrumb;
use App\Models\Admin\ColorOption;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\GetOfferMessage;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\Page;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use App\Models\Admin\TawkTo;
use Illuminate\Http\Request;

class GetOfferMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        return view('frontend.get_offer.create', compact(  'site_info', 'google_analytic', 'tawk_to',
            'socials', 'breadcrumb', 'external_url', 'header_pages', 'footer_pages', 'color_option'));

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
            'name'   =>  'required|max:255',
            'email'   =>  'required|max:255',
            'phone'   =>  'required|max:255',
            'service_name'   =>  'required|max:255',
            'special_request'   =>  'required|max:500',
            'contact_question'   =>  'required|integer',
            'captcha'   =>  'required|same:contact_question',
        ]);

        // Get All Request
        $input = $request->all();

        if ($input['null_value'] != "") {
            return redirect()->back()
                ->with('warning_offer', 'frontend.please_try_again');
        }

        // Record to database
        GetOfferMessage::firstOrCreate([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'service_name' => $input['service_name'],
            'special_request' => $input['special_request'],
        ]);

        return redirect()->back()
            ->with('success_offer', 'frontend.your_message_has_been_delivered');
    }
}
