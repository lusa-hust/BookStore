<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserManagement extends Controller
{
	protected $user_per_page = 20;
    public function index() {
    	$users = User::paginate($this->user_per_page);
    	return view('dashboard_user.user')->with('users', $users);
    }
}
