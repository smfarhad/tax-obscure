<?php

namespace App\Http\Controllers;

use App\models\Hearing;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;


class SearchController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = 'Search';
        $name = 'search';
        $value = '';
        $attributes = ['placeholder' => 'Please search with TIN Number'];
        return view('client.pages.index')
                ->with('title', $title)
                ->with('name', $name)
                ->with('value', $value)
                ->with('attributes', $attributes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SearchRequest $request){
        $today = date('Y-m-d');
        $title = 'Haring details';
        $name = 'search';
        $tin = $request->input('search');
        $where = ['tin'=>$tin];
        $assess = DB::table('hearings as h')
                        ->leftJoin('discrepancy as d', 'h.discrepancy_id', '=', 'd.id')
                        ->select('h.id', 'd.name', 'place','h.hearing_date as date', 'd.tin', 'd.asses_year', 'h.active')
                        ->where($where)
                        //->whereDate('h.hearing_date', '>=', date('Y-m-d'))
                        ->orderBy('h.hearing_date', 'desc')->get();
        return view('client.pages.search')
                ->with('title',$title)
                ->with('name',$name)
                ->with('assess',$assess);
    }
    public function show($id) {
        $hearing = Hearing::findOrFail($id);
        return view('details_search')->with('hearing', $hearing);
    }
}
