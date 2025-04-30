@extends('welcome')

@section('content')
    <div class="col-md-12" style="display: flex; justify-content: center; align-items: center;">
        <div class="panel panel-default col-md-12" style='width: 90%;'>
            <div class="panel-heading">
                <h3 class="panel-title">Usuarios</h3>
            </div>
            <div class="panel-body" style='height: 50em;'>
                <div class="container col-md-12" style='margin-top: 20px;'>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUsuarios">
                        Agregar Usuario
                    </button>
                </div>
                <div class="col-md-12" style='margin-top: 2em;  margin-bottom: 5em;'>
                    <table id="tblActiveUsers" class="table table-striped table-hover "
                        style="width:90%; margin-bottom: 5em;" name="miTabla">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($usuarios->where('status', 1) as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->role }}</td>
                                <td><span class="label label-success">Activo</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Editar</button>
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="col-md-12" style='margin-top: 2em;  margin-bottom: 5em;'>
                    <table id="tblDisabledUsers" class="table table-striped table-hover " style="width:90%" name="miTabla">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($usuarios->where('status', 0) as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->role }}</td>
                                <td><span class="label label-success">Inactivo</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Editar</button>
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                $('#tblActiveUsers').DataTable();
            });
            $(document).ready(function() {
                $('#tblDisabledUsers').DataTable();
            });
        });
    </script>
@endsection
