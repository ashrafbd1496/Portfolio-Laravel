<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\GetOfferMessage;
use Illuminate\Http\Request;

class ExternalUrlController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $language = getLanguage();
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $messages = GetOfferMessage::all()->sortByDesc("id");

        return view('admin.external_url.create', compact('external_url', 'messages'));
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
            'btn_name'   =>  'required|max:255',
            'button_type'   =>  'in:external_url,get_offer',
            'status'   =>  'in:enable,disable',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ExternalUrl::firstOrCreate([
            'language_id' => getLanguage()->id,
            'btn_name' => $input['btn_name'],
            'btn_link' => $input['btn_link'],
            'button_type' => $input['button_type'],
            'status' => $input['status']
        ]);

        return redirect()->route('external-url.create')
            ->with('success','content.created_successfully');
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
            'btn_name'   =>  'required|max:255',
            'button_type'   =>  'in:external_url,get_offer',
            'status'   =>  'in:enable,disable',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        ExternalUrl::find($id)->update($input);

        return redirect()->route('external-url.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_offer_message_update($id)
    {
        // Update to database
        GetOfferMessage::find($id)->update(['read' => 1]);

        return redirect()->route('external-url.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function mark_all_read_update()
    {
        $get_offer_messages = GetOfferMessage::all()->where('read', 0);

        // Update to database
        foreach ($get_offer_messages as $message) {
            GetOfferMessage::find($message->id)->update(['read' => 1]);
        }

        return redirect()->route('external-url.create')
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
        $get_offer_message = GetOfferMessage::find($id);

        // Delete record
        $get_offer_message->delete();

        return redirect()->route('external-url.create')
            ->with('success', 'content.deleted_successfully');
    }
}
