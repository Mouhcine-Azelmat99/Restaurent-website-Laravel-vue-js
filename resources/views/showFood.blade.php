@extends('layouts.app')

@section('title')
  {{$slug}}
@endsection

@section('content')
@include('layouts.navbar')

    <Show :slug="{{ json_encode($slug) }}" :user_id={{json_encode($user_id)}}></Show>

@include('layouts.footer')
@endsection