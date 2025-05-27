<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
        <h2 style="color: #005555;">¡Bienvenido, {{ $nombre }}!</h2>
        <p>Te hemos registrado en nuestro sistema. A continuación, encontrarás tus credenciales de acceso:</p>
        <ul>
            <li><strong>Correo:</strong> {{ $correo }}</li>
            <li><strong>Contraseña provisional:</strong> {{ $password }}</li>
        </ul>
        <p>Por favor, inicia sesión y cambia tu contraseña lo antes posible.</p>
        <p>Si tienes alguna pregunta, contáctanos en <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>.</p>
        <p>Saludos,<br>Equipo de {{ config('mail.from.name') }}</p>
    </div>
</body>
</html>