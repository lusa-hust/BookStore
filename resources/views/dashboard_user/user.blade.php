@extends('layouts.layout')

@section('style')
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-xs-3 col-md-2">
    		<ul>
    			<li>
    				<a href="/dashboard/user">Users</a>
    			</li>
    			<li>
    				<a href="/dashboard/book">Books</a>
    			</li>
    		</ul>
    	</div>
    	<div class="col-xs-9 col-md-10">
    		<h2>User Manager</h2>
    		<div class="row">
    			<div class="col-xs-12">
    				<div class="pull-left">
	    				<form class="form-inline">
						  	<div class="form-group">
						    	<input type="text" class="form-control dashboard-search" name="keyword" placeholder="Search a user by name or email">
						  	</div>
						  	<button type="submit" class="btn btn-default">Search</button>
						</form>
	    			</div>
	    			<div class="pull-right">
	    				<button type="button" class="btn btn-success">New User</button>
	    			</div>
    			</div>
    		</div>
    		<div class="dashboard-table">
    			<table class="table table-hover">
    				<thead>
    					<tr>
    						<th>Name</th>
    						<th>Email</th>
    						<th>Admin</th>
    						<th>...</th>
    					</tr>
    				</thead>
    				<tbody>
    					@each('dashboard_user.user_row', $users, 'user')
    				</tbody>
    			</table>
    		</div>

    		{{ $users->links() }}
    	</div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/home.js') }}"></script>
@endsection