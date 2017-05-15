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
    		<h2>Book Manager</h2>
    		<div class="row">
    			<div class="col-xs-12">
    				<div class="pull-left">
	    				<form action="/dashboard/book/search" method="POST" class="form-inline">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
						  	<div class="form-group">
						    	<input type="text" class="form-control dashboard-search" name="keyword" placeholder="Search a user by name or email">
						  	</div>
						  	<button type="submit" class="btn btn-default">Search</button>
						</form>
	    			</div>
	    			<div class="pull-right">
	    				<button type="button" class="btn btn-success">New Book</button>
	    			</div>
    			</div>
    		</div>
    		<div class="dashboard-table">
    			<table class="table table-hover">
    				<thead>
    					<tr>
    						<th>Title</th>
    						<th>Author</th>
    						<th>Price</th>
                            <th>Category</th>
                            <th>Qty</th>
    						<th>...</th>
    					</tr>
    				</thead>
    				<tbody>
    					@each('dashboard_book.book_row', $books, 'book')
    				</tbody>
    			</table>
    		</div>

    		{{ $books->links() }}
    	</div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/db_book.js') }}"></script>
@endsection