@extends('layouts.layout')

@section('style')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="/images/banner/banner1.png" alt="Los Angeles">
        </div>

        <div class="item">
            <img src="/images/banner/banner2.jpg" alt="Chicago">
        </div>

        <div class="item">
            <img src="/images/banner/banner3.jpg" alt="New York">
        </div>
        <div class="item">
            <img src="/images/banner/banner4.jpg" alt="New York">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container home-container">
    <div class="row">
        <div class="col-xs-3 col-md-2 category-container">
            <ul>
                <li>
                    <a href="#">Category 1</a>
                </li>
                <li>
                    <a href="#">Category 2</a>
                </li>
            </ul>            
        </div>
        <div class="col-xs-9 col-md-10">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4 bookcover-block">
                    <div class="bookcover-container">
                        <a href="#">
                            <img src="/images/bookcover/cover1.jpg" alt="book title">
                            <div class="book-title">
                                Book title
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 bookcover-block">
                    <div class="bookcover-container">
                        <a href="#">
                            <img src="/images/bookcover/cover1.jpg" alt="book title">
                            <div class="book-title">
                                Book title
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 bookcover-block">
                    <div class="bookcover-container">
                        <a href="#">
                            <img src="/images/bookcover/cover1.jpg" alt="book title">
                            <div class="book-title">
                                Book title
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 bookcover-block">
                    <div class="bookcover-container">
                        <a href="#">
                            <img src="/images/bookcover/cover1.jpg" alt="book title">
                            <div class="book-title">
                                Book title
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4 bookcover-block">
                    <div class="bookcover-container">
                        <a href="#">
                            <img src="/images/bookcover/cover1.jpg" alt="book title">
                            <div class="book-title">
                                Book title
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row load-more">
                <a href="#">Load more...</a>
            </div>
        </div>
    </div>
</div>
@endsection
