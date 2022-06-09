<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $sections = Section::all();

        return view('admin.setting.section.create', compact( 'sections'));
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
        //Find a model
        $section = Section::find($id);

        if ($section->status == "show") {
            $status = "hide";
        } else {
            $status = "show";
        }

        // Update to database
        Section::find($id)->update(['status' => $status]);

        return redirect()->route('section.create')
            ->with('success', 'content.updated_successfully');
    }

}
