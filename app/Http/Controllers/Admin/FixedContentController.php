<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FixedContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FixedContentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $language = getLanguage();
        $fixed_content = FixedContent::where('language_id', $language->id)->first();

        return view('admin.fixed_content.create', compact('fixed_content'));
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
            'title' => 'required',
            'desc' => 'required',
            'image_status'   =>  'in:show,hide',
            'thumbnail_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('thumbnail_image')){

            // Get image file
            $thumbnail_image = $request->file('thumbnail_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $thumbnail_image_name =  time().'-'.$thumbnail_image->getClientOriginalName();

            // Upload image
            $thumbnail_image->move($folder, $thumbnail_image_name);

            // Set input
            $input['thumbnail_image'] = $thumbnail_image_name;

        } else {
            // Set input
            $input['thumbnail_image'] = null;
        }

        // Record to database
        FixedContent::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc'],
            'btn_name' => $input['btn_name'],
            'btn_link' => $input['btn_link'],
            'video_link' => $input['video_link'],
            'image_status' => $input['image_status'],
            'thumbnail_image' => $input['thumbnail_image']
        ]);

        return redirect()->route('fixed-content.create')
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
            'title' => 'required',
            'desc' => 'required',
            'image_status'   =>  'in:show,hide',
            'thumbnail_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get model
        $fixed_content = FixedContent::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('thumbnail_image')){

            // Get image file
            $thumbnail_image = $request->file('thumbnail_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $thumbnail_image_name =  time().'-'.$thumbnail_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$fixed_content->thumbnail_image));

            // Upload image
            $thumbnail_image->move($folder, $thumbnail_image_name);

            // Set input
            $input['thumbnail_image'] = $thumbnail_image_name;

        }

        // Update user
        FixedContent::find($id)->update($input);

        return redirect()->route('fixed-content.create')
            ->with('success', 'content.updated_successfully');
    }
}
