<?php
     //Solicitar archivo del vendor
     require 'vendor/autoload.php';
     //Instancia para conectar el proyecto a MONGODB
     $client= new MongoDB\Client('mongodb://localhost:27017');
     //Creamos una variable para acceder a los datos que existen en la coleccion
     //$friends= $client->dbprueba->personas;
     $friends= $client-> twitterdb -> users;
     /*
         $client  -> instancia para acceder a MONGODB
         dbprueba -> nombre de la base de datos
         personas -> nombre de la coleccion que existe en la base de datos
     */
     //Capturamos los datos y lo guardamos en una variable
     $result= $friends-> find(array(),array('projection'=>array('_id'=>false) ) );

     //Iteramos la coleccion y lo guardamos en una variable
     $data= iterator_to_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!--<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">-->
	 <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="./css/all.css">
    <!-- Custom Style   -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<!--------Encabezado-------->
	<section class="site-title">
		<div class="site-background aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
			<h3>Crud</h3>
			<h1>PHP - MongoDB</h1>
			<button class="btn">Ver</button>
        </div>
    </section>


    <!--------Tabla-------->
    	<table class="table" role='table' border='0' class='tabla2 table-striped table-bordered table-hover' >
    		<thead>
    			<tr>
    				<?php foreach ($data[0] as $key => $value) :?>
    					<th width="190px" style="text-align: center">
    						<?php echo $key; ?>
    					</th>
    				<?php endforeach; ?>
    			</tr>
    		</thead>
    		<tbody>
    			<?php foreach ($data as $entry) :?>
    				<tr>
    					<?php  foreach ($entry as $key => $value):?>
    						<td style="text-align: center;">
    							<?php echo $value; ?>
    						</td>
    					<?php endforeach; ?>
    				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

</body>

</html>