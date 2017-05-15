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

    public function delete($id) {
    	$data_return = Array('state' => 0);
    	$user = User::find($id);
    	if (!empty($user)) {
    		$user->delete();
    		$data_return['state'] = 1;
    	}

    	return response()->json($data_return);
    }

    public function edit($id)
    {
        $user = User::find($id);

        $html = '';
        if (request()->wantsJson()) {
            $html .= view('dashboard_user/edit_modal', compact('user'));
            return response()->json(['status'=> true, 'html'=>$html]);
        }

        return response()->json([
            'status' => false
        ]);
    }


    public function update(Request $request) {
    	$this->validate($request, [
            'id' => 'required',
            'name' => 'required|',
            'email' => 'required'
        ]);

    	$input = $request->all();
    	$user = User::find($input['id']);

    	if (empty($user))
    		return redirect()->back();

    	$admin = isset($input['admin']) ? 1 : 0;

    	if (!empty($input['password']) && !empty($input['confirm_password'])) {
    		if ($input['password'] != $input['confirm_password']) {
    			return redirect()->back();
    		} else {
    			$user->update([
	    			'name' => $input['name'],
	    			'email' => $input['email'],
	    			'password' => bcrypt($input['password']),
	    			'admin' => $admin
	    		]);
    		}
    		
    	} else {
    		$user->update([
	    			'name' => $input['name'],
	    			'email' => $input['email'],
	    			'admin' => $admin
	    		]);
    	}

    	$user->save();

    	return redirect()->back();
    }
}
