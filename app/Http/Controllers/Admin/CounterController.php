<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CounterController extends Controller
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
        $counters = Counter::where('language_id', $language->id)->orderBy('id', 'desc')->get();

        return view('admin.counter.create', compact('counters'));
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
            'type' => 'in:icon,image',
            'title' => 'required',
            'order' => 'required|integer',
            'counter_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('counter_image')){

            // Get image file
            $counter_image = $request->file('counter_image');

            // Folder path
            $folder ='uploads/img/counter/';

            // Make image name
            $counter_image_name =  time().'-'.$counter_image->getClientOriginalName();

            // Upload image
            $counter_image->move($folder, $counter_image_name);

            // Set input
            $input['counter_image'] = $counter_image_name;

        } else {
            // Set input
            $input['counter_image'] = null;
        }

        // Record to database
        Counter::create([
            'language_id' => getLanguage()->id,
            'type' => $input['type'],
            'icon' => $input['icon'],
            'counter_image' => $input['counter_image'],
            'title' => $input['title'],
            'timer' => $input['timer'],
            'order' => $input['order']
        ]);

        return redirect()->route('counter.create')
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
        $counter = Counter::findOrFail($id);

        return view('admin.counter.edit', compact('counter'));
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
            'type' => 'in:icon,image',
            'title' => 'required',
            'order' => 'required|integer',
            'counter_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get model
        $counter = Counter::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('counter_image')){

            // Get image file
            $counter_image = $request->file('counter_image');

            // Folder path
            $folder ='uploads/img/counter/';

            // Make image name
            $counter_image_name = time().'-'.$counter_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$counter->counter_image));

            // Upload image
            $counter_image->move($folder, $counter_image_name);

            // Set input
            $input['counter_image'] = $counter_image_name;

        }

        // Record to database
        Counter::find($id)->update($input);

        return redirect()->route('counter.create')
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
        $counter = Counter::find($id);

        // Folder path
        $folder = 'uploads/img/counter/';

        // Delete Image
        File::delete(public_path($folder.$counter->counter_image));

        // Delete record
        $counter->delete();

        return redirect()->route('counter.create')
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
            return redirect()->route('counter.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $counter = Counter::findOrFail($id);

            // Folder path
            $folder = 'uploads/img/counter/';

            // Delete Image
            File::delete(public_path($folder.$counter->counter_image));

            // Delete record
            $counter->delete();

        }

        return redirect()->route('counter.create')
            ->with('success', 'content.deleted_successfully');
    }
}
