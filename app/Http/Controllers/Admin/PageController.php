<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Page;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $language = getLanguage();
        $pages = Page::where('language_id', $language->id)->orderBy('id', 'desc')->get();

        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
            'page_title' => 'required|unique:pages',
            'desc' => 'required',
            'status' => 'integer|in:0,1',
            'display_header_menu' => 'integer|in:0,1,2',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Page::create(
            [
                'language_id' => getLanguage()->id,
                'page_title' => $input['page_title'],
                'desc' => Purifier::clean($input['desc']),
                'status' => $input['status'],
                'display_header_menu' => $input['display_header_menu'],
                'order' => $input['order']
            ]
        );

        return redirect()->route('page.index')
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
        $page = Page::findOrFail($id);

        return view('admin.page.edit', compact( 'page'));
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
            'page_title'   =>  [
                'required',
                Rule::unique('pages')->ignore($id),
            ],
            'desc' => 'required',
            'status' => 'integer|in:0,1',
            'display_header_menu' => 'integer|in:0,1,2',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // XSSCleaner Cleaner
        $input['desc'] = Purifier::clean($input['desc']);

        // Update to database
        Page::find($id)->update($input);

        return redirect()->route('page.index')
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
        $page = Page::find($id);

        // Delete record
        $page->delete();

        return redirect()->route('page.index')
            ->with('success','content.deleted_successfully');
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
            return redirect()->route('page.index')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $page = Page::findOrFail($id);

            // Delete record
            $page->delete();

        }

        return redirect()->route('page.index')
            ->with('success', 'content.deleted_successfully');
    }
}

