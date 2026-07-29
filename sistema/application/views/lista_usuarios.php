<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Usuarios Registrados</title>


<!-- DataTables -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">


<!-- Iconos -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



<style>


*{

    box-sizing:border-box;

}



body{

    font-family:'Segoe UI',Arial,sans-serif;

    margin:40px;

    background:

    linear-gradient(135deg,#eef2f7,#dfe9f3);

    color:#333;

}

/* ============================
   DASHBOARD ESTADISTICAS
============================ */


.dashboard-grafica{

    margin-top:50px;

    background:white;

    padding:35px;

    border-radius:25px;

    box-shadow:
    0 15px 35px rgba(0,0,0,.15);

    animation:entradaGrafica .8s ease;

}



.dashboard-grafica h2{

    font-size:25px;

    color:#1d3557;

    text-transform:none;

}



.dashboard-grafica h2 i{

    color:#28a745;

    margin-right:10px;

}




.cards-estadistica{

    display:grid;

    grid-template-columns:
    repeat(3,1fr);

    gap:25px;

    margin:30px 0;

}



.card-total,
.card-hombres,
.card-mujeres{

    padding:25px;

    border-radius:20px;

    display:flex;

    align-items:center;

    gap:20px;

    color:white;

    transition:.3s;

}



.card-total:hover,
.card-hombres:hover,
.card-mujeres:hover{

    transform:translateY(-8px);

}




.card-total{

    background:
    linear-gradient(135deg,#667eea,#764ba2);

}



.card-hombres{

    background:
    linear-gradient(135deg,#007bff,#00c6ff);

}



.card-mujeres{

    background:
    linear-gradient(135deg,#ff416c,#ff4b2b);

}



.card-total i,
.card-hombres i,
.card-mujeres i{

    font-size:40px;

}



.card-total span,
.card-hombres span,
.card-mujeres span{

    display:block;

    font-size:14px;

    opacity:.9;

}



.card-total strong,
.card-hombres strong,
.card-mujeres strong{

    font-size:35px;

}



.contenedor-chart{

    width:100%;

    max-width:450px;

    margin:auto;

}



#graficaUsuarios{

    max-height:350px;

}



@keyframes entradaGrafica{


from{

    opacity:0;

    transform:translateY(30px);

}


to{

    opacity:1;

    transform:translateY(0);

}


}



@media(max-width:768px){


.cards-estadistica{

    grid-template-columns:1fr;

}


}

/* =====================
   TITULO
===================== */


h2{

    text-align:center;

    color:#1d3557;

    font-size:32px;

    margin-bottom:30px;

    font-weight:800;

    text-transform:uppercase;

    letter-spacing:1px;

}



h2:before{

    content:"\f508";

    font-family:"Font Awesome 6 Free";

    font-weight:900;

    margin-right:12px;

    color:#28a745;

}






/* =====================
   BOTON SUPERIOR
===================== */


a{

    text-decoration:none;

}



.btn{

    display:inline-flex;

    align-items:center;

    gap:8px;

    background:

    linear-gradient(45deg,#28a745,#20c997);

    color:white;

    padding:12px 22px;

    border-radius:30px;

    font-weight:bold;

    box-shadow:

    0 5px 15px rgba(40,167,69,.3);

    transition:.3s;

}



.btn:before{

    content:"\f234";

    font-family:"Font Awesome 6 Free";

    font-weight:900;

}



.btn:hover{

    transform:translateY(-3px);

    box-shadow:

    0 10px 25px rgba(0,0,0,.2);

}





/* =====================
   TABLA
===================== */


#tablaUsuarios{

    background:white;

    border-radius:15px;

    overflow:hidden;

    box-shadow:

    0 10px 30px rgba(0,0,0,.15);

    border:none!important;

}



#tablaUsuarios thead{

    background:

    linear-gradient(45deg,#1d3557,#457b9d);

    color:white;

}



#tablaUsuarios thead th{

    padding:15px;

    font-size:14px;

    text-transform:uppercase;

}

/* =====================
   FILAS TABLA
===================== */


#tablaUsuarios tbody tr{

    transition:.3s;

}


#tablaUsuarios tbody tr:hover{

    background:#eaf7ff;

    transform:scale(1.01);

}



#tablaUsuarios td{

    padding:14px;

}




/* =====================
   CHECKBOX
===================== */


input[type="checkbox"]{

    width:18px;

    height:18px;

    cursor:pointer;

    accent-color:#28a745;

    transition:.3s;

}


input[type="checkbox"]:hover{

    transform:scale(1.2);

}



#tablaUsuarios th:first-child,
#tablaUsuarios td:first-child{

    text-align:center;

    width:50px;

}




/* =====================
   BOTONES ACCIONES ICONOS
===================== */


.accion{

    width:42px;

    height:42px;

    display:inline-flex;

    align-items:center;

    justify-content:center;

    margin:4px;

    border-radius:50%;

    color:white!important;

    font-size:0;

    transition:.35s;

    position:relative;

    box-shadow:

    0 5px 15px rgba(0,0,0,.15);

}



.accion:before{

    font-family:"Font Awesome 6 Free";

    font-weight:900;

    font-size:16px;

}



/* EDITAR */

