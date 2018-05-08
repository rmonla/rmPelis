<?php  

/**
 * Terminados:
 *     - Mostrar solo los archivos de una lista de extenciones pedidas.
 * Pendientes:
 *     - Hacer un mejor copyrigth.
 *     - Limpiar código basura.
 * 
 */


	
function lstPelis( 
    $dorgen  = '.', 
    $eactdas = array('mp4'), 
    $angdos  = array('.', '..', '.htaccess')
){
    if( is_dir($dorgen) ){
        if( $dir = opendir($dorgen) ){
            while( ($arch = readdir($dir)) !== false ){
                
                if( !in_array(strtolower(end(explode('.', $arch))), $eactdas) ) continue;
                // explode('.', xxx)        --> Divide xxx en array por el punto.
                // end( xxx )               --> Toma el último elemento del array.
                // strtolower ( xxx )       --> Pasa a minúsculas xxx.
                // !in_array( xxx , array ) --> Verifica si xxx NO está en el array.
                // if( xxx ) continue       --> Salta y sigue el while.
                
                if( in_array($arch, $angdos) ) continue;
                // in_array( xxx , array )  --> Verifica si xxx ESTA en el array.
                // if( xxx ) continue       --> Salta y sigue el while.

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
