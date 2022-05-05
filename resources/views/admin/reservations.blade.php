@extends('admin.layout.app')

@section('title')
    Reservations admin
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if (Session::has('msg'))
            <div class="alert alert-success">
                {{ Session::get('msg') }}
            </div>
        @endif
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Username</th>
                <th scope="col">Phone</th>
                <th scope="col">Places</th>
                <th scope="col">Date</th>
                <th scope="col">Note</th>
                <th scope="col">Created at</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $res)
            <tr>
                <td>{{ $res->id }}</td>
                <td>{{ $res->user->firstname }}  {{ $res->user->lastname }}</td>
                <td>{{ $res->user->tel }}</td>
                <td>{{ $res->places }}</td>
                <td>{{ $res->date }}</td>
                <td>{{ $res->notes }}</td>
                <td>{{ $res->created_at }}</td>
                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal_{{ $res->id }}"><i class="fas fa-trash-alt"></i></button>
                    </div >
                    {{-- delete modal --}}
                    <div id="delete_modal_{{ $res->id }}" class="modal fade" aria-labelledby="delete_modal_{{ $res->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                                <div class="modal-header flex-column">
                                    <h4 class="modal-title w-100">Are you sure?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('admin.reservations.destroy',$res->id )}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
            @endforeach
            </tr>
            </tbody>
        </table>
    </div>
    </div>
@endsection
