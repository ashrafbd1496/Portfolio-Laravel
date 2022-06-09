<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\AboutSection;
use App\Models\Admin\InfoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
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
        $about = About::where('language_id', $language->id)->first();
        $info_lists = InfoList::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $about_section = AboutSection::where('language_id', $language->id)->first();

        return view('admin.about.create', compact('about', 'info_lists', 'about_section'));
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
            'download_button_status' => 'in:show,hide',
            'cv_file' => 'mimes:pdf|max:2048',
            'image_status' => 'in:show,hide',
            'about_image' => 'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('about_image')){

            // Get image file
            $about_image_file = $request->file('about_image');

            // Folder path
            $folder = 'uploads/img/about/';

            // Make image name
            $about_image_name = time().'-'.$about_image_file->getClientOriginalName();

            // Original size upload file
            $about_image_file->move($folder, $about_image_name);

            // Set input
            $input['about_image']= $about_image_name;

        } else {

            // Set input
            $input['about_image']= null;

        }

        if( $request->hasFile('cv_file')){

            // Get cv file
            $cv_file = $request->file('cv_file');

            // Folder path
            $folder ='uploads/img/about/';

            // Make cv name
            $cv_file_name =  time().'-'.$cv_file->getClientOriginalName();

            // Upload file
            $cv_file->move($folder, $cv_file_name);

            // Set input
            $input['cv_file']= $cv_file_name;

        } else {
            // Set input
            $input['cv_file']= null;
        }

        // Record to database
        About::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc'],
            'download_button_status' => $input['download_button_status'],
            'cv_file' => $input['cv_file'],
            'image_status' => $input['image_status'],
            'about_image' => $input['about_image']
        ]);

        return redirect()->route('about.create')
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
            'download_button_status' => 'in:show,hide',
            'cv_file' => 'mimes:pdf|max:2048',
            'image_status' => 'in:show,hide',
            'about_image' => 'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        $about = About::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('about_image')){

            // Get image file
            $about_image_file = $request->file('about_image');

            // Folder path
            $folder = 'uploads/img/about/';

            // Make image name
            $about_image_name =  time().'-'.$about_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$about->about_image));

            // Original size upload file
            $about_image_file->move($folder, $about_image_name);

            // Set input
            $input['about_image']= $about_image_name;

        }

        if($request->hasFile('cv_file')){

            // Get cv file
            $cv_file = $request->file('cv_file');

            // Folder path
            $folder ='uploads/img/about/';

            // Make image name
            $cv_file_name =  time().'-'.$cv_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$about->cv_file));

            // Upload image
            $cv_file->move($folder, $cv_file_name);

            // Set input
            $input['cv_file']= $cv_file_name;
        }

        // Update model
        About::find($id)->update($input);

        return redirect()->route('about.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_info_list(Request $request)
    {
        // Form validation
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();


        // Record to database
        InfoList::create([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc'],
            'order' => $input['order']
        ]);

        return redirect()->route('about.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_info_list($id)
    {
        // Retrieving models
        $info_list = InfoList::find($id);

        return view('admin.about.edit', compact('info_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_info_list(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'order' => 'integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        InfoList::find($id)->update($input);

        return redirect()->route('about.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_info_list($id)
    {
        // Retrieve a model
        $info_list = InfoList::find($id);

        // Delete record
        $info_list->delete();

        return redirect()->route('about.create')
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

        if ($arr_checked_lists == []) {
            return redirect()->route('about.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $info_list = InfoList::findOrFail($id);

            // Delete record
            $info_list->delete();

        }

        return redirect()->route('about.create')
            ->with('success', 'content.deleted_successfully');
    }

}
