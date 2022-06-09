<?php

namespace Database\Seeders;

use App\Models\Admin\PanelKeyword;
use Illuminate\Database\Seeder;

class PanelKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        PanelKeyword::insert([
            [
                'language_id' => 1,
                'key' => 'dashboard',
                'value' => 'Dashboard',
            ],
            [
                'language_id' => 1,
                'key' => 'admin_role_manage',
                'value' => 'Admin Role Manage',
            ],
            [
                'language_id' => 1,
                'key' => 'add_admin_role',
                'value' => 'Add Admin Role',
            ],
            [
                'language_id' => 1,
                'key' => 'role_name',
                'value' => 'Role Name',
            ],
            [
                'language_id' => 1,
                'key' => 'permissions',
                'value' => 'Permissions',
            ],
            [
                'language_id' => 1,
                'key' => 'set_permissions_for_this_role',
                'value' => 'set permissions for this role',
            ],
            [
                'language_id' => 1,
                'key' => 'submit',
                'value' => 'Submit',
            ],
            [
                'language_id' => 1,
                'key' => 'admin_roles',
                'value' => 'Admin Roles',
            ],
            [
                'language_id' => 1,
                'key' => 'has_all_permissions',
                'value' => 'has all permissions',
            ],
            [
                'language_id' => 1,
                'key' => 'action',
                'value' => 'Action',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_admin_role',
                'value' => 'Edit Admin Role',
            ],
            [
                'language_id' => 1,
                'key' => 'admin_manage',
                'value' => 'Admin Manage',
            ],
            [
                'language_id' => 1,
                'key' => 'all_admin',
                'value' => 'All Admin',
            ],
            [
                'language_id' => 1,
                'key' => 'all_admin_created_by_super_admin',
                'value' => 'All Admin Created By Super Admin',
            ],
            [
                'language_id' => 1,
                'key' => 'add_admin_user',
                'value' => 'Add Admin User',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_admin_user',
                'value' => 'Edit Admin User',
            ],
            [
                'language_id' => 1,
                'key' => 'name',
                'value' => 'Name',
            ],
            [
                'language_id' => 1,
                'key' => 'email',
                'value' => 'Email',
            ],
            [
                'language_id' => 1,
                'key' => 'new_password',
                'value' => 'New Password',
            ],
            [
                'language_id' => 1,
                'key' => 'confirm_password',
                'value' => 'Confirm Password',
            ],
            [
                'language_id' => 1,
                'key' => 'image',
                'value' => 'Image',
            ],
            [
                'language_id' => 1,
                'key' => 'size',
                'value' => 'size',
            ],
            [
                'language_id' => 1,
                'key' => 'delete',
                'value' => 'Delete',
            ],
            [
                'language_id' => 1,
                'key' => 'close',
                'value' => 'Close',
            ],
            [
                'language_id' => 1,
                'key' => 'you_wont_be_able_to_revert_this',
                'value' => 'You wont be able to revert this!',
            ],
            [
                'language_id' => 1,
                'key' => 'cancel',
                'value' => 'Cancel',
            ],
            [
                'language_id' => 1,
                'key' => 'yes_delete_it',
                'value' => 'Yes, delete it!',
            ],
            [
                'language_id' => 1,
                'key' => 'created_successfully',
                'value' => 'Created Successfully',
            ],
            [
                'language_id' => 1,
                'key' => 'updated_successfully',
                'value' => 'Updated Successfully',
            ],
            [
                'language_id' => 1,
                'key' => 'deleted_successfully',
                'value' => 'Deleted Successfully',
            ],
            [
                'language_id' => 1,
                'key' => 'current_image',
                'value' => 'Current Image',
            ],
            [
                'language_id' => 1,
                'key' => 'uploads',
                'value' => 'Uploads',
            ],
            [
                'language_id' => 1,
                'key' => 'add_photo',
                'value' => 'Add Photo',
            ],
            [
                'language_id' => 1,
                'key' => 'photos',
                'value' => 'Photos',
            ],
            [
                'language_id' => 1,
                'key' => 'order',
                'value' => 'Order',
            ],
            [
                'language_id' => 1,
                'key' => 'copy_image_link',
                'value' => 'Copy Image Link',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_photo',
                'value' => 'Edit Photo',
            ],
            [
                'language_id' => 1,
                'key' => 'banner',
                'value' => 'Banner',
            ],
            [
                'language_id' => 1,
                'key' => 'add_new',
                'value' => 'Add New',
            ],
            [
                'language_id' => 1,
                'key' => 'fixed_content',
                'value' => 'Fixed Content',
            ],
            [
                'language_id' => 1,
                'key' => 'title',
                'value' => 'Title',
            ],
            [
                'language_id' => 1,
                'key' => 'description',
                'value' => 'Description',
            ],
            [
                'language_id' => 1,
                'key' => 'video_link',
                'value' => 'Video Link',
            ],
            [
                'language_id' => 1,
                'key' => 'only_youtube_is_supported',
                'value' => 'only youtube is supported.',
            ],
            [
                'language_id' => 1,
                'key' => 'please_use_recommended_sizes',
                'value' => 'You do not have to use the recommended sizes. However, please use the recommended sizes for your site design to look its best.',
            ],
            [
                'language_id' => 1,
                'key' => 'image_status',
                'value' => 'Image Status',
            ],
            [
                'language_id' => 1,
                'key' => 'external_url',
                'value' => 'External Url',
            ],
            [
                'language_id' => 1,
                'key' => 'btn_name',
                'value' => 'Button Name',
            ],
            [
                'language_id' => 1,
                'key' => 'btn_link',
                'value' => 'Button Link',
            ],
            [
                'language_id' => 1,
                'key' => 'btn_type',
                'value' => 'Button Type',
            ],
            [
                'language_id' => 1,
                'key' => 'get_offer',
                'value' => 'Get Offer',
            ],
            [
                'language_id' => 1,
                'key' => 'status',
                'value' => 'Status',
            ],
            [
                'language_id' => 1,
                'key' => 'select_your_option',
                'value' => 'Select Your Option',
            ],
            [
                'language_id' => 1,
                'key' => 'enable',
                'value' => 'Enable',
            ],
            [
                'language_id' => 1,
                'key' => 'disable',
                'value' => 'Disable',
            ],
            [
                'language_id' => 1,
                'key' => 'offer_messages',
                'value' => 'Offer Messages',
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
                'key' => 'section_title_and_desc',
                'value' => 'Section Title/Description',
            ],
            [
                'language_id' => 1,
                'key' => 'section_title',
                'value' => 'Section Title',
            ],
            [
                'language_id' => 1,
                'key' => 'about',
                'value' => 'About',
            ],
            [
                'language_id' => 1,
                'key' => 'download_btn_status',
                'value' => 'Download Button Status',
            ],
            [
                'language_id' => 1,
                'key' => 'cv_or_any_file',
                'value' => 'CV Or Any File',
            ],
            [
                'language_id' => 1,
                'key' => 'information_list',
                'value' => 'Information List',
            ],
            [
                'language_id' => 1,
                'key' => 'add_info',
                'value' => 'Add Info',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_info',
                'value' => 'Edit Info',
            ],
            [
                'language_id' => 1,
                'key' => 'back',
                'value' => 'Back',
            ],
            [
                'language_id' => 1,
                'key' => 'resume',
                'value' => 'Resume',
            ],
            [
                'language_id' => 1,
                'key' => 'add_resume',
                'value' => 'Add Resume',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_resume',
                'value' => 'Edit Resume',
            ],
            [
                'language_id' => 1,
                'key' => 'date_range',
                'value' => 'Date Range',
            ],
            [
                'language_id' => 1,
                'key' => 'type',
                'value' => 'Type',
            ],
            [
                'language_id' => 1,
                'key' => 'skills',
                'value' => 'Skills',
            ],
            [
                'language_id' => 1,
                'key' => 'add_skill',
                'value' => 'Add Skill',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_skill',
                'value' => 'Edit Skill',
            ],
            [
                'language_id' => 1,
                'key' => 'percent_rate',
                'value' => 'Percent Rate',
            ],
            [
                'language_id' => 1,
                'key' => 'counters',
                'value' => 'Counters',
            ],
            [
                'language_id' => 1,
                'key' => 'add_counter',
                'value' => 'Add Counter',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_counter',
                'value' => 'Edit Counter',
            ],
            [
                'language_id' => 1,
                'key' => 'timer',
                'value' => 'Timer',
            ],
            [
                'language_id' => 1,
                'key' => 'services',
                'value' => 'Services',
            ],
            [
                'language_id' => 1,
                'key' => 'add_service',
                'value' => 'Add Service',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_services',
                'value' => 'Edit Services',
            ],
            [
                'language_id' => 1,
                'key' => 'portfolios',
                'value' => 'Portfolios',
            ],
            [
                'language_id' => 1,
                'key' => 'add_portfolio',
                'value' => 'Add Portfolio',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_portfolio',
                'value' => 'Edit Portfolio',
            ],
            [
                'language_id' => 1,
                'key' => 'blogs',
                'value' => 'Blogs',
            ],
            [
                'language_id' => 1,
                'key' => 'categories',
                'value' => 'Categories',
            ],
            [
                'language_id' => 1,
                'key' => 'add_category',
                'value' => 'Add Category',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_category',
                'value' => 'Edit Category',
            ],
            [
                'language_id' => 1,
                'key' => 'category_name',
                'value' => 'Category Name',
            ],
            [
                'language_id' => 1,
                'key' => 'please_choose',
                'value' => 'Please choose.',
            ],
            [
                'language_id' => 1,
                'key' => 'please_create_a_category',
                'value' => 'Please create a category.',
            ],
            [
                'language_id' => 1,
                'key' => 'not_yet_created',
                'value' => 'Not yet created.',
            ],
            [
                'language_id' => 1,
                'key' => 'category',
                'value' => 'Category',
            ],
            [
                'language_id' => 1,
                'key' => 'post_date',
                'value' => 'Post Date',
            ],
            [
                'language_id' => 1,
                'key' => 'view',
                'value' => 'View',
            ],
            [
                'language_id' => 1,
                'key' => 'add_blog',
                'value' => 'Add Blog',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_blog',
                'value' => 'Edit Blog',
            ],
            [
                'language_id' => 1,
                'key' => 'short_desc',
                'value' => 'Short Description',
            ],
            [
                'language_id' => 1,
                'key' => 'tag',
                'value' => 'Tag',
            ],
            [
                'language_id' => 1,
                'key' => 'separate_with_commas',
                'value' => 'Separate with commas',
            ],
            [
                'language_id' => 1,
                'key' => 'author',
                'value' => 'Author',
            ],
            [
                'language_id' => 1,
                'key' => 'with_this_account',
                'value' => 'With this account',
            ],
            [
                'language_id' => 1,
                'key' => 'anonymous',
                'value' => 'Anonymous',
            ],
            [
                'language_id' => 1,
                'key' => 'seo_optimization',
                'value' => 'Seo Optimization',
            ],
            [
                'language_id' => 1,
                'key' => 'meta_desc',
                'value' => 'Meta Description',
            ],
            [
                'language_id' => 1,
                'key' => 'meta_keyword',
                'value' => 'Meta Keyword',
            ],
            [
                'language_id' => 1,
                'key' => 'breadcrumb_customization',
                'value' => 'Breadcrumb Customization',
            ],
            [
                'language_id' => 1,
                'key' => 'use_special_breadcrumb',
                'value' => 'Do you want to use special breadcrumb for the page?',
            ],
            [
                'language_id' => 1,
                'key' => 'yes',
                'value' => 'Yes',
            ],
            [
                'language_id' => 1,
                'key' => 'no',
                'value' => 'No',
            ],
            [
                'language_id' => 1,
                'key' => 'custom_breadcrumb_image',
                'value' => 'Custom Breadcrumb Image',
            ],
            [
                'language_id' => 1,
                'key' => 'published',
                'value' => 'Published',
            ],
            [
                'language_id' => 1,
                'key' => 'draft',
                'value' => 'Draft',
            ],
            [
                'language_id' => 1,
                'key' => 'blog_paginate',
                'value' => 'Blog Paginate',
            ],
            [
                'language_id' => 1,
                'key' => 'homepage_item',
                'value' => 'Homepage Item',
            ],
            [
                'language_id' => 1,
                'key' => 'grid_view_paginate',
                'value' => 'Grid View Paginate',
            ],
            [
                'language_id' => 1,
                'key' => 'testimonials',
                'value' => 'Testimonials',
            ],
            [
                'language_id' => 1,
                'key' => 'add_testimonial',
                'value' => 'Add Testimonial',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_testimonial',
                'value' => 'Edit Testimonial',
            ],
            [
                'language_id' => 1,
                'key' => 'star',
                'value' => 'Star',
            ],
            [
                'language_id' => 1,
                'key' => 'teams',
                'value' => 'Teams',
            ],
            [
                'language_id' => 1,
                'key' => 'add_team',
                'value' => 'Add Team',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_team',
                'value' => 'Edit Team',
            ],
            [
                'language_id' => 1,
                'key' => 'job',
                'value' => 'Job',
            ],
            [
                'language_id' => 1,
                'key' => 'call_to_action',
                'value' => 'Call To Action',
            ],
            [
                'language_id' => 1,
                'key' => 'pages',
                'value' => 'Pages',
            ],
            [
                'language_id' => 1,
                'key' => 'add_page',
                'value' => 'Add Page',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_page',
                'value' => 'Edit Page',
            ],
            [
                'language_id' => 1,
                'key' => 'display_header_menu',
                'value' => 'Display Header Menu?',
            ],
            [
                'language_id' => 1,
                'key' => 'other',
                'value' => 'Other',
            ],
            [
                'language_id' => 1,
                'key' => 'copy_link',
                'value' => 'Copy Link',
            ],
            [
                'language_id' => 1,
                'key' => 'copied_text',
                'value' => 'Copied Text',
            ],

            [
                'language_id' => 1,
                'key' => 'all',
                'value' => 'All',
            ],
            [
                'language_id' => 1,
                'key' => 'contact',
                'value' => 'Contact',
            ],
            [
                'language_id' => 1,
                'key' => 'contact_info',
                'value' => 'Contact Info',
            ],
            [
                'language_id' => 1,
                'key' => 'map_iframe',
                'value' => 'Map Iframe (link in src)',
            ],
            [
                'language_id' => 1,
                'key' => 'map_iframe_desc_placeholder',
                'value' => 'Please find your address on Google Map. And click the Share Button on the Left Side. You will see the Map Placement Area. In the Copy Html field in this section Copy and paste the link in the src from the code inside.',
            ],
            [
                'language_id' => 1,
                'key' => 'add_contact',
                'value' => 'Add Contact',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_contact',
                'value' => 'Edit Contact',
            ],
            [
                'language_id' => 1,
                'key' => 'socials',
                'value' => 'Socials',
            ],
            [
                'language_id' => 1,
                'key' => 'add_social',
                'value' => 'Add Social',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_social',
                'value' => 'Edit Social',
            ],
            [
                'language_id' => 1,
                'key' => 'link',
                'value' => 'Link',
            ],
            [
                'language_id' => 1,
                'key' => 'messages',
                'value' => 'Messages',
            ],
            [
                'language_id' => 1,
                'key' => 'mark_all_as_read',
                'value' => 'Mark All As Read',
            ],
            [
                'language_id' => 1,
                'key' => 'subject',
                'value' => 'Subject',
            ],
            [
                'language_id' => 1,
                'key' => 'message',
                'value' => 'Message',
            ],
            [
                'language_id' => 1,
                'key' => 'read_status',
                'value' => 'Read Status',
            ],
            [
                'language_id' => 1,
                'key' => 'read',
                'value' => 'Read',
            ],
            [
                'language_id' => 1,
                'key' => 'unread',
                'value' => 'Unread',
            ],
            [
                'language_id' => 1,
                'key' => 'mark',
                'value' => 'Mark',
            ],
            [
                'language_id' => 1,
                'key' => 'settings',
                'value' => 'Settings',
            ],
            [
                'language_id' => 1,
                'key' => 'site_info',
                'value' => 'Site Info',
            ],
            [
                'language_id' => 1,
                'key' => 'site_images',
                'value' => 'Site Images',
            ],
            [
                'language_id' => 1,
                'key' => 'copyright',
                'value' => 'Copyright',
            ],
            [
                'language_id' => 1,
                'key' => 'address',
                'value' => 'Address',
            ],
            [
                'language_id' => 1,
                'key' => 'address_map_link',
                'value' => 'Address Map Link',
            ],
            [
                'language_id' => 1,
                'key' => 'phone',
                'value' => 'Phone',
            ],
            [
                'language_id' => 1,
                'key' => 'favicon',
                'value' => 'Favicon',
            ],
            [
                'language_id' => 1,
                'key' => 'admin_logo',
                'value' => 'Admin Logo',
            ],
            [
                'language_id' => 1,
                'key' => 'admin_small_logo',
                'value' => 'Admin Small Logo',
            ],
            [
                'language_id' => 1,
                'key' => 'site_colored_logo',
                'value' => 'Site Colored Logo',
            ],
            [
                'language_id' => 1,
                'key' => 'google_analytic',
                'value' => 'Google Analytic',
            ],
            [
                'language_id' => 1,
                'key' => 'breadcrumb',
                'value' => 'Breadcrumb',
            ],
            [
                'language_id' => 1,
                'key' => 'sections',
                'value' => 'Sections',
            ],
            [
                'language_id' => 1,
                'key' => 'color_option',
                'value' => 'Color Option',
            ],
            [
                'language_id' => 1,
                'key' => 'seo',
                'value' => 'Seo',
            ],
            [
                'language_id' => 1,
                'key' => 'site_name',
                'value' => 'Site Name',
            ],
            [
                'language_id' => 1,
                'key' => 'site_desc',
                'value' => 'Site Description',
            ],
            [
                'language_id' => 1,
                'key' => 'site_keywords',
                'value' => 'Site Keywords',
            ],
            [
                'language_id' => 1,
                'key' => 'languages',
                'value' => 'Languages',
            ],
            [
                'language_id' => 1,
                'key' => 'default_site_language',
                'value' => 'Default Site Language',
            ],
            [
                'language_id' => 1,
                'key' => 'add_language',
                'value' => 'Add Language',
            ],
            [
                'language_id' => 1,
                'key' => 'language_name',
                'value' => 'Language Name',
            ],
            [
                'language_id' => 1,
                'key' => 'language_code',
                'value' => 'Language Code',
            ],
            [
                'language_id' => 1,
                'key' => 'direction',
                'value' => 'Direction',
            ],
            [
                'language_id' => 1,
                'key' => 'display_dropdown',
                'value' => 'Display Dropdown?',
            ],
            [
                'language_id' => 1,
                'key' => 'show',
                'value' => 'Show',
            ],
            [
                'language_id' => 1,
                'key' => 'hide',
                'value' => 'Hide',
            ],
            [
                'language_id' => 1,
                'key' => 'keywords',
                'value' => 'Keywords',
            ],
            [
                'language_id' => 1,
                'key' => 'for_admin_panel',
                'value' => 'For Admin Panel',
            ],
            [
                'language_id' => 1,
                'key' => 'for_frontend',
                'value' => 'For Frontend',
            ],
            [
                'language_id' => 1,
                'key' => 'profile',
                'value' => 'Profile',
            ],
            [
                'language_id' => 1,
                'key' => 'change_password',
                'value' => 'Change Password',
            ],
            [
                'language_id' => 1,
                'key' => 'current_password',
                'value' => 'Current Password',
            ],
            [
                'language_id' => 1,
                'key' => 'mark_all_as_approval',
                'value' => 'Mark All As Approval',
            ],
            [
                'language_id' => 1,
                'key' => 'approval_status',
                'value' => 'Approval Status',
            ],
            [
                'language_id' => 1,
                'key' => 'pending_approval',
                'value' => 'Pending Approval',
            ],
            [
                'language_id' => 1,
                'key' => 'approval',
                'value' => 'Approval',
            ],
            [
                'language_id' => 1,
                'key' => 'data_language',
                'value' => 'Data Language',
            ],
            [
                'language_id' => 1,
                'key' => 'which_language',
                'value' => 'Which language do you want to create the data?',
            ],
            [
                'language_id' => 1,
                'key' => 'reminding',
                'value' => 'Please note that all the entries you create will be based on your chosen language.',
            ],
            [
                'language_id' => 1,
                'key' => 'notifications',
                'value' => 'Notifications',
            ],
            [
                'language_id' => 1,
                'key' => 'logout',
                'value' => 'Logout',
            ],
            [
                'language_id' => 1,
                'key' => 'optimizer',
                'value' => 'Optimizer',
            ],
            [
                'language_id' => 1,
                'key' => 'required_fields',
                'value' => 'Fields marked are required',
            ],
            [
                'language_id' => 1,
                'key' => 'site',
                'value' => 'Site',
            ],
            [
                'language_id' => 1,
                'key' => 'add_keyword',
                'value' => 'Add Keyword',
            ],
            [
                'language_id' => 1,
                'key' => 'key',
                'value' => 'Key',
            ],
            [
                'language_id' => 1,
                'key' => 'value',
                'value' => 'Value',
            ],
            [
                'language_id' => 1,
                'key' => 'delete_selected',
                'value' => 'Delete selected?',
            ],
            [
                'language_id' => 1,
                'key' => 'comments',
                'value' => 'Comments',
            ],
            [
                'language_id' => 1,
                'key' => 'if_you_choose_no',
                'value' => 'If you choose No, it will appear in the footer section.',
            ],
            [
                'language_id' => 1,
                'key' => 'if_you_choose_other',
                'value' => 'If you choose the other, you\'ll know how to create links that you can use on your site.',
            ],
            [
                'language_id' => 1,
                'key' => 'pages_page',
                'value' => 'Pages Page',
            ],
            [
                'language_id' => 1,
                'key' => 'about_section',
                'value' => 'About Section',
            ],
            [
                'language_id' => 1,
                'key' => 'resume_section',
                'value' => 'Resume Section',
            ],
            [
                'language_id' => 1,
                'key' => 'skill_section',
                'value' => 'Skill Section',
            ],
            [
                'language_id' => 1,
                'key' => 'counter_section',
                'value' => 'Counter Section',
            ],
            [
                'language_id' => 1,
                'key' => 'service_section',
                'value' => 'Service Section',
            ],
            [
                'language_id' => 1,
                'key' => 'portfolio_section',
                'value' => 'Portfolio Section',
            ],
            [
                'language_id' => 1,
                'key' => 'client_section',
                'value' => 'Client Section',
            ],
            [
                'language_id' => 1,
                'key' => 'team_section',
                'value' => 'Team Section',
            ],
            [
                'language_id' => 1,
                'key' => 'call_to_action_section',
                'value' => 'Call To Action Section',
            ],
            [
                'language_id' => 1,
                'key' => 'blog_section',
                'value' => 'Blog Section',
            ],
            [
                'language_id' => 1,
                'key' => 'contact_section',
                'value' => 'Contact Section',
            ],
            [
                'language_id' => 1,
                'key' => 'footer_section',
                'value' => 'Footer Section',
            ],
            [
                'language_id' => 1,
                'key' => 'preloader',
                'value' => 'Preloader',
            ],
            [
                'language_id' => 1,
                'key' => 'the_password_must_be_at_least_6_characters',
                'value' => 'The password must be at least 6 characters.',
            ],
            [
                'language_id' => 1,
                'key' => 'download_button_status',
                'value' => 'Download Button Status',
            ],
            [
                'language_id' => 1,
                'key' => 'icon',
                'value' => 'Icon',
            ],
            [
                'language_id' => 1,
                'key' => 'bg_image',
                'value' => 'Background Image',
            ],
            [
                'language_id' => 1,
                'key' => 'leave_blank_to_redirect_to_the_contact_section',
                'value' => 'Leave blank to redirect to the contact section.',
            ],
            [
                'language_id' => 1,
                'key' => 'comment',
                'value' => 'Comment',
            ],
            [
                'language_id' => 1,
                'key' => 'comment',
                'value' => 'Comment',
            ],
            [
                'language_id' => 1,
                'key' => 'tawk_to',
                'value' => 'Tawk To',
            ]
        ]);
    }
}
