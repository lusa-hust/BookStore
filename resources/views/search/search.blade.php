@extends('layouts.layout')

@section('style')
<link href="{{ asset('css/search.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="search-wrap">
	<div class="search-container">
		<div class="search-sidebar">

			<div class="search-panel search-panel-info">
				<div class="search-panel-heading" role="tab">
					<h4 class="search-panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#boxleft" href="#collapse-category" aria-expanded="true" aria-controls="collapse-category">Filter by category</a>
					</h4>
				</div>

				<div class="colapse-category">
					<div class="search-list-group">
						@foreach($categories as $category)
						<div class="search-list-group-item">
							<label class="checkbox">
								<input type="checkbox" name="checkbox[]" value="{{$category->id}}" id="search-checkbox">
								<i></i>{{$category->name}}
							</label>
						</div>   
                        @endforeach
						
					</div>
				</div>
			</div>

			<div class="search-panel search-panel-info">
				<div class="search-panel-heading" role="tab">
					<h4 class="search-panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#boxleft" href="#collapse-category" aria-expanded="true" aria-controls="collapse-category">Filter by price</a>
					</h4>
				</div>

				<div class="colapse-category">
					<div class="search-list-group">
						<div class="search-list-group-item">
							<label class="checkbox">
								<input type="checkbox" name="checkbox" id="search-checkbox">
								<i></i>0 - 100k
							</label>
						</div>
						<div class="search-list-group-item">
							<label class="checkbox">
								<input type="checkbox" name="checkbox" id="search-checkbox">
								<i></i>100 - 200k
							</label>
						</div>
						<div class="search-list-group-item">
							<label class="checkbox">
								<input type="checkbox" name="checkbox" id="search-checkbox">
								<i></i>200 - 300k
							</label>
						</div>
						<div class="search-list-group-item">
							<label class="checkbox">
								<input type="checkbox" name="checkbox" id="search-checkbox">
								<i></i>300 - 400k
							</label>
						</div>
						<div class="search-list-group-item">
							<label class="checkbox">
								<input type="checkbox" name="checkbox" id="search-checkbox">
								<i></i>400 - 500k
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="list-book-search-wrap">
			<div class="search-show-results">
				Show result for {{$keyword}}
			</div>
			<div class="search-show-results" >
				There are {{count($books)}} results
			</div>
			<div class="search-show-results">
				@each('search.searchitem', $books, 'book')
				
			</div>
			
		</div>
		
	</div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/search.js') }}"></script>
@endsection