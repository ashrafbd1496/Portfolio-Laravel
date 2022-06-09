<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $language = getLanguage();
        $services = ServiceCategory::where('language_id', $language->id)->orderBy('id', 'desc')->get();

        return view('admin.service.create', compact('services'));
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
            'category_name' => 'required|unique:service_categories|max:255',
            'type' => 'in:icon,image',
            'service_category_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'image_status'   =>  'in:show,hide',
            'service_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'status'   =>  'in:published,draft',
            'order'   =>  'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('service_category_image')){

            // Get image file
            $service_category_image = $request->file('service_category_image');

            // Folder path
            $folder ='uploads/img/service/';

            // Make image name
            $service_category_image_name =  time().'-'.$service_category_image->getClientOriginalName();

            // Upload image
            $service_category_image->move($folder, $service_category_image_name);

            // Set input
            $input['service_category_image']= $service_category_image_name;

        } else {
            // Set input
            $input['service_category_image']= null;
        }

        if($request->hasFile('service_image')){

            // Get image file
            $service_image = $request->file('service_image');

            // Folder path
            $folder ='uploads/img/service/';

            // Make image name
            $service_image_name =  time().'-'.$service_image->getClientOriginalName();

            // Upload image
            $service_image->move($folder, $service_image_name);

            // Set input
            $input['service_image']= $service_image_name;

        } else {
            // Set input
            $input['service_image']= null;
        }

        // Record to database
        ServiceCategory::firstOrCreate([
            'language_id' => getLanguage()->id,
            'type' => $input['type'],
            'icon' => $input['icon'],
            'service_category_image' => $input['service_category_image'],
            'category_name' => $input['category_name'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'btn_name' => $input['btn_name'],
            'btn_link' => $input['btn_link'],
            'image_status' => $input['image_status'],
            'service_image' => $input['service_image'],
            'status' => $input['status'],
            'order' => $input['order']
        ]);

        return redirect()->route('service-category.create')
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
        $service = ServiceCategory::findOrFail($id);

        return view('admin.service.edit', compact('service'));
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
            'category_name'   =>  [
                'required',
                'max:255',
                Rule::unique('service_categories')->ignore($id),
            ],
            'type' => 'in:icon,image',
            'service_category_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'image_status'   =>  'in:show,hide',
            'service_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'status'   =>  'in:published,draft',
            'order'   =>  'required|integer',
        ]);

        // Get model
        $service = ServiceCategory::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('service_category_image')){

            // Get image file
            $service_category_image = $request->file('service_category_image');

            // Folder path
            $folder ='uploads/img/service/';

            // Make image name
            $service_category_image_name =  time().'-'.$service_category_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$service->service_category_image));

            // Upload image
            $service_category_image->move($folder, $service_category_image_name);

            // Set input
            $input['service_category_image'] = $service_category_image_name;

        }

        if($request->hasFile('service_image')){

            // Get image file
            $service_image = $request->file('service_image');

            // Folder path
            $folder ='uploads/img/service/';

            // Make image name
            $service_image_name =  time().'-'.$service_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$service->service_image));

            // Upload image
            $service_image->move($folder, $service_image_name);

            // Set input
            $input['service_image'] = $service_image_name;

        }


        // Update to database
        ServiceCategory::find($id)->update($input);

        return redirect()->route('service-category.create')
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
        // Retrieving a model
        $service = ServiceCategory::find($id);

        // Folder path
        $folder = 'uploads/img/service/';

        // Delete Image
        File::delete(public_path($folder.$service->service_category_image));
        File::delete(public_path($folder.$service->service_image));

        // Delete model
        $service->delete();

        return redirect()->route('service-category.create')
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
            return redirect()->route('service-category.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieving a model
            $service = ServiceCategory::find($id);

            // Folder path
            $folder = 'uploads/img/service/';

            // Delete Image
            File::delete(public_path($folder.$service->service_category_image));
            File::delete(public_path($folder.$service->service_image));

            // Delete model
            $service->delete();


        }

        return redirect()->route('service-category.create')
            ->with('success', 'content.deleted_successfully');
    }
}
