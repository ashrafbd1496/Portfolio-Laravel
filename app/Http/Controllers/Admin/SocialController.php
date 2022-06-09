<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $socials = Social::all();

        return view('admin.contact.social.create', compact('socials'));
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
            'social_media' => 'required|max:255',
            'link' => 'max:255',
            'status' => 'integer|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();


        // Record to database
        Social::firstOrCreate([
            'social_media' => $input['social_media'],
            'link' => $input['link'],
            'status' => $input['status']
        ]);

        return redirect()->route('social.create')
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
        // Retrieve a model
        $social = Social::findOrFail($id);

        return view('admin.contact.social.edit', compact('social'));
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
            'social_media' => 'required|max:255',
            'link' => 'max:255',
            'status' => 'integer|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        Social::find($id)->update($input);

        return redirect()->route('social.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {
        //Find a model
        $social = Social::find($id);

        if ($social->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        // Update to database
        Social::find($id)->update(['status' => $status]);

        return redirect()->route('social.create')
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
        $social = Social::find($id);

        // Delete record
        $social->delete();

        return redirect()->route('social.create')
            ->with('success', 'content.deleted_successfully');
    }

}