@extends('admin.layout.app')

@section('title')
    Orders admin
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
                <th scope="col">Items</th>
                <th scope="col">Username</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Total</th>
                <th scope="col">Created at</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($result as $order)
            <tr>
                <td>
                    @foreach($order as $item)
                        -<span class="text-danger">  {{ $item->qty }}</span> {{ $item->food->name }} 
                    @endforeach
                </td>
                <td>{{ $order[0]->user->firstname }} {{ $order[0]->user->lastname }}</td>
                <td>{{ $order[0]->user->tel }}</td>
                <td>{{ $order[0]->user->email }}</td>
                <td>
                    {{ $order->total }}
                </td>
                <td>{{ $order[0]->created_at }}</td>
                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal_{{ $order[0]->user->id }}"><i class="fas fa-trash-alt"></i></button>
                    </div >
                    <div id="delete_modal_{{ $order[0]->user->id }}" class="modal fade" aria-labelledby="delete_modal_{{ $order[0]->user->id }}" aria-hidden="true">
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
                                    <form action="{{ route('admin.orders.destroy',$order[0]->user->id )}}" method="POST">
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
