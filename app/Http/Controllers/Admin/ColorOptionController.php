<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ColorOption;
use Illuminate\Http\Request;

class ColorOptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $color_option = ColorOption::first();

        return view('admin.setting.color_option.create', compact('color_option'));
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
            'color_option' => 'required|in:0,1,2,3,4,5,6,7,8,9,10,11',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ColorOption::firstOrCreate([
            'color_option' => $input['color_option']
        ]);

        return redirect()->route('color-option.create')
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
            'color_option' => 'required|in:0,1,2,3,4,5,6,7,8,9,10,11',
        ]);

        // Get All Request
        $input = $request->all();

        // Update user
        ColorOption::find($id)->update($input);

        return redirect()->route('color-option.create')
            ->with('success', 'content.updated_successfully');
    }


}
