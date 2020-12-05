@extends('layouts.main')

@section('title', 'Partidos CRUD')

@section('content.main')
  <div class="col-9">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Partidos</h3>
    <div class="caja-listado">
      <h5 class="primary-color">Agregar partidos</h5>
      <form class="row needs-validation" novalidate method="POST" name="f1">
        <div class="col-4 form-group">
          <label for="firstname" class="black-text">Nombre</label>
          <input type="text" name="firstname" class="form-control" required></input>
          <div class="valid-feedback">¡Excelente!</div>
          <div class="invalid-feedback">Complete el campo</div>
        </div>
        <div class="col-4 form-group">
          <label for="descripcion" class="black-text">Descripción</label>
          <input type="text" name="descripcion" class="form-control" required></input>
          <div class="valid-feedback">¡Excelente!</div>
          <div class="invalid-feedback">Complete el campo</div>
        </div>
        <div class="col-4 form-group">
          <label for="logo" class="black-text" style="display:block;">Logo del partido</label>
          <form enctype="multipart/form-data" action="uploader.php" method="POST">
            <input name="uploadedfile" type="file" class="title3-text" />
          </form>
        </div>
        <div class="col-6 form-group">
          <label for="estado" class="black-text" style="display:block;">Estado</label>
          <div class="custom-control custom-radio" style="display:inline-block;">
            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
            <label class="custom-control-label primary-color title2-text" for="customRadio1">Activo</label>
          </div>
          <div class="custom-control custom-radio" style="display:inline-block;">
            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
            <label class="custom-control-label primary-color title2-text" for="customRadio2">Inactivo</label>
          </div>
        </div>
        <div class="col-6 form-group">
          <button class="btn btn-class" type="submit">Agregar</button>
          <a href="#" class="btn btn-class">Borrar</a>
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
          <tr>
            <th scope="row">1</th>
            <td>Partido de la Liberación Dominicana</td>
            <td>Este partido es la máxima :v</td>
            <td>
              <img src="{{ asset('images/hombre.png') }}" class="img-fluid" alt="img" style="width:35px;" >
            </td>
            <td>Activo</td>
            <td>
              <button class="btn btn-success" type="button">Editar</button>
            </td>
            <td>
              <button class="btn btn-danger" type="button">Eliminar</button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Partido de la Liberación Dominicana</td>
            <td>Este partido es la máxima :v</td>
            <td>
              <img src="{{ asset('images/hombre.png') }}" class="img-fluid" alt="img" style="width:35px;" >
            </td>
            <td>Activo</td>
            <td>
              <button class="btn btn-success" type="button">Editar</button>
            </td>
            <td>
              <button class="btn btn-danger" type="button">Eliminar</button>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Partido de la Liberación Dominicana</td>
            <td>Este partido es la máxima :v</td>
            <td>
              <img src="{{ asset('images/hombre.png') }}" class="img-fluid" alt="img" style="width:35px;" >
            </td>
            <td>Activo</td>
            <td>
              <button class="btn btn-success" type="button">Editar</button>
            </td>
            <td>
              <button class="btn btn-danger" type="button">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>  
    </div>
  
  </div>
@endsection