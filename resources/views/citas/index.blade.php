<!-- filepath: c:\Users\randy\OneDrive\Escritorio\Proyecto\sistema-citas\resources\views\citas\index.blade.php -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Citas</title>

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
        .table-container {
            max-width: 1200px;
            margin: 50px auto;
        }

        .icon-title {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="citas-content">
            <div class="table-container">
                <h2 class="mb-4 text-center">
                    <i class="bi bi-calendar-check icon-title"></i> Lista de Citas Médicas
                </h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Paciente</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Procedimiento</th>
                            <th>Doctor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($citas as $cita)
                        <tr>
                            <td>{{ $cita->id }}</td>
                            <td>{{ $cita->paciente->nombre }} {{ $cita->paciente->apellido }}</td>
                            <td>{{ $cita->fecha_cita }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->procedimiento }}</td>
                            <td>{{ $cita->nombre_doctor }}</td>
                            <td>
                                <div class="action-buttons">
                                    <!-- Botón para editar -->
                                    <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Editar
                                    </a>

                                    <!-- Botón para eliminar -->
                                    <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta cita?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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