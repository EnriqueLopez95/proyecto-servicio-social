<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bienvenido/a al Sistema</title>
</head>
<body>
    <h1>Bienvenido/a, {{ $coordinador->nombre_coordinador }} {{ $coordinador->apellido_coordinador }}</h1>
    <p>Datos de su cuenta como coordinador en el sistema. A continuación, encontrará sus credenciales de acceso:</p>
    <ul>
        <li><strong>Correo:</strong> {{ $coordinador->correo_coordinador }}</li>
        <li><strong>Contraseña:</strong> {{ $password }}</li>
    </ul>
    <p>Por favor, inicie sesión y cambie su contraseña lo antes posible.</p>
    <p>Gracias,<br>Equipo del Sistema de Gestión Social</p>
</body>
</html>