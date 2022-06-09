<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.preview.index');

    }

    // Set session for language
    public function set_homepage($choose_version_id){


        // Via the global helper...
        session(['choose_version' => $choose_version_id]);

        $choose_version = session()->get('choose_version');

        return redirect()->route('homepage');

    }

}
