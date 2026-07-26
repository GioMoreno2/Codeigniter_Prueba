<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f4; }
        .form-container { background: white; padding: 20px; border-radius: 8px; max-width: 400px; margin: 0 auto; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        .error { color: red; font-size: 14px; margin-bottom: 10px; }
        .exito { color: green; font-size: 16px; margin-bottom: 15px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin: 8px 0 15px 0; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 10px; border: none; width: 100%; cursor: pointer; border-radius: 4px; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Crear Cuenta</h2>

    <!-- Mostrar mensaje de éxito si existe -->
    <?php if($this->session->flashdata('exito')): ?>
        <div class="exito"><?php echo $this->session->flashdata('exito'); ?></div>
    <?php endif; ?>

    <!-- Mostrar errores de validación de CodeIgniter -->
    <?php if(validation_errors()): ?>
        <div class="error"><?php echo validation_errors(); ?></div>
    <?php endif; ?>

    <!-- ✅ CORRECCIÓN: El action ahora apunta al controlador real "usuarios" -->
    <form action="<?php echo base_url('index.php/usuarios'); ?>" method="POST">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" name="us_name" value="<?php echo set_value('us_name'); ?>" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="us_email" value="<?php echo set_value('us_email'); ?>" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="us_password" required>

        <button type="submit">Registrarme</button>
    </form>
</div>

</body>
</html>
