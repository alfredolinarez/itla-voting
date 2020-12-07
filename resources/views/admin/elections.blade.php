@extends('layouts.main')

@section('title', 'Ciudadanos CRUD')

@section('content.main')
  <div class="col-9">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Ciudadanos</h3>
    <div class="caja-listado">
        <h5 class="primary-color">Agregar ciudadano</h5>
        <form class="row needs-validation" method="POST" name="f1" action="{{ ($edit ?? '') ? route('elections.update', $edit->id) : route('elections.store') }}">
          @csrf
          @if($edit ?? '')
            @method('PUT')
          @endif

          <div class="col-4 form-group">
            <label for="firstname" class="black-text">Nombre</label>
            <input type="text" name="name" class="form-control" required value="{{ ($edit ?? '') ? $edit->name : '' }}"></input>
            <div class="valid-feedback">¡Excelente!</div>
            <div class="invalid-feedback">Complete el campo</div>
          </div>
          <div class="col-4 form-group">
            <label for="lastname" class="black-text">Fecha de realización</label>
            <input type="date" name="date_of_realization" class="form-control" required value="{{ ($edit ?? '') ? $edit->date_of_realization : '' }}"></input>
            <div class="valid-feedback">¡Excelente!</div>
            <div class="invalid-feedback">Complete el campo</div>
          </div>
          <div class="col-6 form-group">
            <label for="password" class="black-text" style="display:block;">Estado</label>
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
            <button class="btn btn-class" type="submit">{{ ($edit ?? '') ? 'Actualizar' : 'Agregar' }}</button>

            @if($edit ?? '')
              <a class="btn btn-class" href="{{ route('elections.index') }}">Cancelar</a>
            @else
              <a href="{{ route('admin.home') }} " class="btn btn-class">Volver al menú</a>
            @endif
          </div>
    </form>
    </div>
    <div class="caja-listado table-responsive">
      <h5 class="primary-color">Lista de Ciudadanos</h5>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha de realización</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @forelse(($elections ?? []) as $election)
            <tr>
              <th scope="row">{{ $election->id }}</th>
              <td>{{ $election->name }}</td>
              <td>{{ $election->date_of_realization }}</td>
              <td>{{ $election->state ? 'Activo' : 'Inactivo' }}</td>
              <td>
                <a href="{{ route('elections.edit', $election->id) }}" class="btn btn-success" type="button">Editar</a>
              </td>
              <td>
                <form action="{{ route('elections.destroy', $election->id) }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button class="btn btn-danger">Desactivar</button>
                </form>
              </td>
              <td>
                <a href="{{ route('elections.show', $election->id) }}" class="btn btn-info" type="button">Ver resultados</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center">No hay elecciones registradas</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
@endsection