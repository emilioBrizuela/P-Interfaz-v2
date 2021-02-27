<link rel="stylesheet" href="css/Paginador.css">
<script src="js/Paginador.js" ></script>
<?php
	//Variables que debemos recibir en $datos
	$pagina=1;
	$filasPagina=10;
	$totalFilas=0;
	extract($datos); 

    $totalPaginas=ceil( $totalFilas/$filasPagina);
	
	$paginaAnterior=$pagina-1;
	$paginaSiguiente=$pagina+1;
	
	
	$html = '<div class="paginador">';
	$html.= 	'<table>';
	$html.= 		'<tr>';
	$html.= 			'<td><b>Total: '.$totalFilas.' filas.</b> ';
	if($pagina>1){
		$html.= '<span onclick="buscar(1);">
					<img src="imagenes/inicio.png" class="iconoPaginador" title="Primera página">
				</span>&nbsp;&nbsp;';//primera pagina
		$html.= '<span onclick="buscar('.$paginaAnterior.');">
					<img src="imagenes/anterior.png" class="iconoPaginador" title="Página Anterior">
				</span>&nbsp;&nbsp;'; //pagina anterior
	}else{
		$html.= '<span>
					<img src="imagenes/inicio_gris.png" class="iconoPaginador" title="Primera página">
				</span>&nbsp;&nbsp;';//primera pagina
		$html.= '<span>
					<img src="imagenes/anterior_gris.png" class="iconoPaginador" title="Página Anterior">
				</span>&nbsp;&nbsp;'; //pagina anterior
	}
	
	$html.= 'P&aacute;gina <input type="text" id="pagina" name="pagina" size="2" onblur="cambiarDePagina();" value="'.$pagina.'"> ';
	$html.= ' de '.$totalPaginas.'. Ver ';
	$html.= '<input id="filasPagina" name="filasPagina" type="text" size="2" value="'.$filasPagina.'" onblur="javascript:cambiarFilasPagina();">&nbsp;&nbsp;&nbsp;';

	if($pagina<$totalPaginas){
		$html.= '<span onclick="buscar('.$paginaSiguiente.');">
					<img src="imagenes/siguiente.png" class="iconoPaginador" title="Página Siguiente">
				</span>&nbsp;&nbsp;'; //pagina siguiente
		$html.= '<span onclick="buscar('.$totalPaginas.');">
					<img src="imagenes/final.png" class="iconoPaginador" title="Última página">
				</span>&nbsp;&nbsp;'; //ultima pagina
	}else{
		$html.= '<span>
					<img src="imagenes/siguiente_gris.png" class="iconoPaginador" title="Página Siguiente">
				</span>&nbsp;&nbsp;'; //pagina siguiente
		$html.= '<span>
					<img src="imagenes/final_gris.png" class="iconoPaginador" title="Última página">
				</span>&nbsp;&nbsp;'; //ultima pagina
	}
	
	$html.= 			'</td>';
	$html.= 		'</tr>';
	$html.= 	'</table>';
	$html.= '</div>';

    echo $html;