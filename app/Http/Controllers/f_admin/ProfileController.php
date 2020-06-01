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

class ProfileController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $name;
    private $user_id;

    public function __construct() {
        $this->name = 'profile';
        $this->user_id = Auth::user()->id;
    }
    
    public function index() {
        $data = array();
        $data['title'] = 'All Profile List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Update Profile';
        $data['cname'] = $this->name;
        $data['update'] = "admin." . $data['cname'] . ".update";
        $show = Db::table('users')
                    ->leftJoin('office as o', 'users.office_id', '=', 'o.id')
                        ->select('users.*', 'o.name as office_name')
                            ->where('users.id', $this->user_id)
                                ->first();
        $data['office'] = Db::table('office')->get();
        return view('admin.profile.update')->with('data', $data)->with('show', $show)->with('disc_add', 1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request) {
        
        $random = str_random(30);
        $data = array();
        $data['title'] = 'All Profile List';
        $data['list'] = 'Dashboard';
        $data['add'] = 'Add New Profile';

        $input = [];
        $input['name'] = $request->input('name');
        $input['email'] = $request->input('email');
        $input['office'] = $request->input('office');
        $input['password'] = bcrypt($request->input('password'));
        $input['office_id'] = $request->input('office');
        Db::table('office')->get();
        $user = Users::create($input)->toArray();
        $user['link'] = $random;
        DB::table('user_activations')->insert(['id_user' => $user['id'], 'token' => $user['link']]);
        Mail::send('auth.emails.activation', $user, function($message) use ($user) {
            $message->to($user['email']);
            $message->from('farhad1556@gmail.com', 'Taxeszone.com');
            $message->subject('Site - Activation Code');
        });
        Session::flash('success', "<span class=text-green> &nbsp; &nbsp; Data Inserted Successfully </span>");
        return back()->withInput($request->input())->with('disc_add', 1)->with('errors', $validator->errors());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
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
}
