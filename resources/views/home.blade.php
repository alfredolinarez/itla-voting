@extends('layouts.main')

@section('title', 'Home')

@section('content.main')
  <div class="col-8">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Elecciones 2020</h3>
    <div class="caja-listado">
      <div class="row text-center">
        <div class="col-3">
          <h5>Presidentes</h5>
          <p class="disponible">Disponible</p>
          <!--<p class="no-disponible">No disponible</p>-->
          <img src="{{ asset('images/hombre.png') }}" class="img-home" alt="presidente">
          <a class="btn btn-class primary-color" role="button" href="#">Votar</a>
        </div>
        <div class="col-3">
          <h5>Alcaldes</h5>
          <p class="disponible">Disponible</p>
          <!--<p class="no-disponible">No disponible</p>-->
          <img src="{{ asset('images/hombre.png') }}" class="img-home" alt="alcalde">
          <a class="btn btn-class primary-color" role="button" href="#">Votar</a>
        </div>
        <div class="col-3">
          <h5>Senadores</h5>
          <p class="disponible">Disponible</p>
          <!--<p class="no-disponible">No disponible</p>-->
          <img src="{{ asset('images/hombre.png') }}" class="img-home" alt="senador">
          <a class="btn btn-class primary-color" role="button" href="#">Votar</a>
        </div>
        <div class="col-3">
          <h5>Diputados</h5>
          <p class="disponible">Disponible</p>
          <!--<p class="no-disponible">No disponible</p>-->
          <img src="{{ asset('images/hombre.png') }}" class="img-home" alt="diputado">
          <a class="btn btn-class primary-color" role="button" href="#">Votar</a>
        </div>
      </div>
    </div>
  </div>
@endsection