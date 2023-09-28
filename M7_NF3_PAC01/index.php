<?php
date_default_timezone_set( 'Europe/Madrid');
setlocale( LC_TIME, ['es', 'spa', 'es_ES']);
// session_unset();
?>
<?php


    //Funciones para calcular fechas que solo muestran.
    function anteayer(){
        echo date('l', strtotime("-2 days")). ' día ' . date('d', strtotime("-2 days"));

    }

    function siguientemes(){
        echo date('F', strtotime("+1 months"));
    }

    function diasacabar(){
        $totaldias = date('t');
        $actualdia = date('d');

        $cantidaddias = $totaldias - $actualdia;
        echo $cantidaddias . ' días ';
    }

    function mesesacabar(){
        $totalmeses = 12;
        $actualmes =  date('n');

        $cantidadmeses = $totalmeses - $actualmes;

        $resultado = ($cantidadmeses == 0 ) ? 'Ya estamos en Diciembre, ahora ya disfruta' : 'Faltan '.$cantidadmeses. ' meses para acabar el año';

        echo $resultado;
    }

    //Función para determinar en que estación estamos, es ruda porque en verdad las estaciones no coinciden con los principios o finales de meses exactos
    //Utilizo una estructura switch-case para probar diferentes formas
    function estacion(){
        $mes =  date('n');

        switch($mes){
            case 3:
            case 4:
            case 5:
            case 6:
                echo "Estamos en primavera, ves preparandote para la alergia...";
                break;
            case 8:
            case 9:
                echo "Estamos en veranito, cúando vamos a la playa?";
                break;
            case 10:
            case 11:
            case 12:
                echo "¡Qué frio! Se nota que estamos en otoño, que ganas de comprar castañas...";
                break;
            case 1:
            case 2:
                echo "Estamos en invierno y yo solo quiero sofá y mantita...";
                break;
            default: 
                echo "Caso no contemplado";

        }

    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades M7</title>
  
</head>
<body>
    <h3>Muestra la siguiente estructura:</h3>
    <ul>
        <li>Hace dos dias estabamos a <?php anteayer()?></li>
        <li>El mes que viene es  <?php siguientemes()?></li>
        <li>Faltan <?php diasacabar()?> para acabar el mes</li>
        <li><?php mesesacabar()?></li>
    </ul>

    <h3>¿Me pongo un abrigo o ya voy sacando el pantalón corto?</h3>
    <p><?php estacion()?></p>

    <!-- Creo el formulario de estilos fashion para el cliente -->

    <h3>Formateamos tu texto a tu gusto, solamente tienes que rellenar este formulario: </h3>
    <form method="POST" action="formulario.php" enctype="multipar/form-data">
        <label for="nombre">¿Cómo te llamas?</label>
        <input type="text" name="nombre" required>
        <br/>
        <label for="color">Escoge un color que te guste:</label>
        <input type="color" name="color" required>
        <br/>
        <label for="fuente">Escoge una fuente:</label>
        <select name="fuente" id="fuente">
            <option value="Times New Roman" style="font-family: 'Times New Roman'">Times New Roman</option>
            <option value="Arial" style="font-family: 'Arial'">Arial</option>
            <option value="Helvetica" style="font-family: 'Helvetica'">Helvetica</option>
        </select>
        <br/>
        <label for="talla">Escoge un tamaño:</label>
        <input type="number" name="talla" min="12" max="50" required>
        <br/>
        <br/>
        <?php
        //He decidido que si tiene la cookie guardada aun no solicite guardar el estilo de nuevo, que se espere la hora
        if(isset($_COOKIE['estilopersonalizado'])):
            ?>
                <p>Tienes un estilo guardado...</p>
                <br/>
                <br/>
            <?php
        else:
            ?>
            <input type="checkbox" name="guardardatos" id="guardardatos" value="guardardatos">
            <label for="guardardatos">¿Quieres guardar estos estilos tan <span lang="en"><i>fashion</i></span>?</label>
            <br/>
            <br/>
        <?php
        endif;
        ?>
        <input type="submit" value="Enviar" name="enviar">
    </form>

<!-- Añadir el footer -->
<?php include('footer.php'); ?>