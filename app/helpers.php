<?php

use App\Models\Admin\Language;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.09.2020
 * Time: 19:30
 */

// Get language for create data
function getLanguage() {

    // Retrieve active langauage
    $language = Language::where('status', 1)->first();

    return $language;

}

// Get site Language
function getSiteLanguage() {

    if (session()->has('language_id_from_dropdown')) {

        $language_id_from_dropdown = session()->get('language_id_from_dropdown');

        $language = Language::find($language_id_from_dropdown);

        return $language;

    } else {

        $language = Language::where('default_site_language', 1)->first();

        return $language;


    }

}
