@extends('admin.layout.app')

@section('title')
    Restaurent Admin
@endsection

@section('content')
    <div class="container">
        <div class="row py-1">
            @if (Session::has('msg'))
                <div class="alert alert-success">
                    {{ Session::get('msg') }}
                </div>
            @endif
            </div>
        <div class="row">
            <h1>Food Categories</h1>
            <hr>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="my-2">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="image" class="form-label">Image</label>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-lg btn-danger">Confirme</button>
                </div>
            </form>
            <table class="table table-striped table-bordered mt-4">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><img src="/images/{{ $category->image }}" height="70px" width="80px"></td>
                    <td >
                        <div class="d-flex">
                        <div class="p-2">
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal_{{ $category->id }}" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </div >
                        {{-- delete modal --}}
                        <div id="delete_modal_{{ $category->id }}" class="modal fade">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <h4 class="modal-title w-100">Are you sure?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('categories.destroy',$category->id )}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal{{ $category->id }}">
                            <i class="fas fa-edit"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="edit_modal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                @if ($errors)
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                                @endif
                                <form method="POST" action="{{ route('categories.update',$category->id) }}" enctype="multipart/form-data" >
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" name="image" class="form-control" value="{{ $category->image }}" placeholder="Upload image">
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            </div>
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
