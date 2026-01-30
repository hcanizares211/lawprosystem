<?php

return [




    'case_status_validation' => [
        'case_status' => [
            'required' => 'El nombre del estado del caso es obligatorio.',
            'remote'   => 'Este estado de caso ya existe.',
        ],
    ],










    'tax_validation' => [
        'name' => [
            'required' => 'El nombre del impuesto es obligatorio.',
        ],
        'per' => [
            'required' => 'La tasa de impuesto es obligatoria.',
            'remote'   => 'Esta combinación de nombre de impuesto y tasa ya existe.',
        ],
    ],



    'profile_page_validations' => [
        'f_name' => 'Por favor ingrese su nombre.',
        'l_name' => 'Por favor ingrese su apellido.',
        'mobile' => [
            'required' => 'Por favor ingrese su número de móvil.',
            'minlength' => 'El número de móvil debe tener exactamente 10 dígitos.',
            'maxlength' => 'El número de móvil debe tener exactamente 10 dígitos.',
            'number' => 'Por favor ingrese un número de móvil válido de 10 dígitos (0-9).'
        ],
        'address' => 'Por favor ingrese su dirección.',
        'zip_code' => [
            'required' => 'Por favor ingrese su código postal.',
            'minlength' => 'El código postal debe tener exactamente 6 dígitos.',
            'maxlength' => 'El código postal debe tener exactamente 6 dígitos.',
            'number' => 'Por favor ingrese un código postal válido de 6 dígitos (0-9).'
        ],
        'country' => 'Por favor seleccione su país.',
        'registration_no' => 'Por favor ingrese el número de registro.',
        'associated_name' => 'Por favor ingrese el nombre asociado.',
        'state' => 'Por favor seleccione su estado.',
        'city_id' => 'Por favor seleccione su ciudad.',
        'email' => [
            'required' => 'Por favor ingrese su dirección de correo electrónico.',
            'email' => 'Por favor ingrese una dirección de correo electrónico válida.',
            'remote' => 'Esta dirección de correo electrónico ya está registrada.'
        ]
    ],



    'change_password' => [
        'validation_old_required'       => 'Por favor ingrese la contraseña actual.',
        'validation_new_required'       => 'Por favor ingrese una nueva contraseña.',
        'validation_new_pwcheck'        => 'La contraseña debe tener al menos 8 caracteres e incluir mayúscula, minúscula, número y carácter especial (#?!@$%^&*-).',
        'validation_new_minlength'      => 'La nueva contraseña debe tener al menos 8 caracteres.',
        'validation_confirm_required'   => 'Por favor confirme la nueva contraseña.',
        'validation_confirm_minlength'  => 'La contraseña de confirmación debe tener al menos 8 caracteres.',
        'validation_confirm_equalTo'    => 'La contraseña de confirmación no coincide con la nueva contraseña.',
    ],


    'task' => [
        'subject'              => 'Por favor ingrese el asunto de la tarea.',
        'start_date'           => 'Por favor seleccione la fecha de inicio.',
        'end_date'             => 'Por favor seleccione la fecha de finalización.',
        'project_status_id'    => 'Por favor seleccione el estado.',
        'priority'             => 'Por favor seleccione la prioridad.',
        'assigned_to_required' => 'Por favor seleccione al menos un usuario.',

        'ph_search_customer'  => 'Buscar cliente',
        'ph_select_status'    => 'Seleccionar estado',
        'ph_select_priority'  => 'Seleccionar prioridad',
        'ph_select_users'     => 'Seleccionar usuarios',
        'ph_nothing_selected' => 'Nada seleccionado',
    ],


    'party_advocate1'      => 'Por favor ingrese el nombre del abogado.',



    'case' => [
        'validation' => [
            'client_name'       => 'Por favor seleccione un nombre de cliente.',
            'party_name'        => 'Por favor ingrese el nombre de la parte.',
            'party_advocate'    => 'Por favor ingrese el nombre del abogado de la parte.',
            'case_no'           => 'Por favor ingrese el número del caso.',
            'case_type'         => 'Por favor seleccione un tipo de caso.',
            'case_status'       => 'Por favor seleccione la etapa del caso.',
            'act'               => 'Por favor ingrese la ley.',
            'court_type'        => 'Por favor seleccione un tipo de tribunal.',
            'next_date'         => 'Por favor seleccione la fecha de la primera audiencia.',
            'court_no'          => 'Por favor ingrese el número del tribunal.',
            'court_name'        => 'Por favor seleccione un tribunal.',
            'judge_type'        => 'Por favor seleccione un juez.',
            'filing_number'     => 'Por favor ingrese el número de presentación.',
            'filing_date'       => 'Por favor seleccione la fecha de presentación.',
            'registration_number' => 'Por favor ingrese el número de registro.',
            'registration_date' => 'Por favor seleccione la fecha de registro.',
        ],
        'placeholders' => [
            'select_users'           => 'Seleccionar usuarios',
            'select_case_type'       => 'Seleccionar tipo de caso',
            'select_case_sub_type'   => 'Seleccionar subtipo de caso',
            'select_stage_of_case'   => 'Seleccionar etapa del caso',
            'select_court_type'      => 'Seleccionar tipo de tribunal',
            'select_court'           => 'Seleccionar tribunal',
            'select_judge_type'      => 'Seleccionar nombre del juez',
            'select_client_name'     => 'Seleccionar nombre del cliente',
        ],
        'labels' => [
            'petitioner_name'     => 'Nombre del demandante',
            'petitioner_advocate' => 'Abogado del demandante',
            'respondent_name'     => 'Nombre del demandado',
            'respondent_advocate' => 'Abogado del demandado',
        ],
        'confirm' => [
            'delete_element' => '¿Está seguro de que desea eliminar este elemento?',
        ],
        'misc' => [
            'loading' => 'Cargando...',
        ]
    ],




    'service' => [
        'name' => [
            'required' => 'El nombre es obligatorio',
            'remote' => 'El nombre ya existe.',
        ],
        'amount' => [
            'required' => 'El monto es obligatorio',
            'digits' => 'Solo se permiten dígitos.',
            'number' => 'El monto debe ser un número.',
        ],
    ],

    'member' => [
        'username' => [
            'required' => 'Por favor ingrese el nombre de usuario.',
            'remote' => 'El nombre de usuario ya existe.',
        ],
        'f_name' => 'Por favor ingrese el nombre.',
        'l_name' => 'Por favor ingrese el apellido.',
        'email' => [
            'required' => 'Por favor ingrese el correo electrónico.',
            'email' => 'Por favor ingrese un correo electrónico válido.',
            'remote' => 'El correo electrónico ya existe.',
        ],
        'mobile' => [
            'required' => 'Por favor ingrese el móvil.',
            'minlength' => 'El móvil debe tener 10 dígitos.',
            'maxlength' => 'El móvil debe tener 10 dígitos.',
            'number' => 'Por favor ingrese dígitos del 0-9.',
        ],
        'address' => 'Por favor ingrese la dirección.',
        'zip_code' => [
            'required' => 'Por favor ingrese el código postal.',
            'minlength' => 'El código postal debe tener 6 dígitos.',
            'maxlength' => 'El código postal debe tener 6 dígitos.',
            'number' => 'Por favor ingrese dígitos del 0-9.',
        ],
        'password' => [
            'required' => 'Por favor ingrese la contraseña.',
            'pwcheck' => 'La contraseña debe tener mínimo 8 caracteres y contener al menos 1 minúscula, 1 mayúscula, 1 numérico y 1 carácter especial.',
            'minlength' => 'Por favor ingrese al menos 8 caracteres.',
        ],
        'cnm_password' => [
            'required' => 'Por favor ingrese la confirmación de contraseña.',
            'equalTo' => 'Por favor ingrese la misma contraseña.',
        ],
        'country' => 'Por favor seleccione el país.',
        'state' => 'Por favor seleccione el estado.',
        'city_id' => 'Por favor seleccione la ciudad.',
        'role' => 'Por favor seleccione el rol.',
        'select_role_placeholder' => 'Seleccionar rol',
        'file_size_error' => 'El tamaño del archivo no debe ser mayor a 5MB',
        'file_type_error' => 'Aceptar solo imágenes .jpg .png',
    ],

    'appointment' => [
        'mobile' => [
            'required' => 'Por favor ingrese el móvil.',
            'minlength' => 'El móvil debe tener 10 dígitos.',
            'maxlength' => 'El móvil debe tener 10 dígitos.',
            'number' => 'Por favor ingrese dígitos del 0-9.',
        ],
        'date' => 'Por favor seleccione la fecha.',
        'time' => 'Por favor ingrese la hora.',
        'new_client' => 'Por favor ingrese el nombre del cliente.',
        'exists_client' => 'Por favor seleccione el nombre del cliente.',
    ],

    'client' => [
        'f_name' => 'Por favor ingrese el nombre.',
        'm_name' => 'Por favor ingrese el segundo nombre.',
        'l_name' => 'Por favor ingrese el apellido.',
        'address' => 'Por favor ingrese la dirección.',
        'country' => 'Por favor seleccione el país.',
        'state' => 'Por favor seleccione el estado.',
        'city_id' => 'Por favor seleccione la ciudad.',

        'email' => [
            'required' => 'Por favor ingrese el correo electrónico.',
            'email' => 'Por favor ingrese un correo electrónico válido.',
        ],

        'mobile' => [
            'required' => 'Por favor ingrese el móvil.',
            'minlength' => 'El móvil debe tener 10 dígitos.',
            'maxlength' => 'El móvil debe tener 10 dígitos.',
            'number' => 'por favor ingrese dígitos del 0-9.',
        ],

        'alternate_no' => [
            'required' => 'Por favor ingrese el número alternativo.',
            'minlength' => 'El móvil debe tener 10 dígitos.',
            'maxlength' => 'El móvil debe tener 10 dígitos.',
            'number' => 'por favor ingrese dígitos del 0-9.',
        ],

        'reference_mobile' => [
            'required' => 'Por favor ingrese el móvil de referencia.',
            'minlength' => 'El móvil debe tener 10 dígitos.',
            'maxlength' => 'El móvil debe tener 10 dígitos.',
            'number' => 'Por favor ingrese dígitos del 0-9.',
        ],

        'are_you_sure_you_want_delete' => '¿Está seguro de que desea eliminar este elemento?'



    ],

    'task' => [
        'subject' => 'Por favor ingrese el asunto.',
        'start_date' => 'Por favor ingrese la fecha de inicio.',
        'end_date' => 'Por favor ingrese la fecha límite.',
        'project_status_id' => 'Por favor seleccione el estado.',
        'priority' => 'Por favor seleccione la prioridad.',
        'assigned_to_required' => 'Por favor seleccione el nombre del empleado.',
    ],



    'common_js' => [
        'success_title' => 'Éxito',
        'error_title' => 'Error',

        'generic_error' => 'Algo salió mal, por favor intente nuevamente!',
        'confirm_title' => '¿Está seguro?',
        'confirm_text' => "¡No podrá revertir esto!",
        'confirm_button' => 'Sí, eliminarlo!',
        'cancel_button' => 'No, cancelar!',
        'validation_phone' => 'Por favor ingrese un número de teléfono válido.',
        'validation_filesize' => 'El tamaño del archivo debe ser menor a 5mb.',
        'validation_required' => 'Este campo es obligatorio.',
        'loading' => 'Cargando...',


        'dt_empty_table' => 'No hay datos disponibles en la tabla',
        'dt_info' => 'Mostrando _START_ a _END_ de _TOTAL_ entradas',
        'dt_info_empty' => 'Mostrando 0 a 0 de 0 entradas',
        'dt_info_filtered' => '(filtrado de _MAX_ entradas totales)',
        'dt_length_menu' => 'Mostrar _MENU_ entradas',
        'dt_loading_records' => 'Cargando...',
        'dt_processing' => 'Procesando...',
        'dt_search' => 'Buscar:',
        'dt_zero_records' => 'No se encontraron registros coincidentes',
        'dt_first' => 'Primero',
        'dt_next' => 'Siguiente',
        'dt_previous' => 'Anterior',
        'dt_last' => 'Último',
        'dt_sort_ascending' => ': activar para ordenar la columna de forma ascendente',
        'dt_sort_descending' => ': activar para ordenar la columna de forma descendente',



    ],



    'tax_updated_successfully' => 'Impuesto actualizado exitosamente',
    'tax_added_successfully' => 'Impuesto agregado exitosamente',
    'tax_status_changed_successfully' => 'Estado del impuesto cambiado exitosamente',
    'tax_deleted_successfully' => 'Impuesto eliminado exitosamente',
    'you_cant_delete_tax_because' => 'No puede eliminar el impuesto porque está en uso en otro módulo',
    'save_successfully' => 'Guardado exitosamente',
    'appointment_added_successfully' => 'Cita agregada exitosamente',
    'appointment_updated_successfully' => 'Cita actualizada exitosamente',
    'success_title' => 'Éxito',

    'case_added_successfully' => 'Caso agregado exitosamente',
    'case_updated_successfully' => 'Caso actualizado exitosamente',
    'case_status_added_successfully' => 'Estado del caso agregado exitosamente',
    'case_status_updated_successfully' => 'Estado del caso actualizado exitosamente',
    'case_status_changed_successfully' => 'Estado del caso cambiado exitosamente',
    'case_status_deleted_successfully' => 'Estado del caso eliminado exitosamente',
    'cannot_delete_case_status_used' => 'No puede eliminar el estado del caso porque está en uso en otro módulo',
    'case_type_added_successfully' => 'Tipo de caso agregado exitosamente',
    'case_type_edited_successfully' => 'Tipo de caso editado exitosamente',
    'case_type_status_changed_successfully' => 'Estado del tipo de caso cambiado exitosamente',
    'case_type_deleted_successfully' => 'Tipo de caso eliminado exitosamente',
    'cannot_delete_case_type_used' => 'No puede eliminar el tipo de caso porque está en uso en otro módulo',
    'client_added_successfully' => 'Cliente agregado exitosamente',
    'client_updated_successfully' => 'Cliente actualizado exitosamente',
    'client_deleted_successfully' => 'Cliente eliminado exitosamente',
    'team_member_created_successfully' => 'Miembro del equipo creado exitosamente',
    'account_setup_successfully' => 'Cuenta configurada exitosamente',
    'team_member_updated_successfully' => 'Miembro del equipo actualizado exitosamente',
    'cannot_delete_team_member_used' => 'No puede eliminar este miembro del equipo porque está en uso en otros módulos',
    'team_member_deleted_successfully' => 'Miembro del equipo eliminado exitosamente',
    'court_added_successfully' => 'Tribunal agregado exitosamente',
    'court_updated_successfully' => 'Tribunal actualizado exitosamente',
    'court_status_changed_successfully' => 'Estado del tribunal cambiado exitosamente',
    'court_deleted_successfully' => 'Tribunal eliminado exitosamente',
    'cannot_delete_court_used' => 'No puede eliminar el tribunal porque está en uso en otro módulo',
    'backup_restored_successfully' => 'Copia de seguridad restaurada exitosamente',
    'expense_added_successfully' => 'Gasto agregado exitosamente',
    'expense_updated_successfully' => 'Gasto actualizado exitosamente',
    'expense_deleted_successfully' => 'Gasto eliminado exitosamente',
    'expense_type_added_successfully' => 'Tipo de gasto agregado exitosamente',
    'expense_type_updated_successfully' => 'Tipo de gasto actualizado exitosamente',
    'expense_type_status_changed_successfully' => 'Estado del tipo de gasto cambiado exitosamente',
    'expense_type_deleted_successfully' => 'Tipo de gasto eliminado exitosamente',
    'database_backup_saved_successfully' => 'Copia de seguridad de base de datos guardada exitosamente',
    'saved_successfully' => 'Guardado exitosamente',
    'invoice_sent_successfully' => 'Factura enviada exitosamente por correo electrónico',
    'smtp_not_set_error' => 'Por favor primero configure los detalles SMTP en la configuración',
    'invoice_generated_successfully' => 'Factura generada exitosamente',
    'invoice_updated_successfully' => 'Factura actualizada exitosamente',
    'invoice_deleted_successfully' => 'Factura eliminada exitosamente',
    'settings_saved_successfully' => 'Configuración guardada exitosamente',
    'judge_added_successfully' => 'Juez agregado exitosamente',
    'judge_updated_successfully' => 'Juez actualizado exitosamente',
    'judge_status_changed_successfully' => 'Estado del juez cambiado exitosamente',
    'judge_deleted_successfully' => 'Juez eliminado exitosamente',
    'cannot_delete_tax_used' => 'No puede eliminar el impuesto porque está en uso en otro módulo',
    'permissions_updated_successfully' => 'Permisos actualizados exitosamente',
    'password_changed_successfully' => 'Contraseña cambiada exitosamente',
    'unable_to_process_request_this_time' => 'No se puede procesar la solicitud en este momento. Intente más tarde',
    'current_password_do_not_match' => 'Su contraseña actual no coincide con nuestro registro',
    'profile_updated_successfully' => 'Perfil actualizado exitosamente',
    'role_created_successfully' => 'Rol creado exitosamente',
    'role_updated_successfully' => 'Rol actualizado exitosamente',
    'role_deleted_successfully' => 'Rol eliminado exitosamente',
    'service_created_successfully' => 'Servicio creado exitosamente',
    'service_updated_successfully' => 'Servicio actualizado exitosamente',
    'service_deleted_successfully' => 'Servicio eliminado exitosamente',
    'cannot_delete_service_used' => 'No puede eliminar el servicio porque está en uso en otro módulo',
    'service_status_changed_successfully' => 'Estado del servicio cambiado exitosamente',
    'task_created_successfully' => 'Tarea creada exitosamente',
    'task_updated_successfully' => 'Tarea actualizada exitosamente',
    'task_deleted_successfully' => 'Tarea eliminada exitosamente',
    'vendor_added_successfully' => 'Financiero agregado exitosamente',
    'vendor_updated_successfully' => 'Financiero actualizado exitosamente',
    'vendor_deleted_successfully' => 'Financiero eliminado exitosamente',

    'cannot_delete_role_has_permissions' => 'No se puede eliminar el rol con permisos asignados. Por favor elimine los permisos primero.',
    'cannot_delete_vendor_used' => 'No puede eliminar el financiero porque está en uso en otro módulo',
    'cannot_delete_client_used' => 'El cliente fue usado en otro módulo, por lo que no puede eliminarlo',
    'cannot_delete_case_type_used' => 'No puede eliminar el tipo de caso porque está en uso en otro módulo',
    'cannot_delete_court_type_used' => 'No puede eliminar el tipo de tribunal porque está en uso en otro módulo',
    'court_type_deleted_successfully' => 'Tipo de tribunal eliminado exitosamente',
    'court_type_status_changed_successfully' => 'Estado del tipo de tribunal cambiado exitosamente',
    'court_type_updated_successfully' => 'Tipo de tribunal actualizado exitosamente',
    'court_type_added_successfully' => 'Tipo de tribunal agregado exitosamente',

];
