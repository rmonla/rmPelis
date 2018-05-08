<?php  

/**
 * Terminados:
 *     - Mostrar solo los archivos de una lista de extenciones pedidas.
 * Pendientes:
 *     - Hacer un mejor copyrigth.
 *     - Limpiar código basura.
 * 
 */


/**
 * Imprime en pantalla una <li> de archivos.
 * @param  string $dori  Directorio origen de búsqueda.
 * @param  array  $exts  Extensiones permitaidas a mostrar.
 * @param  array  $outs  Archivos negados a mostrar.
 * @return html          
 */
function lstPelis( 
    $dori = '.', 
    $exts = array('mp4'), 
    $outs = array('.', '..', '.htaccess')
){
    if( is_dir($dori) ){
        if( $dir = opendir($dori) ){
            while( ($arch = readdir($dir)) !== false ){
                
                if( !in_array(strtolower(end(explode('.', $arch))), $exts) ) continue;
                // explode('.', xxx)        --> Divide xxx en array por el punto.
                // end( xxx )               --> Toma el último elemento del array.
                // strtolower ( xxx )       --> Pasa a minúsculas xxx.
                // !in_array( xxx , array ) --> Verifica si xxx NO está en el array.
                // if( xxx ) continue       --> Salta y sigue el while.
                
                if( in_array($arch, $outs) ) continue;
                // in_array( xxx , array )  --> Verifica si xxx ESTA en el array.
                // if( xxx ) continue       --> Salta y sigue el while.

                echo '<li><a target="_blank" href="'.$dori.'/'.$arch.'">'.$arch.'</a></li>';
            }
            closedir($dir);
        }
    }
}
 
echo lstPelis();
?>

<!-- <video width="320" height="240" controls>
	<source src="Peli_CARS33333HD720P.mp4" type="video/mp4">
	Your browser does not support the video tag.
</video> 
 -->