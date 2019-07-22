<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        return view('reports');
    }

}
