<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Item;

class ReportController extends Controller
{

    public function index()
    {
        return view('reports');
    }

}
