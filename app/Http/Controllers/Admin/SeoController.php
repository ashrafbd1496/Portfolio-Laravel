<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
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
        $seo = Seo::where('language_id', $language->id)->first();

        return view('admin.setting.seo.create', compact('seo'));
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
            'site_name' => 'required',
            'site_desc' => 'required',
            'site_keywords' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Seo::firstOrCreate([
            'language_id' => getLanguage()->id,
            'site_name' => $input['site_name'],
            'site_desc' => $input['site_desc'],
            'site_keywords' => $input['site_keywords'],
            'fb_app_id' => $input['fb_app_id']
        ]);

        return redirect()->route('seo.create')
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
            'site_name' => 'required',
            'site_desc' => 'required',
            'site_keywords' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Update model
        Seo::find($id)->update($input);

        return redirect()->route('seo.create')
            ->with('success', 'content.updated_successfully');
    }

}
