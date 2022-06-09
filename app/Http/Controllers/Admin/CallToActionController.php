<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CallToAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CallToActionController extends Controller
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
        $call_to_action = CallToAction::where('language_id', $language->id)->first();

        return view('admin.call_to_action.create', compact('call_to_action'));
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
            'bg_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('bg_image')){

            // Get image file
            $bg_image = $request->file('bg_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $bg_image_name =  time().'-'.$bg_image->getClientOriginalName();

            // Upload image
            $bg_image->move($folder, $bg_image_name);

            // Set input
            $input['bg_image'] = $bg_image_name;

        } else {
            // Set input
            $input['bg_image'] = null;
        }

        // Record to database
        CallToAction::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc'],
            'btn_name' => $input['btn_name'],
            'btn_link' => $input['btn_link'],
            'image_status' => $input['image_status'],
            'bg_image' => $input['bg_image']
        ]);

        return redirect()->route('call-to-action.create')
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
            'bg_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get model
        $fixed_content = CallToAction::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('bg_image')){

            // Get image file
            $bg_image = $request->file('bg_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $bg_image_name =  time().'-'.$bg_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$fixed_content->bg_image));

            // Upload image
            $bg_image->move($folder, $bg_image_name);

            // Set input
            $input['bg_image'] = $bg_image_name;

        }

        // Update user
        CallToAction::find($id)->update($input);

        return redirect()->route('call-to-action.create')
            ->with('success', 'content.updated_successfully');
    }
}
