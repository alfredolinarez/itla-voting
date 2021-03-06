@extends('layouts.main')

@section('title', 'ITLA Voting')

@section('content')
<header style="position:static;">
  <div class="d-flex justify-content-end">
  <a href="{{ route('login') }}"><p class="primary-color">Login</p></a>
  </div>
</header>
  <div class="container">
    <div class="row content">
      <div class="col-md-12 align-self-center text-center ">
        <h2 class="primary-color title1-text">Bienvenido a ITLA VOTING</h2>

        @if($already_voted ?? '')
          <div class="alert alert-danger">Ya ha ejercido el voto</div>
        @endif

        @if($no_active_election ?? '')
          <div class="alert alert-danger">No hay ningun proceso electoral en estos momentos</div>
        @endif

        @if($inactive_citizen ?? '')
          <div class="alert alert-danger">El ciudadano está inactivo</div>
        @endif

        <h5 class="title2-text">Escribe tu cédula</h5>
        <form class="needs-validation" action="{{ route('validate') }}" method="POST">
          @csrf

          <div class="form-group">
            <input type="tel" pattern="\d{3}-\d{7}-\d{1}" name="cedula" class="text-cedula mx-auto" required></input>
            <div class="valid-feedback">¡Excelente!</div>
            <div class="invalid-feedback">Formato invalido, el formato correcto es 000-0000000-0</div>
          </div>
          <button class="btn btn-class" role="button" type="submit">Validar</button>
        </form>
      </div>
    </div>
  </div>
  <script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {

            if(form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }

            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
@endsection
