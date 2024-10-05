
$(document).ready(function() {
    $('#registrationForm').on('submit', function(event) {
        event.preventDefault();

        const formData = {
            username: $('#username').val(),
            email: $('#email').val(),
            password: $('#password').val(),
        };

        // Realiza la llamada AJAX
        $.ajax({
            type: 'POST',
            url: 'http://localhost:3005/api/properties/user',
            contentType: 'application/json', // Tipo de contenido
            data: JSON.stringify(formData), // Convierte el objeto a JSON

            success: function(response) {
                $('#responseMessage').text(response.message).show();
                $('#registrationForm')[0].reset();
            },
            error: function(xhr, status, error) {
                $('#responseMessage').text('Error al Regsitrar usuario: ' + error).show();
            }
        });
    });
});
