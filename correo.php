<?php

    $header = "Enviado desde Alexis-Barrientos Web Site";
    $destinatario = "barrientos.ale@hotmail.com";
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $mensaje = trim($_POST['mensaje']);
    $mensajeCompleto = $mensaje . "\n de: " . $nombre . "\n Email: " . $email;
    $error = [];
    
    if ($_POST) {

        if (strlen($nombre) == 0) {
            $error["nombre"] = "El campo nombre no puede estar vacio";
            $error++;
        }

        if (strlen($nombre) < 5) {
            $error["nombre"] = "El nombre no puede tener menos de 5 letras";
            $error++;
        } 

        if (strlen($mensaje) < 5) {
            $error["mensaje"] = "El mensaje pareciera carecer de información";
            $error++;
        }

        if (strlen($mensaje) == 0) {
            $error["mensaje"] = "El mensaje está vacio";
            $error++;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error["email"] = "Formato email no valido";
            $error++;
        }
    }
    var_dump($error);
    // exit;

    if (count($error) == 0 ) {
        echo("no hay errores, podes enviar mail");
        mail($destinatario, $nombre, $mensajeCompleto, $header);

    }