<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\User;

class UserManagement extends Controller
{
	protected $user_per_page = 20;
    public function index() {
    	$users = User::paginate($this->user_per_page);
    	return view('dashboard_user.user')->with('users', $users);
    }

    public function search() {
    	$keyword = Input::get('keyword', '');
    	$keyword = '%'.$keyword.'%';

    	$users = DB::table('users')->where('name', 'like', $keyword)
    								->orWhere('email', 'like', $keyword)
    								->paginate($this->user_per_page);
    	return view('dashboard_user.user')->with('users', $users);
    }
}
