<?php

namespace App\Http\Controllers\F_admin;

use Auth;
use DB;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\admin\UsersRequest;
use App\Http\Controllers\Controller;
use App\models\Users;
use Validator;
use Mail;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $name;

    public function __construct() {
        $this->name = 'users';

    }
    
    public function index() {
        
        $data = array();
        $data['title'] = 'All Users List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Add New Users';
        $data['cname'] = $this->name;
        $data['destroy'] = "admin." . $data['cname'] . ".destroy";
        $data['table'] = "<th>SIR</th><th>Name</th><th>Email</th><th>Office</th><th>Status</th><th>Process</th>";
        $data['users'] = Db::table('users')
                            ->leftJoin('office as o', 'users.office_id', '=', 'o.id')
                            ->select('users.*', 'o.name as office_name')
                            ->where('user_type','<>',1)->get(); 
        $data['i'] = 1;
        return view('admin/users/index')->with('data', $data)->with('disc_list', 1);
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
        $data['office'] = Db::table('office')->get();
        return view('admin/users/create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request) {
        
        //return $request->all();
        
        $random = str_random(30);
        
        $data = array();
        $data['title'] = 'All Office List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Add New Office';

        $input = [];
        $input['name'] = $request->input('name');
        $input['email'] = trim($request->input('email'));
        $input['office'] = $request->input('office');
        $input['password'] = trim(bcrypt($request->input('password')));
        $input['office_id'] = $request->input('office');
        $input['remember_token'] = $random;
        $input['user_type'] = 2;
        $input['is_activated'] = 0;
        Db::table('office')->get();
        $user = Users::create($input)->toArray();
        $user['link'] = $random;
        DB::table('user_activations')->insert(['id_user' => $user['id'], 'token' => $user['link']]);
        Mail::send('auth.emails.activation', $user, function($message) use ($user) {
            $message->to($user['email']);
            $message->from(config('mail.from.address'), config('mail.from.name'));
            $message->subject('Site - Activation Code');
        });
        
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
        $data = array();
        $data['title'] = 'All Descrepancy List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Add New Descrepancy';
        $data['cname'] = $this->name;
        $show = Users::findOrFail($id);
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
        $data['title'] = 'All Descrepancy List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Update Discrepancy';
        $data['cname'] = $this->name;
        $data['update'] = "admin." . $data['cname'] . ".update";
        $show = Users::findOrFail($id);
        $data['office'] = Db::table('office')->get();
        return view('admin.users.update')->with('data', $data)->with('show', $show)->with('disc_add', 1);
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
        $blog = Users::findOrFail($id);
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
        Users::destroy($id);
        Session::flash('success', "<span class=text-yellow> &nbsp; &nbsp; Data Deleted Successfully </span>");
        return redirect()->back();
       
    }
    
}
