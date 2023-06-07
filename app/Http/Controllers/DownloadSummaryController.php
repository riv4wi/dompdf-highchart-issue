<?php

namespace App\Http\Controllers;

use App\Support\Summary;

class DownloadSummaryController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return Summary::download();
    }

}
