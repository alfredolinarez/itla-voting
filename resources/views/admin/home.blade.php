@extends('layouts.main')

@section('title', 'Home Administrator')

@section('content.main')
  <div class="col-8">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Administrador</h3>
    <div class="caja-listado">
      <div class="row text-center">
        <div class="col-3">
          <h5>Candidatos</h5>
          <a class="btn btn-class primary-color" role="button" href="{{ route('candidates.index') }}">Administrar</a>
        </div>
        <div class="col-3">
          <h5>Partidos</h5>
          <a class="btn btn-class primary-color" role="button" href="{{ route('electoral-parties.index') }}">Administrar</a>
        </div>
        <div class="col-3">
          <h5>Puesto electivo</h5>
          <a class="btn btn-class primary-color" role="button" href="{{ route('elective-positions.index') }}">Administrar</a>
        </div>
        <div class="col-3">
          <h5>Ciudadanos</h5>
          <a class="btn btn-class primary-color" role="button" href="{{ route('citizens.index') }}">Administrar</a>
        </div>
        <div class="col-12" style="margin-top:40px;">
          <h5>Elecciones</h5>
          <a class="btn btn-class primary-color" role="button" href="{{ route('elections.index') }}">Ver Estadisticas</a>
        </div>
      </div>
    </div>
  </div>
@endsection