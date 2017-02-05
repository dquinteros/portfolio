<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$name = $_POST['name'];
$email_address = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if ($email === FALSE) {
    echo 'Invalid email';
    exit(1);
}
$phone = $_POST['phone'];
$message = $_POST['message'];


// Create the email and send the message
$to = 'daniel.quinterosc@usach.cl'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Fromulario del sitio web:  $name";
$email_body = "Has recibido un mensaje del formulario de contacto de tu sitio web.\n\n"."Aquí estan los detalles:\n\nNombre: $name\n\nCorreo: $email_address\n\nTelefono: $phone\n\nMensaje:\n$message";
$headers = "From: contacto@dquinteros.cl\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
