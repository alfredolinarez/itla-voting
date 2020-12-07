@extends('layouts.main')

@section('title', 'Candidatos CRUD')

@section('content.main')
  <div class="col-9">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Candidatos</h3>
    <div class="caja-listado">
      <h5 class="primary-color">Agregar candidatos</h5>
      <form class="row needs-validation" enctype="multipart/form-data" method="POST" name="f1" action="{{ ($edit ?? '') ? route('candidates.update', $edit->id) : route('candidates.store') }}">
        @csrf
        @if($edit ?? '')
          @method('PUT')
        @endif

        <div class="col-4 form-group">
          <label for="firstname" class="black-text">Nombres</label>
          <input type="text" name="first_name" class="form-control" required value="{{ ($edit ?? '') ? $edit->first_name : '' }}"></input>
          <div class="valid-feedback">¡Excelente!</div>
          <div class="invalid-feedback">Complete el campo</div>
        </div>
        <div class="col-4 form-group">
          <label for="lastname" class="black-text">Apellidos</label>
          <input type="text" name="last_name" class="form-control" required value="{{ ($edit ?? '') ? $edit->last_name : '' }}"></input>
          <div class="valid-feedback">¡Excelente!</div>
          <div class="invalid-feedback">Complete el campo</div>
        </div>
        <div class="col-4 form-group">
          <label for="partido" class="black-text">Partido</label>
          <select name="party_to_which_it_belongs" class="form-control" required>
            @foreach($electoral_parties as $electoral_party)
              <option value="{{ $electoral_party->id }}" <?= ($edit ?? '') && $electoral_party->id === $edit->electoral_party->id ? 'selected' : '' ?>>{{ $electoral_party->name }} ({{ $electoral_party->description }})</option>
            @endforeach
          </select>
          <div class="valid-feedback">¡Excelente!</div>
          <div class="invalid-feedback">Formato invalido</div>
        </div>
        <div class="col-3 form-group">
          <label for="puesto" class="black-text">Puesto de aspiración</label>
          <select name="position_to_which_it_aspires" class="form-control">
            @foreach($elective_positions as $elective_position)
              <option value="{{ $elective_position->id }}" <?= ($edit ?? '') && $elective_position->id === $edit->elective_position->id ? 'selected' : '' ?> >{{ $elective_position->name }}</option>
            @endforeach
          </select>
          <div class="valid-feedback">¡Excelente!</div>
          <div class="invalid-feedback">Fomarto invalido</div>
        </div>
        <div class="col-3 form-group">
          <label for="estado" class="black-text" style="display:block;">Estado</label>
          <div class="custom-control custom-radio" style="display:inline-block;">
            <input type="radio" id="customRadio1" name="state" class="custom-control-input" value="1" <?= ($edit ?? '') ? ($edit->state ? 'checked' : '') : 'checked' ?>>
            <label class="custom-control-label primary-color title2-text" for="customRadio1">Activo</label>
          </div>
          <div class="custom-control custom-radio" style="display:inline-block;">
            <input type="radio" id="customRadio2" name="state" class="custom-control-input" value="0" <?= ($edit ?? '') && !$edit->state ? 'checked' : '' ?>>
            <label class="custom-control-label primary-color title2-text" for="customRadio2">Inactivo</label>
          </div>
        </div>
        <div class="col-6 form-group">
          <label for="profile" class="black-text" style="display:block;">Foto de perfil</label>
          <input name="profile" type="file" class="title3-text" />
          <?php if ($edit ?? '') { ?>
            <input name="profile_picture" type="hidden" value="{{ $edit->profile_picture }}" />
          <?php } ?>
        </div>
        <div class="col-6 form-group">
          <button class="btn btn-class" type="submit">{{ ($edit ?? '') ? 'Actualizar' : 'Agregar' }}</button>
          @if($edit ?? '')
            <a class="btn btn-class" href="{{ route('candidates.index') }}">Cancelar</a>
          @else
            <a href="{{ route('admin.home') }} " class="btn btn-class">Volver al menú</a>
          @endif
        </div>
      </form>
    </div>
    <div class="caja-listado">
      <h5 class="primary-color">Lista de candidatos</h5>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Partido</th>
            <th scope="col">Puesto</th>
            <th scope="col">Foto</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @forelse(($candidates ?? []) as $candidate)
            <tr>
              <th scope="row">{{ $candidate->id }}</th>
              <td>{{ $candidate->first_name }}</td>
              <td>{{ $candidate->last_name }}</td>
              <td>{{ $candidate->electoral_party->name }}</td>
              <td>{{ $candidate->elective_position->name }}</td>
              <td>
                <img src="{{ url($candidate->profile_picture) }}" class="img-fluid" alt="img" style="width:35px;" >
              </td>
              <td>{{ $candidate->state ? 'Activo' : 'Inactivo' }}</td>
              <td>
                <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-success" type="button">Editar</a>
              </td>
              <td>
                <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button class="btn btn-danger">Desactivar</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center">No hay candidatos registrados</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
@endsection