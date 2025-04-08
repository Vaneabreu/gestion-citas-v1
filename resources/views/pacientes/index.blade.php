<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Pacientes</title>

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css?v=1.0.3') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=1.0.3') }}" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        .bg-pink {
            background-color: #ffcccc;
        }

        .bg-blue {
            background-color: #cce5ff;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .icon-title {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        /* Estilo para la tarjeta (card) centrada */
        .card-container {
            max-width: 80%;
            /* Controla el tamaño máximo de la tarjeta */
            margin: 50px auto;
            /* Centra la tarjeta en la página */
        }

        /* Estilo para la tabla dentro de la tarjeta */
        .table-responsive {
            max-height: 500px;
            /* Hace que la tabla tenga una altura máxima */
            overflow-y: auto;
            /* Permite el desplazamiento si la tabla es muy grande */
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="pacientes-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-12">
                    <!-- Card Container centrado -->
                    <div class="card card-transparent shadow-none card-container">
                        <div class="card-body">
                            <!-- Título con ícono de usuario -->
                            <h2 class="mb-2 text-left">
                                <i class="bi bi-person icon-title" style="font-size: 2rem;"></i> Lista de Pacientes
                            </h2>
                            <p class="text-left">Aquí puedes ver todos los pacientes registrados.</p>

                            <!-- Tabla dentro de la tarjeta -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Fecha de Nacimiento</th>
                                            <th>Género</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pacientes as $paciente)
                                            <tr @class(['bg-pink' => $paciente->genero == 'Femenino', 'bg-blue' => $paciente->genero == 'Masculino'])>
                                                <td>{{ $paciente->nombre }}</td>
                                                <td>{{ $paciente->apellido }}</td>
                                                <td>{{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') }}</td>
                                                <td>{{ $paciente->genero }}</td>
                                                <td>{{ $paciente->direccion }}</td>
                                                <td>{{ $paciente->telefono }}</td>
                                                <td>
                                                    <a href="{{ route('pacientes.edit', $paciente->id_pacientes) }}" class="btn btn-warning btn-sm">Editar</a>
                                                    <form action="{{ route('pacientes.destroy', $paciente->id_pacientes) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Required Library Bundle Script -->
    <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>

    <!-- App Script -->
    <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>
</body>

</html>