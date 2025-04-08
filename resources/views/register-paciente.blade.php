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
                                            <!-- Nombre -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required maxlength="255" placeholder="Nombre">
                                                    @if ($errors->has('nombre'))
                                                        <div class="alert alert-danger">{{ $errors->first('nombre') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Documento -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="documento" class="form-label">Documento</label>
                                                    <input type="text" class="form-control" id="documento" name="documento" value="{{ old('documento') }}" required maxlength="50" placeholder="Documento">
                                                    @if ($errors->has('documento'))
                                                        <div class="alert alert-danger">{{ $errors->first('documento') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Sexo -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="sexo" class="form-label">Sexo</label>
                                                    <select class="form-control" id="sexo" name="sexo" required>
                                                        <option value="">Seleccionar Sexo</option>
                                                        <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                                                        <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
                                                    </select>
                                                    @if ($errors->has('sexo'))
                                                        <div class="alert alert-danger">
                                                            {{ $errors->first('sexo') }}
                                                            @if (!in_array(old('sexo'), ['M', 'F']))
                                                                <div>El valor seleccionado no es válido. Por favor, selecciona "Masculino" o "Femenino".</div>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- WhatsApp -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="whatsapp" class="form-label">WhatsApp</label>
                                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" maxlength="20" placeholder="WhatsApp">
                                                </div>
                                            </div>

                                            <!-- Dirección -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="direccion" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" maxlength="255" placeholder="Dirección del paciente">
                                                </div>
                                            </div>

                                            <!-- ID Aseguradoras -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="id_aseguradoras" class="form-label">Aseguradora</label>
                                                    <select class="form-control" id="id_aseguradoras" name="id_aseguradoras">
                                                        <option value="">Seleccionar Aseguradora</option>
                                                        @foreach ($aseguradoras as $aseguradora)
                                                            <option value="{{ $aseguradora->id_aseguradoras }}" {{ old('id_aseguradoras') == $aseguradora->id_aseguradoras ? 'selected' : '' }}>
                                                                {{ $aseguradora->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('id_aseguradoras'))
                                                        <div class="alert alert-danger">{{ $errors->first('id_aseguradoras') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- No. Seguro -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="no_seguro" class="form-label">No. Seguro</label>
                                                    <input type="text" class="form-control" id="no_seguro" name="no_seguro" value="{{ old('no_seguro') }}" maxlength="50" placeholder="No. Seguro">
                                                </div>
                                            </div>

                                            <!-- Estado -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="estado" class="form-label">Estado</label>
                                                    <select class="form-control" id="estado" name="estado" required>
                                                        <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Activo</option>
                                                        <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                                                    </select>
                                                    @if ($errors->has('estado'))
                                                        <div class="alert alert-danger">{{ $errors->first('estado') }}</div>
                                                    @endif
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
