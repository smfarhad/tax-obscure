<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = array();
        $data['title'] = 'Dashboard';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Add New Descrepancy';
        return view('admin/home')->with('data',$data);
    }

}
