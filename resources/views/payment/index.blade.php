@extends('layouts.layout')

@section('title_page')

    <title>Payment List</title>

@endsection

@section('content')

    <div class="container">
        <h1>Order List</h1>

        @if ($orders->isEmpty())

            <h3>Your Order List is empty</h3>

        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Paid</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)


                    <tr class='clickable-row' data-href='{{route('orders.show', $order->id)}}'>
                        <th scope="row"> {{$order->id}}</th>

                        @if ($order->paid)

                            <td><span style="color: green"> PAID </span></td>

                        @else

                            <td><span style="color: red"> NOT PAID </span></td>

                        @endif

                        <td>

                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                {{--<button type="submit" class="glyphicon glyphicon-trash"></button>--}}

                                <a class="delete-order">
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
    <script src="{{ asset('js/payment.js') }}"></script>
@endsection

@section('style')

@endsection