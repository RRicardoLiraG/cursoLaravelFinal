@extends('welcome')

@section('content')
    <div class="col-md-12" style="display: flex; justify-content: center; align-items: center;">
        <div class="panel panel-default" style='width: 90%;'>
            <div class="panel-heading">
                <h3 class="panel-title">Usuarios</h3>
            </div>
            <div class="panel-body" style='height: 50em;'>
                <div class="container col-md-12" style='margin-top: 20px;'>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewUserModal">
                        Agregar Usuario
                    </button>
                </div>
                <div class="col-md-12" style='margin-top: 2em;  margin-bottom: 5em;'>
                    <h2>Tabla de Usuarios Activos</h2>
                    <hr>
                    <table id="tblActiveUsers" class="table table-striped table-hover "
                        style="width:100%; margin-bottom: 5em;" name="miTabla">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 25%;">Nombre</th>
                                <th style="width: 25%;">Correo</th>
                                <th style="width: 10%;">Rol</th>
                                <th style="width: 10%;">Estado</th>
                                <th style="width: 25%;">Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($usuarios->where('status', 1) as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->role }}</td>
                                <td><span class="label label-success">Activo</span></td>
                                <td style="white-space: nowrap;"> <!-- Evita saltos de línea -->
                                    <div class="btn-group" role="group">
                                        <!-- Botón Editar -->
                                        <button class="btn btn-sm btn-primary" style="margin-right: 5px;">
                                            <i class="fa fa-edit"></i> Editar
                                        </button>

                                        <!-- Botón Desactivar -->
                                        <form action="{{ route('users.deactivate', $usuario->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-warning">
                                                <i class="fa fa-ban"></i> Desactivar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        {{-- <form id="formDelete" action="{{ route('content/users/{id}/delete') }}" method="POST"> --}}

                        </form>
                    </table>
                </div>
                <h2>Tabla de Usuarios Inactivos</h2>
                <hr>
                <div class="col-md-12" style='margin-top: 2em;  margin-bottom: 5em;'>
                    <table id="tblDisabledUsers" class="table table-striped table-hover " style="width:100%" name="miTabla">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 25%;">Nombre</th>
                                <th style="width: 25%;">Correo</th>
                                <th style="width: 10%;">Rol</th>
                                <th style="width: 10%;">Estado</th>
                                <th style="width: 25%;">Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($usuarios->where('status', 0) as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->role }}</td>
                                <td><span class="label label-danger">Inactivo</span></td>
                                <td style="white-space: nowrap;"> <!-- Evita saltos de línea -->
                                    <div class="btn-group" role="group">
                                        <!-- Botón Editar -->
                                        <button class="btn btn-sm btn-primary" style="margin-right: 5px;">
                                            <i class="fa fa-edit"></i> Editar
                                        </button>

                                        <!-- Botón Activar -->
                                        <form action="{{ route('users.activate', $usuario->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-warning">
                                                <i class="fa fa-check"></i> Activar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}

    <!-- Modal Bootstrap 3 -->
    <div class="modal fade" id="addNewUserModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="userModalLabel">Agregar nuevo usuario</h4>
                </div>

                <div class="modal-body">
                    <form id="addUserForm" action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Nombre" name="name">
                            <br>
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" id="email" placeholder="Correo" name="email">
                            <br>
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="Contraseña"
                                name="password">
                            <br>
                            <label for="role">Rol</label>
                            <select class="form-control" id="role" name="role">
                                <option value="" disabled selected>Selecciona un rol</option>
                                <option value="Administrativo">Administrador</option>
                                <option value="Usuario">Usuario</option>
                                <option value="Invitado">Invitado</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" form="addUserForm">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('#tblActiveUsers').DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros en total)",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron resultados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                }
            });

            $('#tblDisabledUsers').DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros en total)",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron resultados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });

            $('#addUserForm').on('submit', function(e) {
                // Prevenir el envío del formulario hasta que se validen los campos
                e.preventDefault();

                var name = $('#name').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var role = $('#role').val();

                if (name === "" || email === "" || password === "" || role === "") {
                    // Si algún campo está vacío, mostrar SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Por favor, llena todos los campos antes de guardar el usuario.',
                    });
                } else {
                    // Si todos los campos están completos, enviamos el formulario
                    this.submit(); // Enviar el formulario
                }
            });

        });
    </script>
@endsection
