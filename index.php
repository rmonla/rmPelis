<?php  

/**
 * Terminados:
 *     - Mostrar solo los archivos de una lista de extenciones pedidas.
 * Pendientes:
 *     - Comentar mejor.
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
    if ( count($lst) ) {
        sort($lst);
        return $lst;
    }
    else return 0;
}

function lstDirs( 
    $dori = '.', 
    $outs = array( '.', '..', '.git' )
){
    $lst = array();
    if( is_dir($dori) ){
        if( $dir = opendir($dori) ){
            while( ($res = readdir($dir)) !== false ){
                if( in_array($res, $outs) ) continue; 
                    // Salta si el directorio está en la lista de los negados.
                if( is_dir($res) ) $lst[] = $res;
                    // Carga en el array si es directorio.
                
            }
            closedir($dir);
        }
    }
    if ( count($lst) ) {
        sort($lst);
        return $lst;
    }
    else return 0;
}

function getLi(
    $dir = '',
    $arch = ''
){
    return "<li><a target='_blank' href='$dir/$arch'>$arch</a></li>";
}

$dirs = lstDirs();
foreach ($dirs as $dir) {
    echo "<li>$dir</li>";
    $archs = lstArchs($dir, array('mp4'), array('.', '..'));
    echo "<ul>";
    foreach ($archs as $arch) echo getLi( $dir, $arch );
    echo "</ul>";

}

// is_dir(filename)
// Arma los ul
//var_dump($dirs);
// echo "<pre>";
// var_dump($archs);
// echo "</pre>";

// echo "<p><h1><center>rmPelis</center></h1></p>";

// echo lstPelis();

?>