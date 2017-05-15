@extends('layouts.layout')

@section('title_page')

    <title>Subscribe Book List</title>

@endsection

@section('content')

    <div class="container">
        <h1>Subscribe Book List</h1>

        @if ($subscribes->isEmpty())

            <h3>Your Subscribe Book List is empty</h3>

        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Subscribe Id</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Available</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($subscribes as $subscribe)


                    <tr>
                        <th class='clickable-row' data-href='{{route('book.show', $subscribe->book->id)}}'> {{$subscribe->id}}</th>


                        <td class='clickable-row' data-href='{{route('book.show', $subscribe->book->id)}}'> {{$subscribe->book->title }}</td>

                        <td class='clickable-row' data-href='{{route('book.show', $subscribe->book->id)}}'> {{$subscribe->book->author }}</td>
                        <td class='clickable-row' data-href='{{route('book.show', $subscribe->book->id)}}'> {{$subscribe->book->price }}</td>


                        @if ($subscribe->available)

                            <td class='clickable-row' data-href='{{route('book.show', $subscribe->book->id)}}'> <span style="color: green"> AVAILABLE </span></td>

                        @else

                            <td class='clickable-row' data-href='{{route('book.show', $subscribe->book->id)}}'><span style="color: red"> NOT AVAILABLE </span></td>

                        @endif


                        <td>

                            <form action="{{ route('subscribes.destroy', $subscribe->book->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                {{--<button type="submit" class="glyphicon glyphicon-trash"></button>--}}

                                <a class="delete-subscribe">
                                    <span class="glyphicon glyphicon-trash"></span><span>Delete</span>
                                </a>
                            </form>

                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        @endif

    </div>



@endsection

@section('script')
    <script src="{{ asset('js/subscribe.js') }}"></script>
@endsection

@section('style')

@endsection