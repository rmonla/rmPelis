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
                    // Salta si la extensión esta en la lista de las negadas.
                if( in_array($arch, $outs) ) continue; 
                    // Salta si el archivo está en la lista de los negados.
                echo '<li><a target="_blank" href="'.$dori.'/'.$arch.'">'.$arch.'</a></li>';
            }
            closedir($dir);
        }
    }
}
/**
 * Imprime en pantalla una <li> de archivos.
 * @param  string $dori  Directorio origen de búsqueda.
 * @param  array  $exts  Extensiones permitaidas a mostrar.
 * @param  array  $outs  Archivos negados a mostrar.
 * @return html          
 */
function lstArchs( 
    $dori = '.', 
    $exts = array('mp4'), 
    $outs = array('.', '..', '.htaccess')
){
    $lst = array();
    if( is_dir($dori) ){
        if( $dir = opendir($dori) ){
            while( ($arch = readdir($dir)) !== false ){
                if( !in_array(strtolower(end(explode('.', $arch))), $exts) ) continue;
                    // Salta si la extensión NO está en la lista de permitidas.
                if( in_array($arch, $outs) ) continue; 
                    // Salta si el archivo está en la lista de los negados.
                $lst[] = $arch;
                    //Carga en el array el archivo.
            }
            closedir($dir);
        }
    }
    if ( count($lst) ) sort($lst);
    else return 0;
}

function lstDirs( 
    $dori = '.', 
    $outs = array()
){
    $lst = array();
    if( is_dir($dori) ){
        if( $dir = opendir($dori) ){
            while( ($dir = readdir($dir)) !== false ){
                if( !is_dir($dori) ) continue;
                    // Salta si no es directorio.
                if( in_array($dir, $outs) ) continue; 
                    // Salta si el directorio está en la lista de los negados.
                $lst[] = $dir;
                    //Carga en el array el directorio.
            }
            closedir($dir);
        }
    }
    if ( count($lst) ) sort($lst);
    else return 0;
}

echo "<p><h1><center>rmPelis</center></h1></p>";

echo lstPelis();

?>