<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Editar Usuario</title>

<style>

*{
    box-sizing:border-box;
}


body{

    margin:0;

    min-height:100vh;

    font-family:'Segoe UI',Arial,sans-serif;

    background:

    linear-gradient(135deg,#001f3f,#004481,#00a9e0);

    display:flex;

    justify-content:center;

    align-items:center;

    padding:30px;

}



/* TARJETA PRINCIPAL */

.form-container{

    width:100%;

    max-width:550px;

    background:#ffffff;

    padding:45px;

    border-radius:20px;

    box-shadow:

    0 25px 60px rgba(0,0,0,.25);

    animation:entrada .7s ease;

    position:relative;

    overflow:hidden;

}



/* Línea corporativa superior */

.form-container:before{

    content:"";

    position:absolute;

    top:0;

    left:0;

    width:100%;

    height:6px;

    background:

    linear-gradient(90deg,#004481,#00a9e0);

}



/* Decoraciones */

.form-container:after{

    content:"";

    position:absolute;

    width:220px;

    height:220px;

    background:#00a9e0;

    border-radius:50%;

    right:-120px;

    bottom:-120px;

    opacity:.08;

}




/* TITULO */

h2{

    text-align:center;

    color:#003b66;

    font-size:32px;

    font-weight:800;

    margin-bottom:35px;

    letter-spacing:.5px;

}



h2:before{

    content:"\f2bd";

    font-family:"Font Awesome 6 Free";

    font-weight:900;

    display:block;

    font-size:45px;

    color:#004481;

    margin-bottom:12px;

}



h2:after{

    content:"Actualización de información del usuario";

    display:block;

    font-size:14px;

    color:#6c757d;

    font-weight:400;

    margin-top:10px;

}



/* LABELS */

label{

    display:flex;

    align-items:center;

    gap:10px;

    color:#34495e;

    font-size:13px;

    font-weight:700;

    margin-bottom:8px;

    text-transform:uppercase;

    letter-spacing:.8px;

}



label:before{

    font-family:"Font Awesome 6 Free";

    font-weight:900;

    color:#004481;

}



/* Iconos */

label:nth-of-type(1):before{

    content:"\f2c1";

}


label:nth-of-type(2):before{

    content:"\f007";

}


label:nth-of-type(3):before{

    content:"\f228";

}


label:nth-of-type(4):before{

    content:"\f095";

}


label:nth-of-type(5):before{

    content:"\f0e0";

}



/* CAMPOS */

input,
select{

    width:100%;

    padding:15px 18px;

    margin-bottom:22px;

    border-radius:12px;

    border:1px solid #d8e1ea;

    background:#f8fafc;

    color:#333;

    font-size:15px;

    outline:none;

    transition:.35s;

}



input:hover,
select:hover{

    border-color:#00a9e0;

}



input:focus,
select:focus{

    background:white;

    border-color:#004481;

    box-shadow:

    0 0 0 4px rgba(0,68,129,.12);

    transform:translateY(-2px);

}



/* BOTÓN */

button{

    display:block;

    width:75%;

    margin:25px auto 0;

    padding:15px;

    border:none;

    border-radius:30px;

    background:

    linear-gradient(90deg,#004481,#00a9e0);

    color:white;

    font-size:16px;

    font-weight:700;

    cursor:pointer;

    transition:.35s;

    box-shadow:

    0 10px 25px rgba(0,68,129,.3);

}



button:before{

    content:"\f0c7";

    font-family:"Font Awesome 6 Free";

    font-weight:900;

    margin-right:10px;

}



button:hover{

    transform:translateY(-4px);

    box-shadow:

    0 15px 35px rgba(0,68,129,.45);

}



button:active{

    transform:scale(.96);

}



/* Animaciones */

label,
input,
select{

    animation:mostrar .6s ease forwards;

    opacity:0;

}



label{

    animation-delay:.15s;

}



input,
select{

    animation-delay:.25s;

}



@keyframes mostrar{

    from{

        opacity:0;

        transform:translateX(-25px);

    }


    to{

        opacity:1;

        transform:translateX(0);

    }

}



@keyframes entrada{

    from{

        opacity:0;

        transform:translateY(40px) scale(.95);

    }


    to{

        opacity:1;

        transform:translateY(0) scale(1);

    }

}



/* Responsive */

@media(max-width:600px){

    body{

        padding:15px;

    }


    .form-container{

        padding:30px 25px;

    }


    button{

        width:100%;

    }

}


</style>

</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<body>


<div class="form-container">


<h2>Editar Usuario</h2>


<form action="<?=base_url('index.php/usuarios/actualizar/'.$usuario->id);?>" method="POST">


<label>CURP</label>

<input 
type="text"
name="us_curp"
value="<?=$usuario->us_curp;?>"
required>



<label>Nombre</label>

<input 
type="text"
name="us_name"
value="<?=$usuario->us_name;?>"
required>



<label>Sexo</label>

<select name="us_sexo">

<option value="H"
<?=($usuario->us_sexo=="H")?'selected':'';?>>
Hombre
</option>


<option value="M"
<?=($usuario->us_sexo=="M")?'selected':'';?>>
Mujer
</option>


</select>



<label>Teléfono</label>

<input
type="text"
name="us_telefono"
value="<?=$usuario->us_telefono;?>"
>



<label>Correo</label>

<input
type="email"
name="us_email"
value="<?=$usuario->us_email;?>"
>



<button type="submit">

Actualizar Usuario

</button>


</form>


</div>


</body>

</html>