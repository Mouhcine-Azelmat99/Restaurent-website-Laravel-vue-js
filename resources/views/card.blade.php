@extends('layouts.app')

@section('title')
    Card
@endsection

@section('content')
@include('layouts.navbar')

<Card :user_id={{ json_encode($user_id) }}></Card>

@include('layouts.footer')
@endsection