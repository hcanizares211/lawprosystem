/**
 * Sistema centralizado de mensajes para la aplicación
 * Usa toastr si está disponible, de lo contrario usa alert()
 */

window.showMessage = {
    error: function(message, title) {
        title = title || 'Error';
        if (typeof toastr !== 'undefined') {
            toastr.error(message, title);
        } else if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: 'error',
                title: title,
                text: message
            });
        } else {
            alert(title + ': ' + message);
        }
    },
    
    success: function(message, title) {
        title = title || 'Éxito';
        if (typeof toastr !== 'undefined') {
            toastr.success(message, title);
        } else if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: 'success',
                title: title,
                text: message
            });
        } else {
            alert(title + ': ' + message);
        }
    },
    
    warning: function(message, title) {
        title = title || 'Advertencia';
        if (typeof toastr !== 'undefined') {
            toastr.warning(message, title);
        } else if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: 'warning',
                title: title,
                text: message
            });
        } else {
            alert(title + ': ' + message);
        }
    },
    
    info: function(message, title) {
        title = title || 'Información';
        if (typeof toastr !== 'undefined') {
            toastr.info(message, title);
        } else if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: 'info',
                title: title,
                text: message
            });
        } else {
            alert(title + ': ' + message);
        }
    }
};
