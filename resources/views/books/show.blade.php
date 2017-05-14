@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <div class="bookcover-container">

                    <img class="center-block" src={{'/storage/covers/'.$book->id.'.jpg'}} alt="">

                </div>

                {{--<replies @added="repliesCount++" @removed="repliesCount--"></replies>--}}
            </div>

            <div class="col-md-8">
                <h1 id="bookTitle">{{$book->title}}</h1>

                <div id="bookAuthors">
                    <span class="by smallText">by</span>
                    <span>{{$book->author}}</span>
                </div>

                <div id="bookPrice">
                    <span>{{$book->price}}</span>
                </div>

                <div id="bookDescription">
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


                    <form action="">

                        <div id="starVote"></div>
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

                            <div class="voted row">
                                {{$review->vote}}
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59"
                                     x="0px" y="0px" xml:space="preserve" width="32px" height="32px" fill="#f39c12"
                                     style="margin-left: 0px;">
                                    <polygon
                                            points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 ">

                                    </polygon>
                                </svg>
                            </div>

                            <p class="comment-text"> {{$review->review}} </p>
                        </div>

                    </div>

                @endforeach
            @endif


        </div>


    </div>

@endsection