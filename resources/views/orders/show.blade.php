@extends('layouts.layout')

@section('title_page')

    <title>Order {{$order->id}}</title>

@endsection

@section('content')

    <div class="container">

        <?php

        $total = 0;

        ?>
        <h1>Order {{$order->id}}</h1>

        <table class="table">
            <thead>
            <tr>
                <th>Row Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Qty</th>
                <th> </th>
            </tr>
            </thead>
            <tbody>

            @foreach($order_rows as $order_row)


                <tr>

                    <th scope="row"> {{$order_row->id}}</th>

                    <td scope="row"> {{$order_row->book->title}}</td>

                    <td scope="row"> {{$order_row->book->author}}</td>

                    <td scope="row"> {{$order_row->book->price}}</td>

                    <td scope="row">


                        <form action="{{ route('orderRows.update', $order_row->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            {{--<button type="submit" class="glyphicon glyphicon-trash"></button>--}}

                            <input class="inputQty" name="qty"  value={{$order_row->qty}} readonly>

                            <a class="edit-orderRow">
                                <span class="glyphicon glyphicon-edit"></span><span>Edit</span>
                            </a>
                        </form>

                    </td>

                    <td scope="row">


                        <form action="{{ route('orderRows.destroy', $order_row->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            {{--<button type="submit" class="glyphicon glyphicon-trash"></button>--}}

                            <a class="delete-orderRow">
                                <span class="glyphicon glyphicon-trash"></span><span>Delete</span>
                            </a>
                        </form>

                    </td>

                    <?php

                    $total += $order_row->book->price * $order_row->qty;

                    ?>


                </tr>

            @endforeach


            <tr>

                <td scope="row"></td>

                <td scope="row"></td>

                <td scope="row"></td>

                <th scope="row"> Total</th>

                <td scope="row"> {{$total}} </td>


            </tr>

            </tbody>
        </table>

    </div>



@endsection

@section('script')
    <script src="{{ asset('js/order-show.js') }}"></script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/order-show.css') }}">
@endsection