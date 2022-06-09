<?php

namespace Database\Seeders;

use App\Models\Admin\FrontendKeyword;
use Illuminate\Database\Seeder;

class FrontendKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        FrontendKeyword::insert([
            [
                'language_id' => 1,
                'key' => 'home',
                'value' => 'Home',
            ],
            [
                'language_id' => 1,
                'key' => 'about',
                'value' => 'About',
            ],
            [
                'language_id' => 1,
                'key' => 'services',
                'value' => 'Services',
            ],
            [
                'language_id' => 1,
                'key' => 'portfolio',
                'value' => 'Portfolio',
            ],
            [
                'language_id' => 1,
                'key' => 'blogs',
                'value' => 'Blogs',
            ],
            [
                'language_id' => 1,
                'key' => 'contact',
                'value' => 'Contact',
            ],
            [
                'language_id' => 1,
                'key' => 'pages',
                'value' => 'Pages',
            ],
            [
                'language_id' => 1,
                'key' => 'download',
                'value' => 'Download',
            ],
            [
                'language_id' => 1,
                'key' => 'read_more',
                'value' => 'Read More',
            ],
            [
                'language_id' => 1,
                'key' => 'service_name',
                'value' => 'Service Name',
            ],
            [
                'language_id' => 1,
                'key' => 'special_request',
                'value' => 'Special Request',
            ],
            [
                'language_id' => 1,
                'key' => 'your_name',
                'value' => 'Your Name *',
            ],
            [
                'language_id' => 1,
                'key' => 'your_email',
                'value' => 'Your Email *',
            ],
            [
                'language_id' => 1,
                'key' => 'your_phone',
                'value' => 'Your Phone *',
            ],
            [
                'language_id' => 1,
                'key' => 'your_subject',
                'value' => 'Your Subject *',
            ],
            [
                'language_id' => 1,
                'key' => 'your_message',
                'value' => 'Your Message *',
            ],
            [
                'language_id' => 1,
                'key' => 'send_message',
                'value' => 'Send Message',
            ],
            [
                'language_id' => 1,
                'key' => 'please_enter_code',
                'value' => 'Please Enter Code *',
            ],
            [
                'language_id' => 1,
                'key' => 'helper_links',
                'value' => 'Helper Links',
            ],
            [
                'language_id' => 1,
                'key' => 'contact_info',
                'value' => 'Contact Info',
            ],
            [
                'language_id' => 1,
                'key' => 'recent_posts',
                'value' => 'Recent Posts',
            ],
            [
                'language_id' => 1,
                'key' => 'all',
                'value' => 'All',
            ],
            [
                'language_id' => 1,
                'key' => 'anonymous',
                'value' => 'Anonymous',
            ],
            [
                'language_id' => 1,
                'key' => 'search',
                'value' => 'Search',
            ],
            [
                'language_id' => 1,
                'key' => 'search_here',
                'value' => 'Search Here...',
            ],
            [
                'language_id' => 1,
                'key' => 'categories',
                'value' => 'Categories',
            ],
            [
                'language_id' => 1,
                'key' => 'tags',
                'value' => 'Tags',
            ],
            [
                'language_id' => 1,
                'key' => 'share',
                'value' => 'Share',
            ],
            [
                'language_id' => 1,
                'key' => 'comments',
                'value' => 'Comments',
            ],
            [
                'language_id' => 1,
                'key' => 'leave_a_comment',
                'value' => 'Leave A Comment',
            ],
            [
                'language_id' => 1,
                'key' => 'reply',
                'value' => 'Reply',
            ],
            [
                'language_id' => 1,
                'key' => 'your_comment',
                'value' => 'Your Comment *',
            ],
            [
                'language_id' => 1,
                'key' => 'send_comment',
                'value' => 'Send Comment',
            ],
            [
                'language_id' => 1,
                'key' => 'search_results',
                'value' => 'Search Results',
            ],
            [
                'language_id' => 1,
                'key' => 'nothing_found',
                'value' => 'Nothing Found',
            ],
            [
                'language_id' => 1,
                'key' => 'your_message_has_been_delivered',
                'value' => 'Your message has been delivered.',
            ],
            [
                'language_id' => 1,
                'key' => 'your_comment_is_pending_approval',
                'value' => 'Your comment is pending approval.',
            ],
            [
                'language_id' => 1,
                'key' => 'updating',
                'value' => 'Updating...',
            ],
            [
                'language_id' => 1,
                'key' => 'get_offer',
                'value' => 'Get Offer',
            ],
            [
                'language_id' => 1,
                'key' => 'download_file',
                'value' => 'Download File',
            ],
            [
                'language_id' => 1,
                'key' => 'please_try_again',
                'value' => 'Please Try Again!',
            ],
            [
                'language_id' => 1,
                'key' => 'prev_post',
                'value' => 'Prev Post',
            ],
            [
                'language_id' => 1,
                'key' => 'next_post',
                'value' => 'Next Post',
            ]

            ]);
    }
}
