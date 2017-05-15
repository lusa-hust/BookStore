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
						<div class="search-list-group-item">
							<label class="checkbox">
								<input type="checkbox" name="checkbox" id="search-checkbox">
								<i></i>Van hoc nuoc ngoai
							</label>
						</div>
						<div class="search-list-group-item">
							<label class="checkbox">
								<input type="checkbox" name="checkbox" id="search-checkbox">
								<i></i>Van hoc Viet Nam
							</label>
						</div>
						<div class="search-list-group-item">
							<label class="checkbox">
								<input type="checkbox" name="checkbox" id="search-checkbox">
								<i></i>Khoa hoc tu nhien
							</label>
						</div>
						<div class="search-list-group-item">
							<label class="checkbox">
								<input type="checkbox" name="checkbox" id="search-checkbox">
								<i></i>Thieu nhi
							</label>
						</div>
						<div class="search-list-group-item">
							<label class="checkbox">
								<input type="checkbox" name="checkbox" id="search-checkbox">
								<i></i>Thoi su chinh tri
							</label>
						</div>
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
				Show result for
			</div>
			<div class="search-show-results">
				There are results
			</div>
			<div class="search-show-results">
				<div class="search-item">
					<span class="search-image">
						<img src="https://vcdn.tikicdn.com/cache/175x175/media/catalog/product/n/h/nha-gia-kim.u48.d20160401.t175959.jpg">
					</span>
					<span class="search-title">Nha gia kim</span>
					<p class="search-price">30000&nbsp;d</p>

				</div>
			</div>
			
		</div>
		
	</div>
</div>

@endsection