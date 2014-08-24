<?php
include('plantilla.php');

if($_POST){
  

        $Nombre = $_POST['Nombre'];
        $Email = $_POST['Email'];
        $Mensaje = $_POST['Mensaje'];

        if ($Nombre=='' || $Email=='' || $Mensaje==''){ // Si falta un dato en el formulario mandara una alerta al usuario.

        echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

        }else{


            require("contacto/archivosformulario/class.phpmailer.php"); // Requiere PHPMAILER para poder enviar el formulario desde el SMTP de google
            $mail = new PHPMailer();

            $mail->From     = $Email;
            $mail->FromName = $Nombre; 
            $mail->AddAddress("20121147@itla.edu.do"); // Dirección a la que llegaran los mensajes.

        // Aquí van los datos que apareceran en el correo que reciba

            $mail->WordWrap = 50; 
            $mail->IsHTML(true);     
            $mail->Subject  =  "Contacto"; // Asunto del mensaje.
            $mail->Body     =  "Nombre: $Nombre \n<br />". // Nombre del usuario
            "Email: $Email \n<br />".    // Email del usuario
            "Mensaje: $Mensaje \n<br />"; // Mensaje del usuario

        // Datos del servidor SMTP, podemos usar el de Google, Outlook, etc...

            $mail->IsSMTP(); 
            $mail->Host = "ssl://smtp.gmail.com:465";  // Servidor de Salida. 465 es uno de los puertos que usa Google para su servidor SMTP
            $mail->SMTPAuth = true; 
            $mail->Username = "20121147@itla.edu.do";  // Correo Electrónico
            $mail->Password = "oxford.10"; // Contraseña del correo

            if ($mail->Send())
            echo "<script>alert('Formulario enviado exitosamente, le responderemos lo más pronto posible.');location.href ='javascript:history.back()';</script>";
            else
            echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

        }
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">    
    <meta name="author" content="Fanco">

    <title>Contactos</title>

    <link href="contacto/css/bootstrap.css" rel="stylesheet">
    <link href="contacto/css/jumbotron.css" rel="stylesheet">

  </head>

  <body>

  <div class="container">
   <h1 class="formuh1">Contacto rápido.</h1>
    <form id="form1" class="well col-lg-12" action="contactos.php" method="post" name="form1">
      <div class="row">
       <div class="col-lg-6">
        <label>Nombre*</label> <input id="Nombre" class="form-control" type="text" name="Nombre" /> 
        <label>Email*</label> <input id="Email" class="form-control" type="email" name="Email" />
       </div>
        <div class="col-lg-6"><label>Mensaje*</label> 
         <textarea id="Mensaje" class="form-control" name="Mensaje" rows="4"></textarea>
        </div>
        <button class="btn btn-default pull-right" type="submit">Enviar</button>
      </div>
    </form>
  </div>
  

    <script src="contacto/jquery.js"></script>
    <script src="contacto/bootstrap.min.js"></script>

  </body>
</html>