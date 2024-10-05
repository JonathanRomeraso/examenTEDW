<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se han contactado a travez de Homeland</title>
</head>
<body>
    <h1>Nuevo Mensaje de Contacto</h1>
    <p><strong>Nombre Completo:</strong> {{ $contactData['name'] }}</p>
    <p><strong>Email:</strong> {{ $contactData['email'] }}</p>
    <p><strong>Asunto:</strong> {{ $contactData['subject'] }}</p>
    <p><strong>Mensaje:</strong> {{ $contactData['message'] }}</p>
</body>
</html>