.editar{

    background:linear-gradient(135deg,#0062ff,#00c6ff);

}


.editar:before{

    content:"\f044";

}



.editar:hover{

    transform:translateY(-4px) scale(1.1);

}




/* ELIMINAR */


.eliminar{

    background:linear-gradient(135deg,#dc3545,#ff6b6b);

}



.eliminar:before{

    content:"\f2ed";

}



.eliminar:hover{

    transform:translateY(-4px) scale(1.1);

}




/* NUEVO USUARIO */


.accion.nuevo{

    background:linear-gradient(135deg,#00b09b,#96c93d);

}



.accion.nuevo:before{

    content:"\f234";

}



.accion.nuevo:hover{

    transform:translateY(-4px) scale(1.1);

}



/* Tooltip */


.editar:hover:after{

    content:"Editar";

}


.eliminar:hover:after{

    content:"Eliminar";

}


.nuevo:hover:after{

    content:"Nuevo Usuario";

}



.accion:hover:after{

    position:absolute;

    bottom:-35px;

    background:#333;

    color:white;

    padding:5px 10px;

    border-radius:5px;

    font-size:12px;

    white-space:nowrap;

    z-index:10;

}



/* Centrar acciones */


#tablaUsuarios td:last-child{

    text-align:center;

    white-space:nowrap;

}




/* DATATABLE BOTONES */


.dt-buttons{

    margin-bottom:20px;

}



.dt-button{

    background:#1d3557!important;

    color:white!important;

    border:none!important;

    border-radius:20px!important;

    padding:8px 15px!important;

    transition:.3s!important;

}



.dt-button:hover{

    background:#457b9d!important;

    transform:translateY(-2px);

}



/* BUSCADOR */


.dataTables_filter input{

    border-radius:20px!important;

    padding:8px 15px!important;

    border:1px solid #ccc!important;

}


.dataTables_filter input:focus{

    border-color:#28a745!important;

}



/* RESPONSIVE */


@media(max-width:768px){

    body{

        margin:15px;

    }


    h2{

        font-size:24px;

    }

}


</style>

<body>


<h2>Usuarios Registrados</h2>


<table id="tablaUsuarios" class="display">


<thead>

<tr>


<th>

<input type="checkbox" id="seleccionarTodos">

</th>


<th>CURP</th>

<th>Nombre</th>

<th>Sexo</th>

<th>Teléfono</th>

<th>Correo</th>

<th>Acciones</th>


</tr>

</thead>



<tbody>


<?php foreach($usuarios as $u){ ?>


<tr>


<td>

<input 
type="checkbox"
class="usuarioCheck"
value="<?= $u->id ?>">

</td>



<td><?= $u->us_curp ?></td>


<td><?= $u->us_name ?></td>


<td><?= $u->us_sexo ?></td>


<td><?= $u->us_telefono ?></td>


<td><?= $u->us_email ?></td>



<td>


<a 
class="accion editar"
title="Editar"
href="<?= base_url('index.php/usuarios/editar/'.$u->id); ?>">

Editar

</a>



<a 
class="accion eliminar"
title="Eliminar"
onclick="return confirm('¿Eliminar este usuario?')"
href="<?= base_url('index.php/usuarios/eliminar/'.$u->id); ?>">

Eliminar

</a>



<a 
class="accion nuevo"
title="Nuevo Usuario"
href="<?= base_url('index.php/usuarios'); ?>">

Nuevo Usuario

</a>


</td>


</tr>


<?php } ?>


</tbody>


</table>

<br><br>

<div class="dashboard-grafica">


    <h2>
        <i class="fa-solid fa-chart-pie"></i>
        Estadísticas de Usuarios
    </h2>


    <div class="cards-estadistica">


        <div class="card-total">

            <i class="fa-solid fa-users"></i>

            <div>

                <span>Total Usuarios</span>

                <strong>
                    <?= $total ?>
                </strong>

            </div>

        </div>



        <div class="card-hombres">

            <i class="fa-solid fa-person"></i>

            <div>

                <span>Hombres</span>

                <strong>
                    <?= $hombres ?>
                </strong>

            </div>

        </div>




        <div class="card-mujeres">

            <i class="fa-solid fa-person-dress"></i>

            <div>

                <span>Mujeres</span>

                <strong>
                    <?= $mujeres ?>
                </strong>

            </div>

        </div>



    </div>



    <div class="contenedor-chart">

        <canvas id="graficaUsuarios"></canvas>

    </div>


</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>



<script>


$(document).ready(function(){


$('#tablaUsuarios').DataTable({


dom:'Bfrtip',


buttons:[

'copy',

'csv',

'excel',

'pdf',

'print'

],


language:{


url:'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'


}


});





$('#seleccionarTodos').on('click',function(){


$('.usuarioCheck').prop(

'checked',

this.checked

);


});





$('#tablaUsuarios tbody').on('change','.usuarioCheck',function(){



if(!this.checked){


$('#seleccionarTodos').prop(

'checked',

false

);


}



if($('.usuarioCheck:checked').length === $('.usuarioCheck').length){


$('#seleccionarTodos').prop(

'checked',

true

);


}



});




});


</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>


const ctx = document.getElementById('graficaUsuarios');


new Chart(ctx, {


    type:'doughnut',


    data:{


        labels:[

            'Hombres',

            'Mujeres'

        ],


        datasets:[{


            data:[

                <?= $hombres ?>,

                <?= $mujeres ?>

            ],


            backgroundColor:[

                '#007bff',

                '#ff416c'

            ],


            borderWidth:4,


            hoverOffset:15


        }]


    },


    options:{


        responsive:true,


        plugins:{


            legend:{


                position:'bottom',


                labels:{


                    font:{


                        size:14


                    }


                }


            },


            tooltip:{


                callbacks:{


                    label:function(context){


                        return context.label + ': ' + context.raw + ' usuarios';


                    }


                }


            }


        }


    }


});


</script>


</body>

</html>