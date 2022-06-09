<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteInfo;
use Illuminate\Http\Request;

class SiteInfoController extends Controller
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
        $site_info = SiteInfo::where('language_id', $language->id)->first();

        return view('admin.setting.site_info.create', compact('site_info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get All Request
        $input = $request->all();

        // Record to database
        SiteInfo::firstOrCreate([
            'language_id' => getLanguage()->id,
            'short_desc' => $input['short_desc'],
            'copyright' => $input['copyright'],
            'address' => $input['address'],
            'address_map_link' => $input['address_map_link'],
            'email' => $input['email'],
            'phone' => $input['phone']
        ]);

        return redirect()->route('site-info.create')
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
        // Get All Request
        $input = $request->all();

        // Update model
        SiteInfo::find($id)->update($input);

        return redirect()->route('site-info.create')
            ->with('success', 'content.updated_successfully');
    }


}
