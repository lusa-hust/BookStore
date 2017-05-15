<!-- modal -->
<div class="modal fade" id="edit-book-modal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit book</h4>
            </div>
            <div class="modal-body">
                <form id="edit-book-form" class="form-horizontal" action="{{ route('book.update') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $book->id }}">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Title:</label>
                        <div class="col-sm-10">
                            <input type="text" id="title" class="form-control" name="title" placeholder="Title" value="{{$book->title}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="author">Author:</label>
                        <div class="col-sm-10"> 
                            <input type="text" id="author" class="form-control" name="author" placeholder="Enter author" value="{{ $book->author }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="price">Price:</label>
                        <div class="col-sm-10"> 
                            <input type="number" id="price" class="form-control" name="price" value="{{ $book->price }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="qty">Quantity:</label>
                        <div class="col-sm-10"> 
                            <input type="number" id="qty" class="form-control" name="qty" value="{{ $book->qty }}">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label class="control-label col-sm-2">Categories:</label>
                        <div class="col-sm-10">
                            @foreach($categories as $key => $category)
                                <div class="checkbox">
                                    <label><input name="categories[]" value="{{$category->id}}" type="checkbox" {{ $check[$key] }}> {{$category->name}}</label>
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
                            <textarea id="intro" name="intro" class="form-control">{{$book->description}}</textarea> 
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="edit-book-button" type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>