INSERT INTO citas (
    id_doctores, 
    fechacita, 
    id_pacientes, 
    id_aseguradoras, 
    seguro, 
    id_tipos_citas, 
    hora_reserva, 
    hora_entrada, 
    hora_salida, 
    honorarios, 
    estado, 
    created_at, 
    updated_at
) VALUES (
    1, -- Cambia esto al ID de un doctor existente
    CONCAT(CURDATE(), ' 11:00:00'), -- Fecha y hora de la cita
    3, -- Cambia esto al ID de un paciente existente
    3, -- Cambia esto al ID de una aseguradora existente
    1, -- Seguro (1 = Sí, 0 = No)
    3, -- Cambia esto al ID de un tipo de cita existente
    '10:30:00', -- Hora de reserva
    NULL, -- Hora de entrada
    NULL, -- Hora de salida
    75.00, -- Honorarios
    'pendiente', -- Estado de la cita
    NOW(), -- Fecha de creación
    NOW() -- Fecha de actualización
);
