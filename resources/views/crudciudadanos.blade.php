@extends('layouts.main')

@section('title', 'Ciudadanos CRUD')

@section('content.main')
  <div class="col-9">
    <h3 class="title1-text primary-color text-left" style="margin-top:20px;">Ciudadanos</h3>
    <div class="caja-listado">
        <h5 class="primary-color">Agregar ciudadano</h5>
        <form class="row needs-validation" novalidate method="POST" name="f1">
            <div class="col-4 form-group">
                <label for="cedula" class="black-text">Cédula</label>
                <input type="tel" pattern="\d{3}-\d{7}-\d{1}" name="cedula" class="form-control  mx-auto" required></input>  
                <div class="valid-feedback">¡Excelente!</div>
                <div class="invalid-feedback">Formato invalido, el formato correcto es 000-0000000-0</div>
            </div>
            <div class="col-4 form-group">
                <label for="firstname" class="black-text">Nombre</label>
                <input type="text" name="firstname" class="form-control" required></input>
                <div class="valid-feedback">¡Excelente!</div>
                <div class="invalid-feedback">Complete el campo</div>
            </div>
            <div class="col-4 form-group">
                <label for="lastname" class="black-text">Apellido</label>
                <input type="text" name="lastname" class="form-control" required></input>
                <div class="valid-feedback">¡Excelente!</div>
                <div class="invalid-feedback">Complete el campo</div>
            </div>
            <div class="col-4 form-group">
                <label for="email" class="black-text">Email</label>
                <input type="email" name="email" class="form-control" required></input>
                <div class="valid-feedback">¡Excelente!</div>
                <div class="invalid-feedback">Complete el campo</div>
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
    </form>
    </div>
    <div class="caja-listado table-responsive">
      <h5 class="primary-color">Lista de Ciudadanos</h5>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
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
          <tr>
            <th scope="row">1</th>
            <td>001-0123456-7</td>
            <td>Juan</td>
            <td>Perez</td>
            <td>jperez@gmail.com</td>
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
            <td>001-0123456-7</td>
            <td>Juan</td>
            <td>Perez</td>
            <td>jperez@gmail.com</td>
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
            <td>001-0123456-7</td>
            <td>Juan</td>
            <td>Perez</td>
            <td>jperez@gmail.com</td>
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