@extends('layouts.main')

@section('title', 'Candidatos')

@section('content.main')
  <div class="col-8">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Listado de Candidatos</h3> <!--a Presidente, a Alcalde, a Diputado, a Sindico-->
    <div class="caja-listado">
      <div class="row text-center">
        <!--BLOQUE DEL CANDIDATO-->
        <div class="col-6 bloque-candidato">
          <div class="row d-flex justify-content-center">
            <div class="col-md-auto">
              <img src="{{ asset('images/hombre.png') }}" class="img-candidates" alt="presidente">  
            </div>
            <div class="col-md-auto">
              <img src="{{ asset('images/pld.png') }}" class="img-candidates" alt="presidente">  
            </div>
          </div>
          <h5 class="primary-color title1-text">Anthony Estévez</h5>
          <h5 class="title3-text">PLD - Partido de la Liberación Dominicana</h5>
          <h5 class="title3-text">Presidente<h5>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
            <label class="custom-control-label primary-color title2-text" for="customRadio1">Seleccionar</label>
          </div>
        </div>
        <!--FIN DEL BLOQUE DEL CANDIDATO-->
        <!--BLOQUE DEL CANDIDATO-->
        <div class="col-6 bloque-candidato">
          <div class="row d-flex justify-content-center">
            <div class="col-md-auto">
              <img src="{{ asset('images/hombre.png') }}" class="img-candidates" alt="presidente">  
            </div>
            <div class="col-md-auto">
              <img src="{{ asset('images/prm.png') }}" class="img-candidates" alt="presidente">  
            </div>
          </div>
          <h5 class="primary-color title1-text">Rachel Estévez</h5>
          <h5 class="title3-text">PRM - Partido Revolucionario Moderno</h5>
          <h5 class="title3-text">Presidente<h5>
          <div class="custom-control custom-radio">
            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
            <label class="custom-control-label primary-color title2-text" for="customRadio2">Seleccionar</label>
          </div>
        </div>
        <!--FIN DEL BLOQUE DEL CANDIDATO-->
        <div class="col-12 text-center">
           <a href="#" class="btn btn-class" role="button" type="submit">Votar</a>
        </div>
         
      </div>
      
    </div>
  </div>
@endsection