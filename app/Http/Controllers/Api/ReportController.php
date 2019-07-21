<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        // $result = Item::where("price", ">", $request->price)->with('location', 'category')->get();
        // SELECT COUNT(*) as `COUNT`, `ca2`.name as `parent_category`, `ca`.name as `category`, `lo`.name as `location` from `items` i INNER JOIN `locations` lo ON `lo`.id = `i`.location_id INNER JOIN `categories` `ca` ON `ca`.id = `i`.category_id LEFT JOIN `categories` ca2 ON `ca`.parent_id = `ca2`.id where `i`.price >= 20
        $result = DB::table('items')
        ->select("ca2.name as parent_category", "ca.name as category", "lo.name as location", DB::raw("COUNT(*) as Count"))
        ->join("locations as lo", "lo.id", "=", "items.location_id")
        ->join("categories as ca", "ca.id", "=", "items.category_id")
        ->leftjoin("categories as ca2", "ca.parent_id", "=", "ca2.id")
        ->groupBy("parent_category", "category", "location")
        ->where("items.price", ">=", $request->price)
        ->get();
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
