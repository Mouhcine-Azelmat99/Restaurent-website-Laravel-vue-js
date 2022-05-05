@extends('layouts.app')

@section('title')
    Orders
@endsection

@section('content')
@include('layouts.navbar')

<section class="card">
    <div class="container">
        <div class="row py-1">
        </div>
        <div class="row">
        <div class="col-lg-8 mx-auto">
        @if($orders)
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Food</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Time</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        @foreach ($orders as $order)
                            <p>{{ $order->qty }} - {{ $order->food->name }} </p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($orders as $order)
                            <p> {{ number_format((float)$order->food->price*$order->qty, 2, '.', '') }} $</p>
                        @endforeach
                    </td>
                    <td>
                    @isset($total)
                    {{number_format((float)$total, 2, '.', '') }}</td>
                    <td>{{$date }}</td>
                    @endisset
                </tr>
                </tbody>
            </table>
            @else
               <div class="alert alert-success">
                Any order exist go to <a href="/home">Home</a> to add buy some foods
            </div>
            @endif
        </div>
        </div>
    </div>
</section>

@include('layouts.footer')
@endsection
