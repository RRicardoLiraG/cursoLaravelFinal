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
                <div class="col-md-12" style='margin-top: 2em;'>
                    <table id="tableUsurios" class="display" style="width:100%">
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
                        <tbody>
                            {{-- @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->rol }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Editar</button>
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
         $(document).ready(function() {
            $('#tableUsurios').DataTable({
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
        });
        //Editar Sucursales ===================================
        // $(".table").on('click', '.btnEditarSucursal', function() {
        //     let idSucursal = $(this).attr('idSucursal');

        //     $.ajax({
        //         url: 'branches/' + idSucursal + '/edit',
        //         type: 'GET',
        //         success: function(sucursal) {
        //             $("#nombreEditar").val(sucursal.name);
        //             $("#idEditar").val(sucursal.id);
        //         }
        //     })
        // })
    </script>
@endsection
