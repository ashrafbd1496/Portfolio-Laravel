<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TawkTo;
use Illuminate\Http\Request;

class TawkToController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $tawk_to = TawkTo::first();

        return view('admin.setting.tawk_to.create', compact('tawk_to'));
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
        TawkTo::firstOrCreate([
            'tawk_to' => $input['tawk_to']
        ]);

        return redirect()->route('tawk-to.create')
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
        TawkTo::find($id)->update($input);

        return redirect()->route('tawk-to.create')
            ->with('success', 'content.updated_successfully');
    }


}
