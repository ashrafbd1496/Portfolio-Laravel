<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SkillSection;
use Illuminate\Http\Request;

class SkillSectionController extends Controller
{
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
            'section_title' => 'required',
            'desc' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        SkillSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'section_title' => $input['section_title'],
            'desc' => $input['desc']
        ]);

        return redirect()->route('skill.create')
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
            'section_title' => 'required',
            'desc' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Update model
        SkillSection::find($id)->update($input);

        return redirect()->route('skill.create')
            ->with('success', 'content.updated_successfully');
    }
}
