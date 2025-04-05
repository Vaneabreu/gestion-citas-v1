<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrar Cita</title>

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
        .form-container {
            max-width: 600px;
            /* Controla el tamaño del formulario */
            margin: 50px auto;
        }

        .icon-title {
            font-size: 1.5rem;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="cita-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-12">
                    <div class="card card-transparent shadow-none form-container">
                        <div class="card-body">
                            <h2 class="mb-4 text-center">
                                <i class="bi bi-calendar-check icon-title"></i> Registrar Cita Médica
                            </h2>
                            <form action="{{ route('citas.store') }}" method="POST">
                                @csrf

                                <!-- Seleccionar Paciente -->
                                <div class="form-group">
                                    <label for="paciente_id">Paciente</label>
                                    <select class="form-control" id="paciente_id" name="paciente_id" required>
                                        <option value="">Selecciona un paciente</option>
                                        @foreach($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}">{{ $paciente->nombre }}
                                                {{ $paciente->apellido }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Fecha de la cita -->
                                <div class="form-group">
                                    <label for="fecha_cita">Fecha de la Cita</label>
                                    <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" required>
                                </div>

                                <!-- Hora de la cita -->
                                <div class="form-group">
                                    <label for="hora_cita">Hora de la Cita</label>
                                    <input type="time" class="form-control" id="hora" name="hora" required>
                                </div>

                                <!-- Procedimiento -->
                                <div class="form-group">
                                    <label for="procedimiento">Procedimiento</label>
                                    <input type="text" class="form-control" id="procedimiento" name="procedimiento"
                                        required>
                                </div>

                                <!-- Descripción -->
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                                </div>

                                <!-- Seguro -->
                                <div class="form-group">
                                    <label for="con_seguro">¿Con Seguro?</label>
                                    <select class="form-control" id="con_seguro" name="con_seguro">
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <!-- Nombre del doctor -->
                                <div class="form-group">
                                    <label for="nombre_doctor">Nombre del Doctor</label>
                                    <input type="text" class="form-control" id="nombre_doctor" name="nombre_doctor"
                                        required>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar Cita</button>
                            </form>

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

    <!-- Script para mostrar el campo de seguro solo si tiene seguro -->
    <!--  <script>
        document.getElementById('tiene_seguro').addEventListener('change', function () {
            var seguroGroup = document.getElementById('seguro-group');
            if (this.value == '1') {
                seguroGroup.style.display = 'block';
            } else {
                seguroGroup.style.display = 'none';
            }
        });
    </script> -->
</body>

</html>