<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.auth.login');
    }

    protected function login(Request $request)
    {
        $request->validate([
            'email'=>['required','exists:admins,email'],
            'password'=>['required']
        ]);

        //find the account
        $admin = Admin::where('email',$request->email)->first();

        //if account exist
        if($admin){
            //get the expire date
            $expire = $admin->expire;
            $today = date('Y-m-d', time());
            
            if ($expire < $today) {
                //account expired
                return redirect()->route('adminlogin.index')->with('fail','Login Fail');                
            }else{
                //account not expire
                $credential = $request->only('email','password');
    
                if(Auth::guard('admin')->attempt($credential)){
                    return redirect()->route('admin.dashboard.index');
                }else{
                    return redirect()->route('adminlogin.index')->with('fail','Login Fail');
                }
            }

        }else{
            
            return redirect()->route('adminlogin.index')->with('fail','Login Fail');
        }

    }

    protected function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('adminlogin.index');
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
