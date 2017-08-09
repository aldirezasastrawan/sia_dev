<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use App\Role;
use DB;

class LoginController extends Controller
{

	public function __construct()
    {
        $this->middleware('guest');
    }



    public function getLogin()
    {
    	return view('auth.login');
    }



    public function postLogin(Request $request)
    {
    	if (Auth::attempt(['email' => $request->EmailUsername,'password' => $request->password]))
        {
                if(Auth::user()->role->namaRule === 'Administrator'){
                    return redirect('/admin');
                }
                elseif(Auth::user()->role->namaRule === 'Pimpinan'){
                    return redirect('/pimpinan');
                }
                elseif(Auth::user()->role->namaRule === 'Guru'){
                    return redirect('/guru');
                }
                elseif(Auth::user()->role->namaRule === 'Wali'){
                    return redirect('/wali');
                }
                else{
                    return redirect('/logout');
                }

    	}elseif (Auth::attempt(['username' => $request->EmailUsername,'password' => $request->password]))
        {
            if(Auth::user()->role->namaRule === 'Administrator'){
                    return redirect('/admin');
                }
                elseif(Auth::user()->role->namaRule === 'Pimpinan'){
                    return redirect('/pimpinan');
                }
                elseif(Auth::user()->role->namaRule === 'Guru'){
                    return redirect('/guru');
                }
                elseif(Auth::user()->role->namaRule === 'Wali'){
                    return redirect('/wali');
                }
                else{
                    return redirect('/logout');
                }
    	}
    	else{
    		return redirect('/login');
    	}
    }
}
