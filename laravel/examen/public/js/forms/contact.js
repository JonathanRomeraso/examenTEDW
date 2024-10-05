

$(document).ready(function() {
    $('#contactForm').on('submit', function(event) {
        event.preventDefault();

        const formData = {
            fullname: $('#fullname').val(),
            email: $('#email').val(),
            subject: $('#subject').val(),
            message: $('#message').val(),
        };

        // Realiza la llamada AJAX
        $.ajax({
            type: 'POST',
            url: 'http://localhost:3005/api/properties/contact',
            contentType: 'application/json',
            data: JSON.stringify(formData), // Convierte el objeto a JSON

            success: function(response) {
                $('#responseMessage').text(response.message).show();
                $('#contactForm')[0].reset();
            },
            error: function(xhr, status, error) {
                $('#responseMessage').text('Error sending message: ' + error).show();
            }
        });
    });
});
