<?php

namespace App\Modules\Claim\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClaimController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Claim::welcome");
    }
}
