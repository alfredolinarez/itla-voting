@extends('layouts.main')

@section('title', 'Candidatos CRUD')

@section('content.main')
  <div class="col-8">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Candidatos</h3>
    <div class="caja-listado">
      <h5 class="primary-color">Agregar candidatos</h5>
      <form class="row needs-validation" novalidate method="POST" name="f1">
        <div class="col-4 form-group">
          <label for="firstname" class="black-text">Nombres</label>
          <input type="text" name="firstname" class="form-control" required></input>
          <div class="valid-feedback">¡Excelente!</div>
          <div class="invalid-feedback">Complete el campo</div>
        </div>
        <div class="col-4 form-group">
          <label for="lastname" class="black-text">Apellidos</label>
          <input type="text" name="lastname" class="form-control" required></input>
          <div class="valid-feedback">¡Excelente!</div>
          <div class="invalid-feedback">Complete el campo</div>
        </div>
        <div class="col-4 form-group">
          <label for="partido" class="black-text">Partido</label>
          <input type="number" pattern="\d{3}-\d{3}-\d{4}" name="partido" class="form-control" required></input>
          <div class="valid-feedback">¡Excelente!</div>
          <div class="invalid-feedback">Formato invalido</div>
        </div>
        <div class="col-6 form-group">
          <label for="puesto" class="black-text">Puesto de aspiración</label>
          <input type="number" name="puesto" class="form-control" required></input>
          <div class="valid-feedback">¡Excelente!</div>
          <div class="invalid-feedback">Fomarto invalido</div>
        </div>
        <div class="col-6 form-group">
          <label for="password" class="black-text" style="display:block;">Estado</label>
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
        <div class="col-4 form-group">
          <label for="username" class="black-text" style="display:block;">Foto de perfil</label>
          <form enctype="multipart/form-data" action="uploader.php" method="POST">
            <input name="uploadedfile" type="file" class="title3-text" />
          </form>
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
          <tr>
            <th scope="row">1</th>
            <td>Anthony</td>
            <td>Estevez</td>
            <td>1</td>
            <td>1</td>
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
            <td>Rachel</td>
            <td>Estevez</td>
            <td>2</td>
            <td>1</td>
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
            <td>Arys</td>
            <td>Valera</td>
            <td>3</td>
            <td>1</td>
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