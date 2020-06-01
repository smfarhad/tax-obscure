<?php

namespace App\Http\Controllers\F_admin;

use Auth;
use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Office;

class OfficeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $name;

    public function __construct() {
        $this->name = 'office';
    }

    public function index() {
        $data = array();
        $data['title'] = 'All Office List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Add New Office';
        $data['cname'] = $this->name;
        $data['destroy'] = "admin." . $data['cname'] . ".destroy";
        $data['table'] = "<th>SIR</th><th>Office Name</th><th> Head Office </th><th style='width:100px;'>Process</th>";
        $data['office'] = DB::table('office as o')
                            ->leftJoin('office as p', 'o.parent_id', '=', 'p.id')
                            ->select('o.id', 'o.parent_id', 'p.name as parent', 'o.name')
                            ->orderBy('o.order_by', 'asc')
                            ->get();
        $data['i'] = 1;
        return view('admin/office/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data = array();
        $data['title'] = 'All Office List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Add New Office';
        $data['cname'] = $this->name;
        $data['office'] = DB::table('office as o')
                    ->leftJoin('office as p', 'o.parent_id', '=', 'p.id')
                    ->select('o.id', 'o.parent_id', 'p.name as parent', 'o.name')
                    ->orderBy('parent_id', 'asc')
                    ->get();    
        return view('admin/office/create')
                ->with('data', $data)
                ->with('i',1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = array();
        $data['title'] = 'All Office List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Add New Office';

        $input = [];
        $input['parent_id'] = $request->input('parent');
        $input['name'] = $request->input('name');
        $input['order_by'] = $request->input('order_by');
        $office = DB::table('office')->insert($input);
        Session::flash('success', "<span class=text-green> &nbsp; &nbsp; Data Inserted Successfully </span>");
        return back()->withInput($request->input())->with('disc_add', 1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('admin/office');
        $data = array();
        $data['title'] = 'All Descrepancy List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Add New Descrepancy';
        $data['cname'] = $this->name;
        $show = Office::findOrFail($id);
        $hearing = DB::table('hearings')->where('discrepancy_id',$id)->orderBy('hearing_date', 'desc')->get();
        //dd($hearing);
        return view('admin.discrepancy.show')
                ->with('data', $data)
                ->with('show', $show)
                ->with('hearing', $hearing)
                ->with('i', 1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = array();
        $data['title'] = 'All Office List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Update Office';
        $data['cname'] = $this->name;
        $data['update'] = "admin." . $data['cname'] . ".update";
        
        $data['office'] = DB::table('office as o')
            ->leftJoin('office as p', 'o.parent_id', '=', 'p.id')
            ->select('o.id', 'o.parent_id', 'p.name as parent', 'o.name')
            ->orderBy('parent_id', 'asc')
            ->get();  
        $show = Office::findOrFail($id);
        return view("admin.$this->name.update")->with('data', $data)->with('show', $show)->with('disc_add', 1)->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
        $office = Office::findOrFail($id);
        $input = [];
        $input['name'] = $request->input('name');
        $input['tin'] = str_replace('-', '', $request->input('tin'));
        $input['comments'] = $request->input('comments');
        $input['order_by'] = $request->input('order_by');
        $input['updated_by'] = Auth::user()->id;
        $input['updated_at'] = date('Y-m-d H:i:s');
        $input['office_id'] = Auth::user()->office_id;
        $office->update($input);
        Session::flash('success', "<span class=text-green> &nbsp; &nbsp; Data Updated Successfully</span>");
        return back()->withInput($request->input());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Office::destroy($id);
        Session::flash('success', "<span class=text-yellow> &nbsp; &nbsp; Data Deleted Successfully </span>");
        return redirect()->back();
    }

}
