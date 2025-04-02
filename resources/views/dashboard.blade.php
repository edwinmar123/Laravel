<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
<div class="container mt-5">
    <h2>Bienvenido, {{ $usuario->nombres }}</h2>
    <p>Saldo actual: ${{ number_format($usuario->saldo_inicial, 2) }}</p>
    <form action="/retirar" method="POST">
        @csrf
        <div class="mb-3">
            <label for="monto" class="form-label">Monto a Retirar</label>
            <input type="number" class="form-control" id="monto" name="monto" required>
        </div>
        <button type="submit" class="btn btn-primary">Retirar</button>
    </form>
    <form action="/logout" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
    </form>
</div>
</body>
</html>