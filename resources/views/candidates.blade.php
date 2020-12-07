@extends('layouts.main')

@section('title', 'Candidatos')

@section('content.main')
  <div class="col-8">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Listado de Candidatos</h3> <!--a Presidente, a Alcalde, a Diputado, a Sindico-->
    <div class="caja-listado">
      <form action="{{ route('vote', $elective_position->id) }}" method="POST">
        @csrf

        <div class="row text-center">
          @foreach($elective_position->candidates as $candidate)
            <div class="col-6 bloque-candidato">
              <div class="row d-flex justify-content-center">
                <div class="col-md-auto">
                  <img src="{{ url($candidate->profile_picture) }}" class="img-candidates" alt="presidente">
                </div>
                <div class="col-md-auto">
                  <img src="{{ url($candidate->electoral_party->party_logo) }}" class="img-candidates" alt="presidente">
                </div>
              </div>
              <h5 class="primary-color title1-text">{{ trim( $candidate->first_name.' '.$candidate->last_name ) }}</h5>
              <h5 class="title3-text">{{ trim($candidate->electoral_party->name.' - '.$candidate->electoral_party->description) }}</h5>
              <h5 class="title3-text">{{ $elective_position->name }}<h5>
              <div class="custom-control custom-radio">
                <input type="radio" id="candidate-{{ $candidate->id }}" name="candidate" value="{{ $candidate->id }}" class="custom-control-input">
                <label class="custom-control-label primary-color title2-text" for="candidate-{{ $candidate->id }}">Seleccionar</label>
              </div>
            </div>
          @endforeach

          <div class="col-12 text-center">
            <button class="btn btn-class" role="button" type="submit">Realizar voto</button>
            <a class="btn btn-class" role="button" href="{{ route('positions') }}">Volver</a>

          </div>

        </div>

      </form>
    </div>
  </div>
@endsection