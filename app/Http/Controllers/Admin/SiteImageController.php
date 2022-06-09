<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $site_image = SiteImage::first();

        return view('admin.setting.site_image.create', compact('site_image'));
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
            'favicon_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'admin_logo_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'admin_small_logo_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'site_colored_logo_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('favicon_image')){

            // Get image file
            $favicon_image = $request->file('favicon_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $favicon_image_name =  time().'-'.$favicon_image->getClientOriginalName();

            // Upload image
            $favicon_image->move($folder, $favicon_image_name);

            // Set input
            $input['favicon_image']= $favicon_image_name;

        } else {
            // Set input
            $input['favicon_image']= null;
        }

        if($request->hasFile('admin_logo_image')){

            // Get image file
            $admin_logo_image = $request->file('admin_logo_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $admin_logo_image_name =  time().'-'.$admin_logo_image->getClientOriginalName();

            // Upload image
            $admin_logo_image->move($folder, $admin_logo_image_name);

            // Set input
            $input['admin_logo_image']= $admin_logo_image_name;

        } else {
            // Set input
            $input['admin_logo_image']= null;
        }

        if($request->hasFile('admin_small_logo_image')){

            // Get image file
            $admin_small_logo_image = $request->file('admin_small_logo_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $admin_small_logo_image_name =  time().'-'.$admin_small_logo_image->getClientOriginalName();

            // Upload image
            $admin_small_logo_image->move($folder, $admin_small_logo_image_name);

            // Set input
            $input['admin_small_logo_image']= $admin_small_logo_image_name;

        } else {
            // Set input
            $input['admin_small_logo_image']= null;
        }

        if($request->hasFile('site_colored_logo_image')){

            // Get image file
            $site_colored_logo_image = $request->file('site_colored_logo_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $site_colored_logo_image_name =  time().'-'.$site_colored_logo_image->getClientOriginalName();

            // Upload image
            $site_colored_logo_image->move($folder, $site_colored_logo_image_name);

            // Set input
            $input['site_colored_logo_image']= $site_colored_logo_image_name;

        } else {
            // Set input
            $input['site_colored_logo_image']= null;
        }

        // Record to database
        SiteImage::firstOrCreate([
            'favicon_image' => $input['favicon_image'],
            'admin_logo_image' => $input['admin_logo_image'],
            'admin_small_logo_image' => $input['admin_small_logo_image'],
            'site_colored_logo_image' => $input['site_colored_logo_image']
        ]);

        return redirect()->route('site-image.create')
            ->with('success', 'content.created_successfully');
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
            'favicon_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'admin_logo_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'admin_small_logo_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'site_colored_logo_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get model
        $site_image = SiteImage::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('favicon_image')){

            // Get image file
            $favicon_image = $request->file('favicon_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $favicon_image_name =  time().'-'.$favicon_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$site_image->favicon_image));

            // Upload image
            $favicon_image->move($folder, $favicon_image_name);

            // Set input
            $input['favicon_image'] = $favicon_image_name;

        }

        if($request->hasFile('admin_logo_image')){

            // Get image file
            $admin_logo_image = $request->file('admin_logo_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $admin_logo_image_name =  time().'-'.$admin_logo_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$site_image->admin_logo_image));

            // Upload image
            $admin_logo_image->move($folder, $admin_logo_image_name);

            // Set input
            $input['admin_logo_image'] = $admin_logo_image_name;

        }

        if($request->hasFile('admin_small_logo_image')){

            // Get image file
            $admin_small_logo_image = $request->file('admin_small_logo_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $admin_small_logo_image_name = time().'-'.$admin_small_logo_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$site_image->admin_small_logo_image));

            // Upload image
            $admin_small_logo_image->move($folder, $admin_small_logo_image_name);

            // Set input
            $input['admin_small_logo_image'] = $admin_small_logo_image_name;

        }

        if($request->hasFile('site_colored_logo_image')){

            // Get image file
            $site_colored_logo_image = $request->file('site_colored_logo_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $site_colored_logo_image_name = time().'-'.$site_colored_logo_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$site_image->site_colored_logo_image));

            // Upload image
            $site_colored_logo_image->move($folder, $site_colored_logo_image_name);

            // Set input
            $input['site_colored_logo_image'] = $site_colored_logo_image_name;

        }

        // Update model
        SiteImage::find($id)->update($input);

        return redirect()->route('site-image.create')
            ->with('success', 'content.updated_successfully');
    }


}
