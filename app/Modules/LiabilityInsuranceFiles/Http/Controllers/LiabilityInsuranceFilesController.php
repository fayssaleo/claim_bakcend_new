<?php

namespace App\Modules\LiabilityInsuranceFiles\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LiabilityInsuranceFilesController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("LiabilityInsuranceFiles::welcome");
    }
}
