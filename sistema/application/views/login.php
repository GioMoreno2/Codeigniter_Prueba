<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Iniciar Sesión</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{

    box-sizing:border-box;

}

body{

    margin:0;

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    font-family:'Segoe UI',sans-serif;

    background:linear-gradient(135deg,#0f4c81,#2d89ef);

}

.login{

    width:420px;

    background:white;

    padding:40px;

    border-radius:20px;

    box-shadow:0 20px 50px rgba(0,0,0,.25);

}

h2{

    text-align:center;

    color:#0f4c81;

    margin-bottom:30px;

}

.campo{

    margin-bottom:20px;

}

label{

    font-weight:bold;

    color:#555;

}

input{

    width:100%;

    padding:14px;

    border:1px solid #ccc;

    border-radius:12px;

    margin-top:8px;

    font-size:15px;

}

input:focus{

    outline:none;

    border-color:#2d89ef;

    box-shadow:0 0 10px rgba(45,137,239,.3);

}

button{

    width:100%;

    padding:15px;

    border:none;

    border-radius:30px;

    background:linear-gradient(135deg,#0f4c81,#2d89ef);

    color:white;

    font-size:16px;

    cursor:pointer;

    transition:.3s;

}

button:hover{

    transform:translateY(-3px);

}

.error{

    background:#ffe5e5;

    color:#c62828;

    padding:12px;

    border-radius:10px;

    margin-bottom:20px;

    text-align:center;

}

</style>

</head>

<body>

<div class="login">

<h2>

<i class="fa-solid fa-user-lock"></i>

Iniciar Sesión

</h2>

<?php if($this->session->flashdata('error')){ ?>

<div class="error">

<?= $this->session->flashdata('error'); ?>

</div>

<?php } ?>

<form action="<?= base_url('index.php/login/autenticar'); ?>" method="POST">

<div class="campo">

<label>Correo electrónico</label>

<input
type="email"
name="correo"
required>

</div>

<div class="campo">

<label>Contraseña</label>

<input
type="password"
name="password"
required>

</div>

<button type="submit">

<i class="fa-solid fa-right-to-bracket"></i>

Ingresar

</button>

</form>

</div>

</body>

</html>