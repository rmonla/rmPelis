<?php  

/**
 * Pendientes:
 *     - Mostrar solo los archivos de una lista de extenciones pedidas.
 *     - Hacer un mejor copyrigth.
 *     - Limpiar còdigo basura.
 */

	
function lstPelis(
    $dorgen  = '.',
    $eactdas = ['.mp4'],
    $angdos  = ['.', '..', '.htaccess']
){
    if( is_dir($dorgen) ){
        if( $dir = opendir($dorgen) ){
            while( ($arch = readdir($dir)) !== false ){
                if( in_array($arch, $angdos) ) continue;

                echo '<li><a target="_blank" href="'.$dorgen.'/'.$arch.'">'.$arch.'</a></li>';
            }
            closedir($dir);
        }
    }
}
 
echo lstPelis();

/**
 * Retorna un array de archivos.
 * @param  string $pth Path del directorio donde se hace la búsqueda de archivos.
 * @return array       Lista de archivos encontrados.
 */
// function getLstArchs($pth='.'){
// 	$lst = [];
// 	while ( $arch = readdir($pth) )
// 	    if ( !is_dir($arch) ){
// 	    	$lst[] = $arch;
// 	    	echo "$arch <br>";
// 	    }
//     return $lst;
// }

// var_dump( getLstArchs() );



?>

<video width="320" height="240" controls>
	<source src="Peli_CARS33333HD720P.mp4" type="video/mp4">
	Your browser does not support the video tag.
</video> 
