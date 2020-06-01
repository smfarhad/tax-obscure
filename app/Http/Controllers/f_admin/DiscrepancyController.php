<?php

namespace App\Http\Controllers\F_admin;

use Auth;
use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\Discrepancy;

class DiscrepancyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $name;
    private $office_id;
    private $parent_id;

    public function __construct() {
        $this->name = 'discrepancy';
        $this->office_id = Auth::user()->office_id;
    }

    public function index() {

        $data = array();
        $data['title'] = 'All Descrepancy List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Add New Descrepancy';
        $data['cname'] = $this->name;
        $data['destroy'] = "admin." . $data['cname'] . ".destroy";
        $data['table'] = "<th>SIR</th><th>Name</th><th>Tin</th><th>Office</th><th>Asses Year</th><th>Process</th>";

        $office = DB::table('office')
                ->select('parent_id')
                ->where('id', $this->office_id)
                ->get();
        if (count($office) > 0) {
            $this->parent_id = $office[0]->parent_id;
        } else {
            $this->parent_id = '';
        }
        if ($this->parent_id) {
            $office = DB::table('office')
                    ->select('id')
                    ->where('id', $this->office_id)
                    ->orWhere('parent_id', $this->office_id)
                    ->get();
            $office_array = [];
            $i = 0;
            foreach ($office as $row) {
                $office_array[$i] = $row->id;
                $i++;
            }

            $data['discrepancy'] = DB::table('discrepancy as d')
                    ->leftJoin('office as o', 'd.office_id', '=', 'o.id')
                    ->select('d.id', 'd.name', 'd.tin', 'd.office_id', 'd.asses_year', 'o.name as office')
                    ->whereIn('d.office_id', $office_array)
                    ->get();
        } else {
            $data['discrepancy'] = DB::table('discrepancy as d')
                    ->leftJoin('office as o', 'd.office_id', '=', 'o.id')
                    ->select('d.id', 'd.name', 'd.tin', 'd.office_id', 'd.asses_year', 'o.name as office')
                    ->get();
        }

        $data['i'] = 1;
        return view('admin/discrepancy/index')->with('data', $data)->with('disc_list', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data = array();
        $data['title'] = 'All Descrepancy List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Add New Descrepancy';
        $data['cname'] = $this->name;
        return view('admin/discrepancy/create')->with('data', $data);
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
        $input['name'] = $request->input('name');
        $input['tin'] = str_replace('-', '', $request->input('tin'));
        $input['asses_year'] = $request->input('asses_year');
        $input['comments'] = $request->input('comments');
        $input['created_by'] = Auth::user()->id;
        $input['office_id'] = Auth::user()->office_id;
        $where = ['tin' => $input['tin']];
        $discrepancy = DB::table('discrepancy')
                ->select(DB::raw('YEAR(created_at) year'))
                ->where($where)
                ->whereYear('created_at', '=', date('Y'))
                ->where('asses_year', '=', $input['asses_year'])
                ->get();
        if (!count($discrepancy)) {
            Discrepancy::create($input);
            Session::flash('success', "<span class=text-green> &nbsp; &nbsp; Data Inserted Successfully </span>");
            return back()->withInput($request->input())->with('disc_add', 1);
        } else {
            Session::flash('success', "<span class=text-yellow> &nbsp; &nbsp; This TIN already inserted</span>");
            return back()->withInput($request->input())->with('disc_add', 1);
        }
        echo 'nothing';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data = array();
        $data['title'] = 'All Descrepancy List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Add New Descrepancy';
        $data['cname'] = $this->name;

        $show = DB::table('discrepancy as d')
                ->leftJoin('office as o', 'd.office_id', '=', 'o.id')
                ->leftJoin('users as u', 'd.created_by', '=', 'u.id')
                ->select('d.id', 'd.name', 'd.tin', 'd.office_id', 'd.asses_year', 'u.name as created_by', 'd.comments', 'd.created_at', 'd.deleted_by', 'd.deleted_at', 'o.name as office')
                ->where('d.id', $id)
                ->first();
        $hearing = DB::table('hearings')->where('discrepancy_id', $id)->orderBy('hearing_date', 'desc')->get();
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
        $data['title'] = 'All Descrepancy List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Update Discrepancy';
        $data['cname'] = $this->name;
        $data['update'] = "admin." . $data['cname'] . ".update";
        $show = Discrepancy::findOrFail($id);
        return view('admin.discrepancy.update')->with('data', $data)->with('show', $show)->with('disc_add', 1);
        ;
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
        $blog = Discrepancy::findOrFail($id);
        $input = [];
        $input['name'] = $request->input('name');
        $input['tin'] = str_replace('-', '', $request->input('tin'));
        $input['comments'] = $request->input('comments');
        $input['updated_by'] = Auth::user()->id;
        $input['updated_at'] = date('Y-m-d H:i:s');
        $input['office_id'] = Auth::user()->office_id;
        $blog->update($input);
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
        Discrepancy::destroy($id);
        Session::flash('success', "<span class=text-yellow> &nbsp; &nbsp; Data Deleted Successfully </span>");
        return redirect()->back();
    }

}
