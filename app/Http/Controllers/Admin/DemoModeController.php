<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DemoModeController extends Controller
{

    public function update_demo_mode()
    {
        return redirect()->back()->with('warning', 'This is Demo version. You can not add or change any thing.');
    }

}
