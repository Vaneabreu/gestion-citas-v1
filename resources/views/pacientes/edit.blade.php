<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Paciente</title>

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
        .icon-title {
            font-size: 1.5rem;
            margin-right: 10px;
        }
        /* Asegura que la imagen ocupe el 100% de la altura y el ancho */
        .image-container {
            height: 100vh;
            width: 50%;
            overflow: hidden;
        }

        .image-container img {
            object-fit: cover; /* Asegura que la imagen cubra todo el contenedor sin distorsionarse */
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="pacientes-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0">
                                <div class="card-body">
                                    <!-- Título con ícono -->
                                    <h2 class="mb-2 text-center">
                                        <i class="bi bi-person icon-title"></i> Editar Paciente
                                    </h2>
                                    <p class="text-center">Aquí puedes editar los datos del paciente.</p>

                                    <!-- Formulario de Edición -->
                                    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $paciente->nombre) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="apellido" class="form-label">Apellido</label>
                                                    <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', $paciente->apellido) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="genero" class="form-label">Género</label>
                                                    <select class="form-control" id="genero" name="genero" required>
                                                        <option value="Masculino" {{ $paciente->genero == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                                        <option value="Femenino" {{ $paciente->genero == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="direccion" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $paciente->direccion) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="telefono" class="form-label">Teléfono</label>
                                                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $paciente->telefono) }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn btn-primary">Actualizar Paciente</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenedor de imagen en la mitad de la pantalla -->
                <div class="col-md-6 image-container">
                    <img src="{{ asset('assets/images/auth/01.png') }}" alt="Imagen de autenticación">
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
