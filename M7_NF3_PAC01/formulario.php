<?php
date_default_timezone_set( 'Europe/Madrid');
setlocale( LC_TIME, ['es', 'spa', 'es_ES']);
session_start();

//Hago Set en la variable nombre solamente por si acaso
unset($_SESSION['nombre']);
// unset($_SESSION['visitas']);

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades M7</title>
  
</head>
<body>
    <?php
    //Si ha enviado el formulario 
    if(isset($_POST['enviar'])):
        //Cuento las visitas
        if(isset($_SESSION['visitas'])):
            $_SESSION['visitas']++;
        else:
            $_SESSION['visitas'] = 1;
        endif;

        //Guardo variables
        $_SESSION['nombre']=$_POST['nombre'];
        $color = $_POST['color'];
        $fuente = $_POST['fuente'];
        $talla = $_POST['talla'];

        echo "<p>Bienvenido/a " . $_SESSION['nombre'] . ".Eres nuestra visita número " . $_SESSION['visitas'] . "</p>";

        //Esto ha sido una prueba para variar 
        $personalizacion = <<<EOD
            <p style="color:{$color}; font-size:{$talla}px; font-family:{$fuente};">
                Esta es la letra tan chula que has creado
            </p>
        EOD;

        echo $personalizacion;

            //Si ha solicitado guardar los datos pues una pequeña información
            if(isset($_POST['guardardatos'])):

                echo "Has solicitado guardar datos...
                        <br/>
                        Tus datos quedarán a buen recaudo por 1 hora...
                        <br/>
                        No olvides que puedes volver a rellenar el formulario haciendo click en este
                        <a href='http://localhost:8080/M7_NF3_PAC01'>enlace</a>";

                        //Almaceno la cookie con los estilos
                        setcookie( 'estilopersonalizado', $personalizacion, time() + 3600);
            else:
                echo "<a href='http://localhost:8080/M7_NF3_PAC01'>Volver al enlace anterior</a>";
            endif;

            //Si existe la cookie entonces le presento el texto con su estilo anterior
            if(isset($_COOKIE['estilopersonalizado'])):
                echo $_COOKIE['estilopersonalizado'] . "<br/>Además tiene la duración de 1 hora, no pierdas estos magnificos estilos...";
            endif;

    else:
        //Ha entrado en el formulario directamente sin rellenar los datos
        echo "<p>Perdona pero no has iniciado sesión...<br/>No podrás tener un texto super guay...</p>";
        echo "<a href='http://localhost:8080/M7_NF3_PAC01'>Volver al enlace anterior</a>";

    endif;
    ?>


<?php include('footer.php'); ?>