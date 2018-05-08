<?php  

// echo "Hola Ricardo";
// 
	
function listar_archivos($carpeta){
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                    echo '<li><a target="_blank" href="'.$carpeta.'/'.$archivo.'">'.$archivo.'</a></li>';
                }
            }
            closedir($dir);
        }
    }
}
 
echo listar_archivos('.');

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