@extends('layouts.layout')

@section('title_page')

    <title>Detail Book {{$book->title}}</title>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <div class="bookcover-container">

                    <img class="center-block" src={{'/storage/covers/'.$book->image}} alt="">

                </div>

                {{--<replies @added="repliesCount++" @removed="repliesCount--"></replies>--}}
            </div>

            <div class="col-md-8">
                <h1 id="bookTitle">{{$book->title}}</h1>

                <div id="bookAuthors">
                    <span class="by smallText">by</span>
                    <span>{{$book->author}}</span>
                </div>

                <div id="bookQty">
                    <span class="title">Qty: </span>
                    <span>{{$book->qty}}</span>
                </div>


                <div id="bookPrice">
                    <span class="title">Price: </span>
                    <span>{{$book->price}} </span>

                    @if ($book->qty > 0)
                        <a href="{{route('payment.addToCart', $book->id)}}"
                           class="glyphicon glyphicon-shopping-cart"> Buy</a>

                    @else

                        <a href="{{route('subscribes.store', $book->id)}}"
                           class="glyphicon glyphicon-heart-empty"> Subscribe</a>

                    @endif

                </div>


                <div id="bookDescription">
                    <h3>Description</h3>
                    <span>{{$book->description}}</span>
                </div>

                {{--<div class="panel panel-default">--}}
                {{--<div class="panel-body">--}}
                {{--<p>--}}
                {{--This thread was published {{ $book->created_at->diffForHumans() }} by--}}
                {{--<a href="#">{{ $book->creator->name }}</a>, and currently--}}
                {{--has <span--}}
                {{--v-text="repliesCount"></span> {{ str_plural('comment', $book->replies_count) }}--}}
                {{--.--}}
                {{--</p>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>


        <div class="comments">

            <div class="reviewHeader">
                <h1>
                    Review
                </h1>
            </div>


            @if (Auth::check())

                <div class="comment-wrap">
                    <div class="comment-block">


                        <form action={{route('reviews.store', $book->id)}} method="POST">

                            {{ csrf_field() }}
                            {{ method_field('POST') }}

                            <div id="starAddReview">
                                <div id="starVote"></div>
                            </div>

                            <input id="starVoteValue" name="vote" type="hidden" value="-1">

                            <textarea name="review" id="" cols="30" rows="3" placeholder="Add Review..."></textarea>

                            <button type="submit" class="btn btn-primary pull-right">Review</button>
                        </form>
                    </div>

                </div>
            @endif

            @if (isset ($reviews) && $reviews->isEmpty())
                <div class="row">
                    No review
                </div>
            @else
                @foreach($reviews as $review)

                    <div>
                        {{$review->user->name}}
                    </div>

                    <div class="comment-wrap">
                        <div class="comment-block">

                            <div class="pull-right voteContainer">
                                <div class="voteScore">
                                    {{$review->vote}}
                                </div>

                                <div class="starImg">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59"
                                         x="0px" y="0px" xml:space="preserve" fill="#f39c12"
                                         style="margin-left: 0px;">
                                    <polygon
                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">

                                    </polygon>
                                </svg>
                                </div>
                            </div>

                            <p class="comment-text"> {{$review->review}} </p>


                            @can ('update', $review)

                                <div class="icon-control-review">


                                    {{--<button type="submit" class="glyphicon glyphicon-trash"></button>--}}

                                    <a class="edit-review" role="button"
                                       data-edit-link="{{ route('reviews.update', $review->id) }}"
                                       data-review="{{ $review->review }}"
                                       data-vote="{{ $review->vote }}"
                                       data-toggle="modal"
                                       data-target="#modal-edit">
                                        <span class="glyphicon glyphicon-edit"></span><span>Update</span>

                                    </a>


                                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        {{--<button type="submit" class="glyphicon glyphicon-trash"></button>--}}

                                        <a class="delete-review">
                                            <span class="glyphicon glyphicon-trash"></span><span>Delete</span>
                                        </a>
                                    </form>
                                </div>



                            @endcan


                        </div>

                    </div>

                @endforeach
            @endif


        </div>


    </div>

    <div class="modal model-edit" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    <form id="edit-form" method="POST" action="">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div id="starAddReview">
                            <div id="starVoteEdit"></div>
                        </div>

                        <input id="starVoteValueEdit" name="vote" type="hidden" value="-1">

                        <textarea name="review" id="reviewEditContent" cols="30" rows="3"
                                  placeholder="Add Review..."></textarea>


                        <button type="submit" class="btn btn-sm btn-primary" id="edit-btn">Edit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/showBook.js') }}"></script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/showBook.css') }}">
@endsection