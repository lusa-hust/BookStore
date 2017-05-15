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
	    				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#book-modal">New Book</button>
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

<!-- Modal -->
<div class="modal fade" id="book-modal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add new book</h4>
            </div>
            <div class="modal-body">
                <form id="add-book-form" class="form-horizontal" action="{{ route('dashboard.book.add') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Title:</label>
                        <div class="col-sm-10">
                            <input type="text" id="title" class="form-control" name="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="author">Author:</label>
                        <div class="col-sm-10"> 
                            <input type="text" id="author" class="form-control" name="author" placeholder="Enter author">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="price">Price:</label>
                        <div class="col-sm-10"> 
                            <input type="number" id="price" class="form-control" name="price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="qty">Quantity:</label>
                        <div class="col-sm-10"> 
                            <input type="number" id="qty" class="form-control" name="qty">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="control-label col-sm-2">Categories:</label>
                        <div class="col-sm-10">
                            @foreach($categories as $category)
                                <div class="checkbox">
                                    <label><input name="categories[]" value="{{$category->id}}" type="checkbox"> {{$category->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="image">Cover image:</label>
                        <div class="col-sm-10"> 
                            <input type="file" id="image" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="intro">Introduction:</label>
                        <div class="col-sm-10"> 
                            <textarea id="intro" name="intro" class="form-control"></textarea> 
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="add-book-button" type="submit" class="btn btn-success">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/db_book.js') }}"></script>
@endsection