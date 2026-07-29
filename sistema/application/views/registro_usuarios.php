<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
<style>

*{
    box-sizing:border-box;
}


body{

    margin:0;

    min-height:100vh;

    font-family:'Segoe UI',Arial,sans-serif;

    background:#111827;

    display:flex;

    justify-content:center;

    align-items:center;

}



/* CONTENEDOR PRINCIPAL */

.form-container{

    width:950px;

    min-height:620px;

    display:flex;

    background:#1e293b;

    border-radius:25px;

    overflow:hidden;

    box-shadow:

    0 25px 70px rgba(0,0,0,.5);

    animation:entrada .8s ease;

}



/* PANEL IZQUIERDO */

.form-container:before{

    content:"";

    width:45%;

    background:

    linear-gradient(160deg,#14b8a6,#0ea5e9);

    display:flex;

    justify-content:center;

    align-items:center;

    color:white;

    font-size:120px;

    font-family:"Font Awesome 6 Free";

    font-weight:900;

    content:"\f234";

    position:relative;

}



/* decoración panel */

.form-container:after{

    content:"Crear usuarios\nGestión rápida y segura";

    white-space:pre-line;

    position:absolute;

    margin-left:-520px;

    margin-top:-250px;

    color:white;

    text-align:center;

    font-size:25px;

    font-weight:700;

    width:350px;

    line-height:1.5;

}



/* FORMULARIO */

form{

    width:55%;

    padding:55px;

}



/* TITULO */

h2{

    color:white;

    text-align:center;

    font-size:38px;

    font-weight:800;

    margin:0;

    letter-spacing:1px;

}



h2:after{

    content:"Regístrate para comenzar";

    display:block;

    font-size:14px;

    font-weight:400;

    color:#94a3b8;

    margin-top:10px;

}



/* MENSAJES */

.error{

    background:#fee2e2;

    color:#b91c1c;

    padding:12px;

    border-radius:12px;

    margin-top:20px;

}



.exito{

    background:#dcfce7;

    color:#166534;

    padding:12px;

    border-radius:12px;

    margin-top:20px;

}



/* LABELS */

label{

    display:block;

    color:#cbd5e1;

    font-size:12px;

    font-weight:700;

    letter-spacing:1px;

    margin-top:22px;

    text-transform:uppercase;

}



/* CAMPOS */

input,
select{


    width:100%;

    margin-top:8px;

    padding:13px 5px;

    background:transparent;

    border:none;

    border-bottom:2px solid #475569;

    color:white;

    font-size:15px;

    outline:none;

    transition:.4s;

}



select option{

    color:#111;

}



input:focus,
select:focus{

    border-color:#14b8a6;

    transform:translateY(-3px);

}



/* ICONOS EN LABEL */

label:before{

    font-family:"Font Awesome 6 Free";

    font-weight:900;

    margin-right:8px;

    color:#14b8a6;

}



label[for="curp"]:before{
    content:"\f2c1";
}


label[for="nombre"]:before{
    content:"\f007";
}


label[for="sexo"]:before{
    content:"\f228";
}


label[for="telefono"]:before{
    content:"\f095";
}


label[for="email"]:before{
    content:"\f0e0";
}


label[for="password"]:before{
    content:"\f023";
}




/* BOTÓN */

button{

    width:100%;

    margin-top:40px;

    padding:15px;

    border:none;

    border-radius:40px;

    background:

    linear-gradient(90deg,#14b8a6,#0ea5e9);

    color:white;

    font-size:17px;

    font-weight:700;

    cursor:pointer;

    transition:.4s;

    box-shadow:

    0 15px 30px rgba(14,165,233,.3);

}



button:hover{

    transform:translateY(-5px);

    box-shadow:

    0 20px 40px rgba(14,165,233,.5);

}



button:before{

    content:"\f234";

    font-family:"Font Awesome 6 Free";

    font-weight:900;

    margin-right:10px;

}



/* ANIMACION */

@keyframes entrada{

    from{

        opacity:0;

        transform:translateY(40px);

    }


    to{

        opacity:1;

        transform:translateY(0);

    }

}




@media(max-width:900px){

    .form-container{

        width:95%;

    }


    .form-container:before,
    .form-container:after{

        display:none;

    }


    form{

        width:100%;

    }

}


</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    

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

    <!-- CORRECCIÓN: El action nos ayuda ahora a apuntar al controlador real de "usuarios" -->
   <form action="<?php echo base_url('index.php/usuarios/guardar'); ?>" method="POST">

    <label for="curp">CURP:</label>
    <input type="text"
           name="us_curp"
           value="<?php echo set_value('us_curp'); ?>"
           pattern="^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[A-Z0-9][0-9]$"
           maxlength="18"
           required>

    <label for="nombre">Nombre Completo:</label>
    <input type="text"
           name="us_name"
           value="<?php echo set_value('us_name'); ?>"
           pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$"
           required>

    <label for="sexo">Sexo:</label>
    <select name="us_sexo" required>
        <option value="">Seleccione</option>
        <option value="H">Hombre</option>
        <option value="M">Mujer</option>
    </select>

    <label for="telefono">Teléfono:</label>
    <input type="text"
           name="us_telefono"
           value="<?php echo set_value('us_telefono'); ?>"
           pattern="^[0-9]{10}$"
           maxlength="10"
           required>

    <label for="email">Correo Electrónico:</label>
    <input type="email"
           name="us_email"
           value="<?php echo set_value('us_email'); ?>"
           required>

    <label for="password">Contraseña:</label>
    <input type="password"
           name="us_password"
           minlength="8"
           required>

    <button type="submit">Registrarme</button>

</form>
</div>

</body>
</html>
