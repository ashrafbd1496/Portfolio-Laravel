<?php


use App\Models\Admin\FrontendKeyword;
use App\Models\Admin\Language;


if (session()->has('language_id_from_dropdown')) {

    $language_id_from_dropdown = session()->get('language_id_from_dropdown');

    $frontend_keywords = FrontendKeyword::where('language_id', $language_id_from_dropdown)->get();


} else {

    $language = Language::where('default_site_language', 1)->first();

    $frontend_keywords = FrontendKeyword::where('language_id', $language->id)->get();

}


if (isset($frontend_keywords)) {

    $keywords = [];
    foreach ($frontend_keywords as $frontend_keyword) {
        $keywords += [$frontend_keyword->key => $frontend_keyword->value];
    }

    return $keywords;
}
else {

    return [

        /*
        |--------------------------------------------------------------------------
        | Pagination Language Lines
        |--------------------------------------------------------------------------
        |
        | The following language lines are used by the paginator library to build
        | the simple pagination links. You are free to change them to anything
        | you want to customize your views to better match your application.
        |
        */

        // Frontend One Group Keyword
        'home' => 'Home',
        'about' => 'About',
        'services' => 'Services',
        'portfolio' => 'Portfolio',
        'blogs' => 'Blogs',
        'contact' => 'Contact',
        'pages' => 'Pages',
        'download' => 'Download',
        'read_more' => 'Read More',
        'service_name' => 'Service Name',
        'special_request' => 'Special Request',
        'your_name' => 'Your Name *',
        'your_email' => 'Your Email *',
        'your_phone' => 'Your Phone *',
        'your_subject' => 'Your Subject *',
        'your_message' => 'Your Message *',
        'send_message' => 'Send Message',
        'please_enter_code' => 'Please Enter Code',
        'helper_links' => 'Helper Links',
        'contact_info' => 'Contact Info',
        'recent_posts' => 'Recent Posts',
        'all' => 'All',
        'anonymous' => 'Anonymous',
        'search' => 'Search',
        'search_here' => 'Search Here...',
        'categories' => 'Categories',
        'tags' => 'Tags',
        'share' => 'Share',
        'comments' => 'Comments',
        'leave_a_comment' => 'Leave A Comment',
        'reply' => 'Reply',
        'your_comment' => 'Your Comment *',
        'send_comment' => 'Send Comment',
        'search_results' => 'Search Results',
        'nothing_found' => 'Nothing Found',
        'your_message_has_been_delivered' => 'Your message has been delivered.',
        'your_comment_is_pending_approval' => 'Your comment is pending approval.',
        'updating' => 'Updating...',
        'get_offer' => 'Get Offer',
        'download_file' => 'Download File',
        'please_try_again' => 'Please Try Again!',
        'prev_post' => 'Prev Post',
        'next_post' => 'Next Post',

    ];

}

