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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/citas.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
              
                <img src="https://citamedica.com.pe/wp-content/uploads/2019/10/logo_CM_partner.png" alt="Logo Medicina" class="img-fluid my-4" style="max-width: 200px;">
         
                <a href="/citas">Citas</a>
                <a href="/pacientes">Pacientes</a>
                <a href="#">Configuración</a>
            </div>
            

            <!-- Main Content -->
            <div class="col-md-10">
                <!-- Navbar Profile -->
                <div class="navbar-profile">
                    <img src="https://img.freepik.com/fotos-premium/foto-perfil-dibujos-animados-divertida-unica-que-representa-su-estilo-personalidad_1283595-14213.jpg"
                        alt="Foto de perfil">
                    <strong>{{ Auth::user()->name }}</strong>
                    <a href="{{ route('logout') }}" style="color: inherit; text-decoration: none;"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>



                <!-- Table Card -->
                <div class="card-table mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2> Lista de Citas Médicas<!-- <i class="bi bi-calendar-check icon-title"></i> --></h2>
                        <button class="btn btn-primary btn-round d-flex align-items-center justify-content-center"
                            style="border-radius: 50%; width: 50px; height: 50px; font-size: 1.5rem;"
                            onclick="abrirModalNueva()">+</button>
                    </div>

                    <!-- Filtros -->
                    <div class="d-flex justify-content-end align-items-center mb-3" style="gap: 10px;">
                        <input type="text" id="filtroPaciente" class="form-control form-control-sm" 
                            placeholder="Paciente" oninput="filtrarCitas()" style="width: 150px;">
                        <input type="date" id="filtroFecha" class="form-control form-control-sm" 
                            onchange="filtrarCitas()" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="" style="width: 150px;">
                        <select id="filtroRangoFecha" class="form-control form-control-sm" 
                            onchange="filtrarCitas()" style="width: 150px;">
                            <option value="">Rango</option>
                            <option value="hoy">Hoy</option>
                            <option value="semana">Esta Semana</option>
                            <option value="mes">Este Mes</option>
                        </select>
                    </div>

                    <!-- Tabla -->
                    <table class="table table-striped" id="tablaCitas">
                        <thead>
                            <tr>
                                <th>Turno</th>
                                <th>Paciente</th>
                                <th>Cedula</th>
                                <th>Telefono <i class="bi bi-whatsapp" style="color: #25D366;"></i></th>
                                <th>Hora</th>
                                <th>Tipo de Cita</th>
                                <th>Estado</th>
                                <th>Seguimiento</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($citas as $index => $cita)
                                <tr draggable="true" onclick="abrirModalEditar(this)" data-id_citas="{{ $cita->id_citas }}"
                                    data-paciente-id="{{ $cita->paciente ? $cita->paciente->id_pacientes : '' }}"
                                    data-paciente-nombre="{{ $cita->paciente ? $cita->paciente->nombre : 'N/A' }}"
                                    data-paciente-whatsapp="{{ $cita->paciente ? $cita->paciente->whatsapp : 'N/A' }}"
                                    data-paciente-documento="{{ $cita->paciente ? $cita->paciente->documento : 'N/A' }}"
                                    data-fecha="{{ \Carbon\Carbon::parse($cita->fechacita)->format('Y-m-d\TH:i') }}"
                                    data-aseguradora-id="{{ $cita->aseguradora ? $cita->aseguradora->id_aseguradoras : '' }}"
                                    data-tipo-cita-id="{{ $cita->tipoCita ? $cita->tipoCita->id_tipos_citas : '' }}"
                                    data-honorarios="{{ $cita->tipoCita ? $cita->tipoCita->precio1 : '' }}"
                                    data-hora-entrada="{{ $cita->hora_entrada }}"
                                    data-hora-salida="{{ $cita->hora_salida }}">
                                    <td>{{ $index + 1 }}</td> 
                                    <td
                                        style="color: {{ $cita->paciente && $cita->paciente->sexo === 'F' ? '#d34298' : ($cita->paciente && $cita->paciente->sexo === 'M' ? '#2b95f9' : 'inherit') }}">
                                        {{ $cita->paciente ? $cita->paciente->nombre . ' ' . $cita->paciente->apellido : 'N/A' }}
                                    </td>
                                    <td>{{ $cita->paciente ? preg_replace('/(\d{3})(\d{7})(\d{1})/', '$1-$2-$3', $cita->paciente->documento) : 'N/A' }}
                                    </td>
                                    <td>
                                        @if($cita->paciente && $cita->paciente->whatsapp)
                                            <a href="https://web.whatsapp.com/send?phone={{ preg_replace('/\D/', '', $cita->paciente->whatsapp) }}"
                                                target="_blank" style="text-decoration: none; color: #3a57e8;">
                                                {{ preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1-$2-$3', $cita->paciente->whatsapp) }}
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($cita->fechacita)->format(' h:i A') }}
                                    </td>


                                    <td>{{ $cita->tipoCita ? $cita->tipoCita->descripcion : 'N/A' }}</td>
                                    <td>{{ $cita->estado }}</td>

                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    id="estadoSwitch{{ $cita->id_citas }}"
                                                    onchange="toggleEstado(event, {{ $cita->id_citas }})"
                                                    {{ $cita->hora_entrada && !$cita->hora_salida ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p>Total de citas: <span id="totalCitas">{{ $citas->total() }}</span></p>


                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div>
                            Mostrando página {{ $citas->currentPage() }} de {{ $citas->lastPage() }}
                        </div>
                        <div>
                            {{ $citas->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    </div>


                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            document.querySelectorAll('.page-item .page-link').forEach(link => {
                                if (link.textContent.trim() === 'Previous') link.textContent = 'Anterior';
                                if (link.textContent.trim() === 'Next') link.textContent = 'Siguiente';
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para nueva/editar cita -->
    <div class="modal fade" id="modalCita" tabindex="-1" aria-labelledby="modalCitaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form class="modal-content" method="POST" id="formCita">
                @csrf
                <input type="hidden" name="is_update" id="isUpdateInput" value="0"> <!-- Cambiará a 1 si es edición -->
                <input type="hidden" name="cita_id" id="citaIdInput"> <!-- Clave para saber si estamos editando -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCitaLabel">Nueva Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <!-- Inputs para paciente, fecha, doctor, etc -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Paciente</label>
                            <select class="form-control" name="paciente_id" required>
                                <option value="">Seleccionar paciente</option>
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id_pacientes }}">{{ $paciente->nombre }}
                                        {{ $paciente->apellido }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Fecha y Hora</label>
                            <input type="datetime-local" class="form-control" name="fecha_cita" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Aseguradora</label>
                            <select class="form-control" name="id_aseguradoras">
                                <option value="">Seleccionar aseguradora</option>
                                @foreach($aseguradoras as $aseguradora)
                                    <option value="{{ $aseguradora->id_aseguradoras }}">{{ $aseguradora->descripcion }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Estado</label>
                            <input type="text" class="form-control" name="estado" value="Pendiente">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Tipo de Cita</label>
                            <select class="form-control" name="id_tipos_citas" id="tipoCitaSelect"
                                onchange="actualizarHonorarios()" required>
                                <option value="">Seleccionar tipo de cita</option>
                                @foreach($tiposCitas as $tipoCita)
                                    <option value="{{ $tipoCita->id_tipos_citas }}"
                                        data-honorarios="{{ $tipoCita->precio1 }}">{{ $tipoCita->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Honorarios</label>
                            <input type="text" class="form-control" name="honorarios" id="honorariosInput" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                   
                    <button type="button" class="btn btn-danger" id="btnEliminarCita"
                        style="display: none;" onclick="eliminarCita()">Cancelar</button> 
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/core/libs.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/external.min.js') }}"></script>
    <script src="{{ asset('assets/js/hope-ui.js') }}" defer></script>

    <script>
        function abrirModalNueva() {
            const form = document.getElementById('formCita');
            form.action = "{{ route('citas.store') }}"; // Endpoint para creación
            document.getElementById('isUpdateInput').value = '0'; // Indica que es creación
            document.getElementById('modalCitaLabel').innerText = 'Nueva Cita';
            form.reset();
            document.getElementById('citaIdInput').value = ''; // No hay ID para creación

            // Ocultar el botón de eliminar
            document.getElementById('btnEliminarCita').style.display = 'none';

            new bootstrap.Modal(document.getElementById('modalCita')).show();
        }

        function abrirModalEditar(fila) {
            // Verifica si el evento se originó desde un switch
            if (event.target.classList.contains('form-check-input')) {
                return; // No abrir el modal si el clic fue en un switch
            }

            const form = document.getElementById('formCita');
            const citaId = fila.dataset.id_citas;

            form.action = "{{ route('citas.store') }}"; // Mismo endpoint para creación y edición
            document.getElementById('isUpdateInput').value = '1'; // Indica que es edición
            document.getElementById('citaIdInput').value = citaId;

            // Rellenar los campos del formulario
            form.querySelector('[name="paciente_id"]').value = fila.dataset.pacienteId || '';
            form.querySelector('[name="fecha_cita"]').value = fila.dataset.fecha || '';
            form.querySelector('[name="id_aseguradoras"]').value = fila.dataset.aseguradoraId || '';
            form.querySelector('[name="id_tipos_citas"]').value = fila.dataset.tipoCitaId || '';
            form.querySelector('[name="honorarios"]').value = fila.dataset.honorarios || '';

            const pacienteNombre = fila.dataset.pacienteNombre || 'N/A';
            document.getElementById('modalCitaLabel').innerText = `Editar Cita - ${pacienteNombre}`;

            // Mostrar el botón de eliminar
            document.getElementById('btnEliminarCita').style.display = 'inline-block';

            new bootstrap.Modal(document.getElementById('modalCita')).show();
        }

        function filtrarCitas() {
            const nombre = document.getElementById('filtroPaciente').value.toLowerCase();
            const fecha = document.getElementById('filtroFecha').value; // Empty if no date selected
            const rangoFecha = document.getElementById('filtroRangoFecha').value;
            const filas = document.querySelectorAll('#tablaCitas tbody tr');
            let total = 0;

            const hoy = new Date();
            const inicioSemana = new Date(hoy.setDate(hoy.getDate() - hoy.getDay()));
            const finSemana = new Date(hoy.setDate(hoy.getDate() - hoy.getDay() + 6));
            const inicioMes = new Date(hoy.getFullYear(), hoy.getMonth(), 1);
            const finMes = new Date(hoy.getFullYear(), hoy.getMonth() + 1, 0);

            filas.forEach(fila => {
                const nombreFila = fila.dataset.pacienteNombre ? fila.dataset.pacienteNombre.toLowerCase() : '';
                const fechaFila = fila.dataset.fecha ? new Date(fila.dataset.fecha.split('T')[0]) : null;

                let visible = true;

                // Apply patient name filter
                if (nombre) {
                    visible = nombreFila.includes(nombre);
                }

                // Apply date or range filter
                if (visible && (fecha || rangoFecha)) {
                    if (fechaFila) {
                        if (rangoFecha === 'hoy') {
                            visible = fechaFila.toDateString() === new Date().toDateString();
                        } else if (rangoFecha === 'semana') {
                            visible = fechaFila >= inicioSemana && fechaFila <= finSemana;
                        } else if (rangoFecha === 'mes') {
                            visible = fechaFila >= inicioMes && fechaFila <= finMes;
                        } else if (fecha) {
                            visible = fechaFila.toISOString().split('T')[0] === fecha;
                        }
                    } else {
                        visible = false;
                    }
                }

                fila.style.display = visible ? '' : 'none';
                if (visible) total++;
            });

            // Update the total count to reflect only the filtered rows
            document.getElementById('totalCitas').innerText = total;
        }

        function moverArriba(e, btn) {
            e.stopPropagation();
            const fila = btn.closest("tr");
            const anterior = fila.previousElementSibling;
            if (anterior) {
                fila.parentNode.insertBefore(fila, anterior);
            }
        }

        function moverAbajo(e, btn) {
            e.stopPropagation();
            const fila = btn.closest("tr");
            const siguiente = fila.nextElementSibling;
            if (siguiente) {
                fila.parentNode.insertBefore(siguiente.nextSibling, fila);
            }
        }

        function actualizarHonorarios() {
            const tipoCitaSelect = document.getElementById('tipoCitaSelect');
            const honorariosInput = document.getElementById('honorariosInput');
            const selectedOption = tipoCitaSelect.options[tipoCitaSelect.selectedIndex];
            const honorarios = selectedOption.getAttribute('data-honorarios');
            honorariosInput.value = honorarios || '';
        }

        function marcarEntrada(event, citaId) {
            event.stopPropagation(); // Evita que el evento se propague al abrir el modal
            const entradaSwitch = document.getElementById(`entradaSwitch${citaId}`);
            entradaSwitch.classList.add('checked'); // Add class for styling
            const url = `/citas/${citaId}/marcar-entrada`;
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            });
        }

        function marcarSalida(event, citaId) {
            event.stopPropagation(); // Evita que el evento se propague al abrir el modal
            const salidaSwitch = document.getElementById(`salidaSwitch${citaId}`);
            salidaSwitch.classList.add('checked'); // Add class for styling
            const url = `/citas/${citaId}/marcar-salida`;
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            });
        }
        
        function eliminarCita() { // Fixed typo in function definition
            const citaId = document.getElementById('citaIdInput').value;
            const url = `/citas/${citaId}/cancelar`;
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: citaId }) // Added body to include the ID
            }).then(response => {
                if (response.ok) {
                    location.reload(); // Reload the page after successful deletion
                } else {
                    response.json().then(data => {
                        alert(data.message || 'Error al eliminar la cita.');
                    });
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('Error al eliminar la cita.');
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const tableBody = document.querySelector('#tablaCitas tbody');
            let draggedRow = null;

            tableBody.addEventListener('dragstart', (e) => {
                draggedRow = e.target;
                e.target.classList.add('dragging');
            });

            tableBody.addEventListener('dragend', (e) => {
                e.target.classList.remove('dragging');
                draggedRow = null;
            });

            tableBody.addEventListener('dragover', (e) => {
                e.preventDefault();
                const targetRow = e.target.closest('tr');
                if (targetRow && targetRow !== draggedRow) {
                    const bounding = targetRow.getBoundingClientRect();
                    const offset = e.clientY - bounding.top;
                    const midpoint = bounding.height / 2;

                    if (offset > midpoint) {
                        targetRow.after(draggedRow);
                    } else {
                        targetRow.before(draggedRow);
                    }
                }
            });

            tableBody.addEventListener('dragenter', (e) => {
                const targetRow = e.target.closest('tr');
                if (targetRow && targetRow !== draggedRow) {
                    targetRow.classList.add('drag-over');
                }
            });

            tableBody.addEventListener('dragleave', (e) => {
                const targetRow = e.target.closest('tr');
                if (targetRow) {
                    targetRow.classList.remove('drag-over');
                }
            });
        });

        function toggleEstado(event, citaId) {
            event.stopPropagation(); // Prevent modal opening
            const switchElement = document.getElementById(`estadoSwitch${citaId}`);
            const row = switchElement.closest('tr');
            const url = switchElement.checked 
                ? `/citas/${citaId}/marcar-entrada` 
                : `/citas/${citaId}/marcar-salida`;

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    // Change row background based on switch state
                    row.style.backgroundColor = switchElement.checked ? '#d4edda' : '';
                } else {
                    alert('Error al actualizar el estado de la cita.');
                    switchElement.checked = !switchElement.checked; // Revert switch state on error
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('Error al actualizar el estado de la cita.');
                switchElement.checked = !switchElement.checked; // Revert switch state on error
            });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const highlightCitaEnHora = () => {
                const now = new Date();
                const rows = document.querySelectorAll('#tablaCitas tbody tr');

                rows.forEach(row => {
                    const citaFecha = row.dataset.fecha ? new Date(row.dataset.fecha) : null;

                    if (citaFecha && citaFecha.toDateString() === now.toDateString() &&
                        citaFecha.getHours() === now.getHours() && citaFecha.getMinutes() === now.getMinutes()) {
                        row.style.backgroundColor = '#d4edda'; // Green background
                    } else {
                        row.style.backgroundColor = ''; // Reset background
                    }
                });
            };

            setInterval(highlightCitaEnHora, 60000); // Check every minute
            highlightCitaEnHora(); // Initial check
        });
    </script>
</body>

</html>