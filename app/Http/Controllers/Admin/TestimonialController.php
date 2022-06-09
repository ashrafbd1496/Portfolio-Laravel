<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Testimonial;
use App\Models\Admin\TestimonialSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
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
        $testimonials = Testimonial::where('language_id', $language->id)->orderBy('id', 'asc')->get();
        $testimonial_section = TestimonialSection::where('language_id', $language->id)->first();

        return view('admin.testimonial.create', compact('testimonials', 'testimonial_section'));
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
            'name' => 'required',
            'job' => 'required',
            'desc' => 'required',
            'star' => 'required|integer|in:1,2,3,4,5',
            'image_status' => 'in:show,hide',
            'testimonial_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('testimonial_image')){

            // Get image file
            $testimonial_image = $request->file('testimonial_image');

            // Folder path
            $folder = 'uploads/img/testimonial/';

            // Make image name
            $testimonial_image_name = time().'-'.$testimonial_image->getClientOriginalName();

            // Upload image
            $testimonial_image->move($folder, $testimonial_image_name);

            // Set input
            $input['testimonial_image'] = $testimonial_image_name;

        } else {
            // Set input
            $input['testimonial_image'] = null;
        }

        // Record to database
        Testimonial::create([
            'language_id' => getLanguage()->id,
            'testimonial_image' => $input['testimonial_image'],
            'name' => $input['name'],
            'job' => $input['job'],
            'desc' => $input['desc'],
            'star' => $input['star'],
            'order' => $input['order']
        ]);

        return redirect()->route('testimonial.create')
            ->with('success', 'content.created_successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieving models
        $testimonial = Testimonial::find($id);

        return view('admin.testimonial.edit', compact('testimonial'));
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
            'name' => 'required',
            'job' => 'required',
            'desc' => 'required',
            'star' => 'integer|in:1,2,3,4,5',
            'image_status' => 'in:show,hide',
            'testimonial_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get model
        $testimonial = Testimonial::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('testimonial_image')){

            // Get image file
            $testimonial_image = $request->file('testimonial_image');

            // Folder path
            $folder ='uploads/img/testimonial/';

            // Make image name
            $testimonial_image_name = time().'-'.$testimonial_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$testimonial->testimonial_image));

            // Upload image
            $testimonial_image->move($folder, $testimonial_image_name);

            // Set input
            $input['testimonial_image'] = $testimonial_image_name;

        }

        // Record to database
        Testimonial::find($id)->update($input);

        return redirect()->route('testimonial.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve a model
        $testimonial = Testimonial::find($id);

        // Folder path
        $folder = 'uploads/img/testimonial/';

        // Delete Image
        File::delete(public_path($folder.$testimonial->testimonial_image));

        // Delete record
        $testimonial->delete();

        return redirect()->route('testimonial.create')
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

        if (array_filter($arr_checked_lists) == []) {
            return redirect()->route('testimonial.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $testimonial = Testimonial::findOrFail($id);

            // Folder path
            $folder = 'uploads/img/testimonial/';

            // Delete Image
            File::delete(public_path($folder.$testimonial->testimonial_image));

            // Delete record
            $testimonial->delete();

        }

        return redirect()->route('testimonial.create')
            ->with('success', 'content.deleted_successfully');
    }
}
