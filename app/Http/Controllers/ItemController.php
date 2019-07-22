<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        
        return view('items');
    }
}
