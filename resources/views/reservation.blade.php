@extends('layouts.app')

@section('title')
  Reservation
@endsection

@section('content')
@include('layouts.navbar')

    @if($reservation)
    <section class="card">
        <div class="container">
            <div class="row py-1">
            </div>
            <div class="row">
            <div class="col-lg-8 mx-auto">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Numbre of Places</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Date of Reservation</th>
                        <th scope="col">Reserved at</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            {{ $reservation->places }}
                        </td>
                        <td>
                            {{ $reservation->notes }}
                        </td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{$reservation->created_at->diffForHumans() }}</td>
                    </tr>
                    </tbody>
                </table>
                <form action="{{route('reservation.destroy',$reservation->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-lg" id="confirme-btn">
                            Delete
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </section>
    @else
    <Reservation :user_id={{json_encode($user_id)}}></Reservation>
    @endif
@include('layouts.footer')
@endsection
