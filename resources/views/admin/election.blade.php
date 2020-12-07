@extends('layouts.main')

@section('title', 'Ciudadanos CRUD')

@section('content.main')
  <div class="col-9">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Resumen de elecciones</h3>
    <div class="caja-listado">
        <h5 class="primary-color">Elecciones: {{ $election->name }}</h5>
        <h5 class="primary-color">Fecha: {{ $election->date_of_realization }}</h5>

    </div>
    <div class="caja-listado table-responsive">
      <h5 class="primary-color">Votos Partidos</h5>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Partido</th>
            <th>Votos</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse($election->electoral_parties as $electoral_party)
            <tr>
              <td>{{ trim($electoral_party->name) }}</td>
              <td>{{ $electoral_party->total($election->id) }}</td>
              <td>
                <a href="#electoral-party-{{ $electoral_party->id }}" class="btn btn-success" type="button">Detalles</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center">No hay votos para este proceso electoral</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @foreach($election->electoral_parties as $electoral_party)
      <div id="electoral-party-{{ $electoral_party->id }}" class="caja-listado table-responsive">
        <h5 class="primary-color">Partido: {{ $electoral_party->name }}</h5>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Candidato</th>
              <th scope="col">Puesto</th>
              <th scope="col">Votos</th>
            </tr>
          </thead>
          <tbody>
            @forelse(($electoral_party->candidates ?? []) as $candidate)
              <tr>
                <td>{{ trim($candidate->first_name .' '. $candidate->last_name) }}</td>
                <td>{{ $candidate->elective_position->name }}</td>
                <td>{{ $candidate->total($election->id) }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center">No hay candidatos para este partido</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    @endforeach

  </div>
@endsection