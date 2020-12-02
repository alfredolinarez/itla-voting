@extends('layouts.base')

@section('content')
  <x-header />

  <div class="container-fluid">
    <div class="row d-flex justify-content-center">
      @yield('content.main')
    </div>
  </div>
@endsection