<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin =  DB::table('admins')
        ->select('id','name','email','position','expire')
        ->orderBy('id','desc')
        ->get();  

        return view('admin.admins',['admin' => $admin]);
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
        $request->validate([
            'name'=> ['required','string','max:255'],
            'email'=> ['required','email','max:255'],
            'password'=> ['required','string','min:5','max:255'],
            'position'=> ['required','string','max:255'],
            'expire'=> ['required','string','max:255'],
        ]);

        
        $admin = Admin::where('email', '=', $request->email)->first();
        //if email already exist
        if($admin){
            return redirect(route('admin.admin.index'))->with('fail', 'Email Already Exist');
        }else{

            //create new admin
            $newAdmin = new Admin;
            $newAdmin->name = ucwords($request->name);
            $newAdmin->email = $request->email;
            $newAdmin->password = Hash::make($request->password);
            $newAdmin->position = $request->position;
            $newAdmin->expire = $request->expire;
            $newAdmin->save();

            return redirect(route('admin.admin.index'))->with('success', 'New Admin Added Successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
