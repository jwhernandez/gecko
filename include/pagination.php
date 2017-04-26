<?php
require('config.php');
$categoria=$_GET['categoria'];
$query_num_services =  mysql_query("SELECT * FROM historia WHERE categoria = '$categoria'", $conexion);
$num_total_registros = mysql_num_rows($query_num_services);

//Si hay registros
 if ($num_total_registros > 0) {
	//numero de registros por página
    $rowsPerPage = 5;

    //por defecto mostramos la página 1
    $pageNum = 1;

    // si $_GET['page'] esta definido, usamos este número de página
    if(isset($_GET['page'])) {
		sleep(1);
    	$pageNum = $_GET['page'];
	}
		
	//echo 'page'.$_GET['page'];

    //contando el desplazamiento
    $offset = ($pageNum - 1) * $rowsPerPage;
    $total_paginas = ceil($num_total_registros / $rowsPerPage);

                    
    $query_services = mysql_query("SELECT * FROM historia WHERE categoria = '$categoria' ORDER BY idhistoria DESC LIMIT $offset, $rowsPerPage", $conexion);
    while ($row_services = mysql_fetch_array($query_services)) {
                        //$service = new Service($row_services['service_id']);
        
        $query_image =  mysql_query("SELECT foto FROM foto WHERE idhistoria=".$row_services['idhistoria']." LIMIT 1", $conexion);
        $row_image = mysql_fetch_array($query_image);
        			echo '
						<div class="service_list" id="service'.$row_services['idhistoria'].'" data="'.$row_services['idhistoria'].'">
                         	
                            <div class="center_block">
                                <a title="'.$row_services['nombre'].'" class="product_img_link" href="categoria.php?categoria='.$categoria.'&album='.$row_services['idhistoria'].'">
                                <img width="129" height="129" alt="'.$row_services['nombre'].'" src="'.$row_image['foto'].'"></a>
                                <h3><a title="'.$row_services['nombre'].'" href="categoria.php?categoria='.$categoria.'&album='.$row_services['idhistoria'].'">'.$row_services['nombre'].'</a></h3>
                                <p class="product_desc">'.$row_services['descripcion'].'</p>                                
                                <p class="price"> Localizacion: '.$row_services['Direccion'].'</p>
                                <p class="rating"> 
                                <input name="rating" id="ratingfile" value="'.$row_services['rating'].'" type="number" class="rating star-rating" min=0 max=5 step=0.2 data-size="xs">';
                                
                               
                                echo '<div class="rating" id="rating'.$row_services['idhistoria'].'" data="'.$row_services['idhistoria'].'">';							
  
                                     echo '
                                    </div>
                           	
                            </div>

                        </div>';
	}
	
	 if ($total_paginas > 1) {
                        echo '<div class="pagination">';
                        echo '<ul>';
                            if ($pageNum != 1)
                                    echo '<li><a class="paginate" data="'.($pageNum-1).'">Anterior</a></li>';
                            	for ($i=1;$i<=$total_paginas;$i++) {
                                    if ($pageNum == $i)
                                            //si muestro el índice de la página actual, no coloco enlace
                                            echo '<li class="active"><a>'.$i.'</a></li>';
                                    else
                                            //si el índice no corresponde con la página mostrada actualmente,
                                            //coloco el enlace para ir a esa página
                                            echo '<li><a class="paginate" data="'.$i.'">'.$i.'</a></li>';
                            }
                            if ($pageNum != $total_paginas)
                                    echo '<li><a class="paginate" data="'.($pageNum+1).'">Siguiente</a></li>';
                       echo '</ul>';
                       echo '</div>';
                    }
	
}
?>
