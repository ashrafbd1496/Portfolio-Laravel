<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Team;
use App\Models\Admin\TeamSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{

    public function create()
    {
        // Retrieving a model
        $language = getLanguage();
        $teams = Team::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $team_section = TeamSection::where('language_id', $language->id)->first();

        return view('admin.team.create', compact('teams', 'team_section'));
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
            'image_status' => 'in:show,hide',
            'team_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('team_image')){

            // Get image file
            $team_image = $request->file('team_image');

            // Folder path
            $folder = 'uploads/img/team/';

            // Make image name
            $team_image_name = time().'-'.$team_image->getClientOriginalName();

            // Upload image
            $team_image->move($folder, $team_image_name);

            // Set input
            $input['team_image'] = $team_image_name;

        } else {
            // Set input
            $input['team_image'] = null;
        }

        // Record to database
        Team::create([
            'language_id' => getLanguage()->id,
            'image_status' => $input['image_status'],
            'team_image' => $input['team_image'],
            'name' => $input['name'],
            'job' => $input['job'],
            'link_2' => $input['link_2'],
            'link_3' => $input['link_3'],
            'link_4' => $input['link_4'],
            'link_5' => $input['link_5'],
            'order' => $input['order']
        ]);

        return redirect()->route('team.create')
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
        $team = Team::findOrFail($id);

        return view('admin.team.edit', compact('team'));
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
            'image_status' => 'in:show,hide',
            'team_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get model
        $team = Team::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('team_image')){

            // Get image file
            $team_image = $request->file('team_image');

            // Folder path
            $folder ='uploads/img/team/';

            // Make image name
            $team_image_name =  time().'-'.$team_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$team->team_image));

            // Upload image
            $team_image->move($folder, $team_image_name);

            // Set input
            $input['team_image'] = $team_image_name;

        }

        // Record to database
        Team::find($id)->update($input);

        return redirect()->route('team.create')
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
        $team = Team::find($id);

        // Folder path
        $folder = 'uploads/img/team/';

        // Delete Image
        File::delete(public_path($folder.$team->team_image));

        // Delete record
        $team->delete();

        return redirect()->route('team.create')
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
            return redirect()->route('team.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $team = Team::findOrFail($id);

            // Folder path
            $folder = 'uploads/img/team/';

            // Delete Image
            File::delete(public_path($folder.$team->team_image));

            // Delete record
            $team->delete();

        }

        return redirect()->route('team.create')
            ->with('success', 'content.deleted_successfully');
    }
}
