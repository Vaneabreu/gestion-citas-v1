<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Citas Médicas</title>

    <!-- Hope UI CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/core/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/hope-ui.min.css?v=1.0.3') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.min.css?v=1.0.3') }}">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        #navigation {
            align-items: center;
            flex-direction: column-reverse;
            gap: var(--md, 15px);
            inset: 0;
            margin: var(--md, 15px);
            max-width: 100%;
            min-width: 0;
            position: fixed;
            z-index: 10;

            @media screen and (min-width: 440px) {
                flex-direction: row;
            }

            .icon {
                --size: var(--xl);
            }

            #rail {
                align-items: inherit;
                background-color: hsla(from var(--clr-secondary) h s l/50%);
                backdrop-filter: blur(var(--xs, 5px));
                border-radius: var(--xs, 5px);
                flex-shrink: 0;
                gap: inherit;
                height: 50px;
                overflow: clip;
                padding: var(--md, 15px);
                width: 100%;

                @media screen and (min-width: 440px) {
                    flex-direction: column;
                    height: 100%;
                    width: max-content;
                }

                #logo {
                    aspect-ratio: 1/1;
                    flex-shrink: 1;
                    height: 20px;
                    width: 20px;
                }

                #menu-icons {
                    align-items: inherit;
                    gap: var(--md, 15px);
                    place-content: end;

                    @media screen and (min-width: 440px) {
                        flex-direction: column;
                        place-content: start;
                    }

                    :where(a:not(:hover, :focus, :active)) {
                        color: inherit;
                    }

                    hr {
                        height: 50px;
                        width: 1px;

                        @media screen and (min-width: 440px) {
                            height: 1px;
                            width: 100%;
                        }
                    }

                    button {
                        --background: inherit;
                        border-radius: 0;
                        color: inherit;
                        padding: 0;
                    }
                }
            }

            #drawer {
                background-color: hsla(from var(--clr-secondary) h s l/50%);
                backdrop-filter: blur(var(--xs, 5px));
                border-radius: var(--xs, 5px);
                display: flex;
                flex-direction: column;
                gap: var(--md, 15px);
                margin: 0;
                opacity: 0;
                overflow: auto;
                padding: var(--md, 15px);
                place-content: space-between;
                pointer-events: none;
                position: relative;
                visibility: hidden;
                width: 100%;
                z-index: 10;

                &[open] {
                    opacity: 1;
                    pointer-events: revert;
                    visibility: visible;
                }

                @media screen and (min-width: 440px) {
                    place-content: start;
                    height: 100%;
                    width: min(300px, 100%);
                }

                > * {
                    flex-shrink: 0;
                }

                a {
                    align-items: center;
                    display: flex;
                    font-size: var(--lg, 25px);
                    gap: var(--xs, 5px);
                    width: 100%;

                    &:where(:not(:hover, :focus, :active)) {
                        color: inherit;
                    }

                    span {
                        flex-grow: 1;
                    }
                }
            }
        }

        .icon-title {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        #tablaCitas tbody tr:hover {
            background-color: #f0f0f0;
            cursor: pointer;
        }

        #tablaCitas td button {
            pointer-events: auto;
        }

        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding: 1rem;
        }

        .sidebar a {
            display: block;
            padding: 10px 15px;
            margin-bottom: 5px;
            color: #333;
            text-decoration: none;
            border-radius: 8px;
        }

        .sidebar a:hover {
            background-color: #e2e6ea;
        }

        .grafica-box {
            background-color: #eaeaea;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 20px;
            width: 200px;
        }

        .grafica-circle {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .grafica-circle span {
            display: inline-block;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .grafica-pink { background-color: pink; }
        .grafica-blue { background-color: lightblue; }

        .user-info {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-bottom: 15px;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info span {
            font-size: 1rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div id="navigation">
    <div id="rail">
        <div id="logo">Logo</div>
        <div id="menu-icons">
            <a href="#">Citas</a>
            <a href="#">Pacientes</a>
            <a href="#">Configuración</a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <h5 class="mb-4">Menú</h5>
            <a href="#">Citas</a>
            <a href="#">Pacientes</a>
            <a href="#">Configuración</a>
        </div>

        <!-- Contenido Principal -->
        <div class="col-md-10">
            <!-- Información del usuario -->
            <div class="user-info"></div>
                <img src="{{ asset('assets/images/user-placeholder.png') }}" alt="Usuario">
                <span>{{ Auth::user()->name }}</span>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <div class="grafica-box">
                    <strong>Gráfica:</strong>
                    <div class="grafica-circle">
                        <span class="grafica-pink"></span> 26
                    </div>
                    <div class="grafica-circle">
                        <span class="grafica-blue"></span> 10
                    </div>
                    <small>Total: 36 Pacientes</small>
                </div>
            </div>

            <div class="table-container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2><i class="bi bi-calendar-check icon-title"></i> Lista de Citas Médicas</h2>
                    <button class="btn btn-primary" onclick="abrirModalNueva()">+ Nueva Cita</button>
                </div>

                <!-- Filtros -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" id="filtroPaciente" class="form-control" placeholder="Filtrar por paciente" oninput="filtrarCitas()">
                    </div>
                    <div class="col-md-6">
                        <input type="date" id="filtroFecha" class="form-control" onchange="filtrarCitas()">
                    </div>
                </div>

                <!-- Tabla -->
                <table class="table table-striped" id="tablaCitas">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Paciente</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Procedimiento</th>
                        <th>Doctor</th>
                        <th>Mover</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($citas as $cita)
                        <tr onclick="abrirModalEditar(this)">
                            <td>{{ $cita->id }}</td>
                            <td>{{ $cita->paciente->nombre }} {{ $cita->paciente->apellido }}</td>
                            <td>{{ $cita->fecha_cita }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->procedimiento }}</td>
                            <td>{{ $cita->nombre_doctor }}</td>
                            <td>
                                <div class="d-flex flex-column align-items-center">
                                    <button class="btn btn-sm btn-outline-primary mb-1" onclick="moverArriba(event, this)">
                                        <i class="bi bi-chevron-up"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-primary" onclick="moverAbajo(event, this)">
                                        <i class="bi bi-chevron-down"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <p>Total de citas: <span id="totalCitas">{{ count($citas) }}</span></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
