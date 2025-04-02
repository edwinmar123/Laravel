<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro</title>
</head>
<body>
<div class="container mt-5">
    <h2>Registro de Usuario</h2>
    <form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="documento" class="form-label">Documento</label>
        <input type="text" class="form-control" id="documento" name="documento" required>
    </div>
    <div class="mb-3">
        <label for="nombres" class="form-label">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombres" required>
    </div>
    <div class="mb-3">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
    </div>
    <div class="mb-3">
        <label for="saldo_inicial" class="form-label">Saldo Inicial</label>
        <input type="number" class="form-control" id="saldo_inicial" name="saldo_inicial" required>
    </div>
    <div class="mb-3">
        <label for="ciudad_nacimiento" class="form-label">Ciudad de Nacimiento</label>
        <input type="text" class="form-control" id="ciudad_nacimiento" name="ciudad_nacimiento" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
    <a href="{{ route('login') }}" class="btn btn-secondary">Regresar al Login</a>
</form>
</div>
</body>
</html>