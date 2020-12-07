@extends('layouts.main')

@section('title', 'Partidos CRUD')

@section('content.main')
  <div class="col-9">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Partidos</h3>
    <div class="caja-listado">
      <h5 class="primary-color">Agregar partidos</h5>
      <form class="row needs-validation" enctype="multipart/form-data" method="POST" name="f1" action="{{ ($edit ?? '') ? route('electoral-parties.update', $edit->id) : route('electoral-parties.store') }}">
        @csrf
        @if($edit ?? '')
          @method('PUT')
        @endif

        <div class="col-4 form-group">
          <label for="firstname" class="black-text">Nombre</label>
          <input type="text" name="firstname" class="form-control" required value="{{ ($edit ?? '') ? $edit->name : '' }}"></input>
          <div class="valid-feedback">¡Excelente!</div>
          <div class="invalid-feedback">Complete el campo</div>
        </div>
        <div class="col-4 form-group">
          <label for="descripcion" class="black-text">Descripción</label>
          <input type="text" name="descripcion" class="form-control" required value="{{ ($edit ?? '') ? $edit->description : '' }}"></input>
          <div class="valid-feedback">¡Excelente!</div>
          <div class="invalid-feedback">Complete el campo</div>
        </div>
        <div class="col-4 form-group">
          <label for="logo" class="black-text" style="display:block;">Logo del partido</label>
          <input name="logo" type="file" class="title3-text" />
          <?php if ($edit ?? '') { ?>
            <input name="party_logo" type="hidden" value="{{ $edit->party_logo }}" />
          <?php } ?>
        </div>
        <div class="col-6 form-group">
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
          <button class="btn btn-class" type="submit">{{ ($edit ?? '') ? 'Actualizar' : 'Agregar' }}</button>

          @if($edit ?? '')
            <a class="btn btn-class" href="{{ route('electoral-parties.index') }}">Cancelar</a>
          @else
            <a href="{{ route('admin.home') }} " class="btn btn-class">Volver al menú</a>
          @endif
        </div>
      </form>
    </div>
    <div class="caja-listado">
      <h5 class="primary-color">Lista de Partidos</h5>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Logo</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @forelse(($electoral_parties ?? []) as $electoral_party)
            <tr>
              <th scope="row">{{ $electoral_party->id }}</th>
              <td>{{ $electoral_party->name }}</td>
              <td>{{ $electoral_party->description }}</td>
              <td>
                <img src="{{ url($electoral_party->party_logo) }}" class="img-fluid" alt="img" style="width:35px;" >
              </td>
              <td>{{ $electoral_party->state ? 'Activo' : 'Inactivo' }}</td>
              <td>
                <a href="{{ route('electoral-parties.edit', $electoral_party->id) }}" class="btn btn-success" type="button">Editar</a>
              </td>
              <td>
                <form action="{{ route('electoral-parties.destroy', $electoral_party->id) }}" method="POST">
                  @csrf
                  @method('DELETE')

                  <button class="btn btn-danger">Desactivar</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center">No hay partidos electorales registrados</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
@endsection