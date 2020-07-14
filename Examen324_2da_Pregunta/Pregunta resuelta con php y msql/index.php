<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
 	<link rel="stylesheet" href="css/estilo.css">  <!-- Se usa css para centrar la imagen-->
</head>
<body>   
        <h1 text-align: center >Licenciado en esta parte se muestra la pregunta 2 del examen</h1>
        <br>       
        <br>  
        <br>  
        <table width='500px' border=1 class="tabla" style="margin: 0px auto;">
        <?php
            $conexion = mysqli_connect("localhost","root","","academico");

            /* 
            En esta parte se muestra el codigo para la segunda pregunta:
            
            2.    Con la Base de datos anterior, adicione una tabla de notas por materia y cuente la cantidad de aprobados por departamento de manera que solo obtenga una sola fila de resultados (con codigo PHP, con codigo SQL)
            En este caso se obtiene 2 filas de resultados, uno seria, el numero de departamento y el otro
            la cantidad de aprobados por departamento
            
            En la siguiente consulta se realiza la consulta en la base de datos
                el cual devuelve la cantidad de aprobados por lugar de residencia*/
            $sentencia="select i.lugarResidencia, COUNT(*) aprobados
                        from notasxmateria nm, identificador i
                        where nm.ci=i.ci and nm.nota>50
                        GROUP by i.lugarResidencia";
            $resultado=mysqli_query($conexion,$sentencia);
            $registrosTotales = 0;
            
            
            
            /*Ahora se llena 2 vectores para poder mostrar las tablas en forma horizontal*/
            while($number = mysqli_fetch_array($resultado))
            {
                $lugarResArr[] = $number['lugarResidencia'];
                $AprobadosArr[] = $number['aprobados'];
                $registrosTotales++;
            }
            /*Se muestra  los datos de cantidad de aprobados por lugar de residencia en forma horizontal */
            echo "<tr>";
            echo "<td>Lugar de Residencia</td>";
            for($i = 0; $i < $registrosTotales; $i++){
                echo "<td>" .$lugarResArr[$i]. "</td>";
            }
            echo "</tr>";
        
            echo "<tr>";
            echo "<td>Aprobados por departamento</td>";
            for($i = 0; $i < $registrosTotales; $i++){
                echo "<td>" .$AprobadosArr[$i]. "</td>";
            }
            echo "</tr>";
            
        ?>
        </table>
        <br>
        <div style="text-align: center" class="contenedor-inputs">           

        </div>
 </body>
</html>
