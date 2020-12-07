@extends('layouts.main')

@section('title', 'Ciudadanos CRUD')

@section('content.main')
  <div class="col-9">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Ciudadanos</h3>
    <div class="caja-listado">
        <h5 class="primary-color">Agregar ciudadano</h5>
        <form class="row needs-validation" method="POST" name="f1" action="{{ ($edit ?? '') ? route('citizens.update', $edit->identification_document) : route('citizens.store') }}">
          @csrf
          @if($edit ?? '')
            @method('PUT')
          @endif

          <div class="col-4 form-group">
            <label for="cedula" class="black-text">Cédula</label>
            <input type="tel" pattern="\d{3}-\d{7}-\d{1}" name="identification_document" class="form-control mx-auto" required value="{{ ($edit ?? '') ? $edit->identification_document : '' }}"></input>
            <div class="valid-feedback">¡Excelente!</div>
            <div class="invalid-feedback">Formato invalido, el formato correcto es 000-0000000-0</div>
          </div>
          <div class="col-4 form-group">
            <label for="firstname" class="black-text">Nombre</label>
            <input type="text" name="first_name" class="form-control" required value="{{ ($edit ?? '') ? $edit->first_name : '' }}"></input>
            <div class="valid-feedback">¡Excelente!</div>
            <div class="invalid-feedback">Complete el campo</div>
          </div>
          <div class="col-4 form-group">
            <label for="lastname" class="black-text">Apellido</label>
            <input type="text" name="last_name" class="form-control" required value="{{ ($edit ?? '') ? $edit->last_name : '' }}"></input>
            <div class="valid-feedback">¡Excelente!</div>
            <div class="invalid-feedback">Complete el campo</div>
          </div>
          <div class="col-4 form-group">
            <label for="email" class="black-text">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ ($edit ?? '') ? $edit->email : '' }}"></input>
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
              <a class="btn btn-class" href="{{ route('citizens.index') }}">Cancelar</a>
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
            <th scope="col">Cédula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Email</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @forelse(($citizens ?? []) as $citizen)
            <tr>
              <th scope="row">{{ $citizen->identification_document }}</th>
              <td>{{ $citizen->first_name }}</td>
              <td>{{ $citizen->last_name }}</td>
              <td>{{ $citizen->email }}</td>
              <td>{{ $citizen->state ? 'Activo' : 'Inactivo' }}</td>
              <td>
                <a href="{{ route('citizens.edit', $citizen->identification_document) }}" class="btn btn-success" type="button">Editar</a>
              </td>
              <td>
                <form action="{{ route('citizens.destroy', $citizen->identification_document) }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button class="btn btn-danger">Desactivar</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center">No hay ciudadanos registrados</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
@endsection