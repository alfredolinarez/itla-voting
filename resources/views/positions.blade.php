@extends('layouts.main')

@section('title', 'Home')

@section('content.main')
  <div class="col-8">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Elecciones 2020</h3>
    <div class="caja-listado">
      <div class="row text-center">
        @foreach($elective_positions as $elective_position)
          <div class="col-3">
            <h5>{{ $elective_position->name }}</h5>
            <img src="{{ asset('images/hombre.png') }}" class="img-home" alt="presidente">
            @if($elective_position->has_voted(Auth::user()['username']))
              <a class="btn btn-danger disabled" role="button" href="#">Ya votaste!</a>
            @else
              <a class="btn btn-success" role="button" href="{{ route('candidates', $elective_position->id) }}">Votar</a>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection