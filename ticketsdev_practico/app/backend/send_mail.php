<?php
function enviar_email($registro){
    $asunto = 'REGISTRO ENTRENAMIENTO';
    $para = $registro['email'];

    $mensaje = "
    <html>
    <head>
    <title>$asunto</title>
    <style>
    html {
        font-family: Arial, sans-serif:
        font-size: 32 px;
    }
    hr { 
        border: thin solid #58595B;
    }
    .f-green { color: #C3D500; }
    .bold { font-weight: bold; }
    .upper { text-transform: uppercase; }
    </style>
    </head>
    <body>
    <div align='center'>
    <img src='https://i.imgur.com/YMh1qny.png'>
    <hr>
    <p>
    Gracias por registrarte.
    <br>
    <span class='f-green bold upper'>".$registro['nombre']." ".$registro['apellido']. "</span>
    <br>
    Elegiste el bloque de 
    <span class='f-green bold upper'>".$registro['disciplina']."</span>
    <br>
    En el horario de 
    <span class='f-green bold upper'>".$registro['horario']."</span>    
    </p>
    <p>
    El email <b>".$registro['email']. "</b>, sera usado como identificación el dia de asistencia.
    </p>
    <p>
    <button style='font-size:28px;' onclick='print()'>Imprimir</button>
    </p>    
    </body>
    </html>
    ";

    $cabeceras="MIME-Version: 1.0\r\n";
    $cabeceras.="Content-type: text/html; chartset=utf-8\r\n";
    $cabeceras.="From: Organizadores MX <staff@organiza.mx>\r\n";
    $cabeceras.="Bcc: Jesus Ferrer <dev@mail.com>";

    //echo $mensaje;
    //mail($para, $asunto, $mensaje, $cabeceras);
}