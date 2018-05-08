<?php  

/**
 * Pendientes:
 *     - Mostrar solo los archivos de una lista de extenciones pedidas.
 *     - Hacer un mejor copyrigth.
 *     - Limpiar còdigo basura.
 */

	
function lstPelis($dori='.'){
    if(is_dir($dori)){
        if($d = opendir($dori)){
            while(($arch = readdir($d)) !== false){
                if($arch != '.' && $arch != '..' && $arch != '.htaccess'){
                    echo '<li><a target="_blank" href="'.$dori.'/'.$arch.'">'.$arch.'</a></li>';
                }
            }
            closedir($d);
        }
    }
}
 
echo lstPelis();

/**
 * Retorna un array de archivos.
 * @param  string $pth Path del directorio donde se hace la búsqueda de archivos.
 * @return array       Lista de archivos encontrados.
 */
function getLstArchs($pth='.'){
	$lst = [];
	while ( $arch = readdir($pth) )
	    if ( !is_dir($arch) ){
	    	$lst[] = $arch;
	    	echo "$arch <br>";
	    }
    return $lst;
}

// var_dump( getLstArchs() );



?>

<video width="320" height="240" controls>
	<source src="Peli_CARS33333HD720P.mp4" type="video/mp4">
	Your browser does not support the video tag.
</video> 
