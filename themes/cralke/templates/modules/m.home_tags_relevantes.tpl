
<div id="tags-trendsBox">

	  <div class="box_title">
                            <div class="box_txt estadisticas">&Uacute;ltimos Tags</div>
                     </div>   
	 <div class="box_cuerpo" istyle="padding: 0pt; height: 330px;">	
		<center>

{php}

// Limite
$limite = 5; // Cambiar a gusto 
$tags = db_exec(array(__FILE__, __LINE__), 'query', "SELECT post_tags FROM p_posts GROUP BY post_tags ORDER BY RAND() LIMIT $limite");
while($mostrar = db_exec('fetch_array', $tags)){ // Mostramos todos los campos
    $conjunto.=$mostrar[post_tags].','; // Conjunto de Datos
}
// Devuelve parte del string para $conjunto
$conjunto_string=substr($conjunto,0,strlen($conjunto)-1);
 // Sustitucion de caracteres como la ,"Coma".
$caracteres=array(',','.','/',':',' ,'); // por si acaso tengas alguno de estos caracteres 
$tags=str_replace($caracteres, ",", $conjunto_string); 
 // Un array de cadenas == explode()
$tags=explode(",",$tags);
// Funcion Adicional
function tags_for($tag){
   $tag= trim($tag); }
array_walk($tags,'tags_for');
//Contar Cantidad de Tags
$total_tags = count($tags);
// Devolvemos Array 
$tags= array_count_values($tags); 
ksort($tags); 
reset($tags); 
//Mostramos Tags Con estilos
while (list($name, $valor) = each($tags)){
    $cant= @round($valor*50/$total_tags); //$por = @round($valor*50/$total_tags,1);
// Cambiar Cantidad de Tags Utilizados
    if ($cant>=5 ){
        $estilo=5;
    }else if($cant>=4 ){
        $estilo=4;
    }else if($cant>=3 ){
        $estilo=3;
    }else if($cant>=2 ){
        $estilo=2;
    }else if($cant>=1){
        $estilo=1;
    
    }
    echo ' <span class="tag-size'.rand(1,5).'"><a rel="tag" href="/buscador/?q='.$name.'&e=tags" style="color:#252525">'.$name.'</a></span> ';
}
{/php}
   </div></center>   </div>