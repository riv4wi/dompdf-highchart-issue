<?php

namespace App\Http\Controllers;

use App\Support\Summary;
use Illuminate\Http\Response;

class DownloadSummaryController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function download(): Response
    {
        return Summary::download();
    }

    public function showGraphic()
    {
        return Summary::showGraphic();
    }

}
