<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hope UI | Registrar Paciente</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css?v=1.0.3') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=1.0.3') }}" />
</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">
                                    <a href="../dashboard/index.html" class="navbar-brand d-flex align-items-center mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857q.09.083.176.171a3 3 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01zM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5" />
                                        </svg>
                                        <h4 class="logo-title ms-3">Citas Medicas</h4>
                                    </a>
                                    <h2 class="mb-2 text-center">Registrar Paciente</h2>
                                    <p class="text-center">Por favor, completa los datos del paciente.</p>

                                    <!-- Formulario de Registro del Paciente -->
                                    <form method="POST" action="{{ route('pacientes.store') }}">
                                        @csrf
                                        <div class="row">
                                            <!-- Nombre Completo -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required placeholder="Nombre">
                                                    @if ($errors->has('nombre'))
                                                        <div class="alert alert-danger">{{ $errors->first('nombre') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Apellido -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="apellido" class="form-label">Apellido</label>
                                                    <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" required placeholder="Apellido">
                                                    @if ($errors->has('apellido'))
                                                        <div class="alert alert-danger">{{ $errors->first('apellido') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Fecha de Nacimiento -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                                                    @if ($errors->has('fecha_nacimiento'))
                                                        <div class="alert alert-danger">{{ $errors->first('fecha_nacimiento') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Género -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="genero" class="form-label">Género</label>
                                                    <select class="form-control" id="genero" name="genero" required>
                                                        <option value="">Seleccionar Género</option>
                                                        <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                                        <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                                        <option value="Otro" {{ old('genero') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                                    </select>
                                                    @if ($errors->has('genero'))
                                                        <div class="alert alert-danger">{{ $errors->first('genero') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Correo Electrónico -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">Correo Electrónico</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required placeholder="Correo electrónico">
                                                    @if ($errors->has('email'))
                                                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Teléfono -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="telefono" class="form-label">Teléfono</label>
                                                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required placeholder="Número de teléfono">
                                                    @if ($errors->has('telefono'))
                                                        <div class="alert alert-danger">{{ $errors->first('telefono') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Dirección -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="direccion" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" placeholder="Dirección del paciente">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="d-flex justify-content-end mt-4">
                                            <button type="submit" class="btn btn-primary">Registrar Paciente</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sign-bg">
                        <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.05">
                                <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF" />
                                <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF" />
                                <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF" />
                                <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF" />
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="{{ asset('assets/images/auth/01.png') }}" class="img-fluid gradient-main animated-scaleX" alt="images">
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
