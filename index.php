<?php  

/**
 * Terminados:
 *     - Mostrar solo los archivos de una lista de extenciones pedidas.
 * V 1.0.2
 *     - Se limpió código.
 *     - Genera los links a partir de un array y no solo imprime como antes.
 *     
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
function lstArchs( $dori = '.' ){
    $exts = array('mp4'); 
    $outs = array('.', '..', '.htaccess');

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

function getLi( $dir = '', $arch = ''){
    $tit = substr($arch, 0, -4);
    return "<li><a target='_blank' href='$dir/$arch'>$tit</a></li>";
}

// Cargo los archivos en un array..

    foreach ( lstDirs() as $dir )
        foreach ( lstArchs($dir) as $arch )
            $pelis[$dir][] = $arch; 
            
// var_dump($pelis);

// Los links.
    foreach ($pelis as $cat => $archs) {
        echo "<ul><li>$cat</li><ul>";
        
        foreach ($archs as $arch) echo getLi( $cat, $arch );
        
        echo "</ul></ul>";

    }

?>