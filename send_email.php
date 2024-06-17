<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validar los datos
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Dirección de correo electrónico donde quieres recibir los mensajes
        $to = "joaq.rdrz@gmail.com";

        // Asunto del correo
        $subject = "Nuevo mensaje de $name";

        // Contenido del correo
        $body = "Nombre: $name\nEmail: $email\n\nMensaje:\n$message";

        // Encabezados del correo
        $headers = "From: $email";

        // Enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "Mensaje enviado con éxito.";
        } else {
            echo "Hubo un error al enviar el mensaje.";
        }
    } else {
        echo "Por favor, completa todos los campos correctamente.";
    }
}
?>