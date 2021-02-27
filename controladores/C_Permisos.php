<?php 

require_once 'Controlador.php';
require_once 'vistas/Vista.php';
require_once 'modelos/M_Permisos.php';

class C_Permisos extends Controlador{
    private $modelo;

    public function __construct(){
        parent::__construct(); //ejecutar el constructor padre
        $this->modelo= new M_Permisos();
    }
    public function vistaInicio(){
        Vista::render('vistas/Permisos/V_Permisos_Inicio.php');
    }

    public function buscar($datos){
        if(!isset($datos['filasPagina']) 
                    || !is_numeric($datos['filasPagina'])
                    || !isset($datos['pagina'])
                    || !is_numeric($datos['pagina'])){
            $datos['pagina']=1;
            $datos['filasPagina']=10;
        }


        //consultar BD, los usuarios
        $permisos=$this->modelo->buscarPermisos($datos);
        // echo json_encode($datos);

        //generar la vista de resultados
        Vista::render('vistas/Permisos/V_Permisos_Listado.php', $permisos);
        
        //visualizar paginador:
        $datos['contar']='S';
        $datos['totalFilas']=$this->modelo->buscarPermisos($datos);
        Vista::render('vistas/Paginador/V_Paginador.php', $datos);
        

    }

    public function editarNuevo($datos){
        if($datos['id_permisos']==''){ //nuevo
            Vista::render('vistas/Permisos/V_Permisos_EditarNuevo.php');
        }else{ //editar
            $permisos=$this->modelo->buscarPermisos($datos);
    
            if(empty($permisos) || sizeof($permisos)>1){
                echo 'Usuario no encontrado.';
            }else{
                Vista::render('vistas/Permisos/V_Permisos_EditarNuevo.php', $permisos[0]);
            }
        }
    }

    public function cambiarEstadoPermisos($datos){
        $numFilas=$this->modelo->cambiarActivo(array('id_permisos'=>$datos['id_permisos']));
        $filas=$this->modelo->buscarPermisos(array('id_permisos'=>$datos['id_permisos']));
        echo $filas[0]['activo'];
    }

    public function eliminarPermisos($datos){
        $filas=$this->modelo->borrarPermiso(array('id_permisos'=>$datos['id_permisos']));
    }

    public function guardar($datos){
        echo json_encode($datos);
            
        $id_permisos=$datos['id_permisos'];
        $respuesta=array('mensaje'=>'', 'correcto'=>'S');
            
        if($id_permisos==''){ //nuevo usuario
            $id=$this->modelo->insertarPermiso($datos);
            if($id!='' && is_numeric($id)){
               $respuesta['mensaje']='Se ha creado correctamente.';
            }else{ //no se ha insertado
                $respuesta['correcto']='N';
                $respuesta['mensaje']='NO se ha podido crear.';
            }
    
        }else{ //modificacion usuario
            $numFilas=$this->modelo->actualizarPermisoPorId($datos);
            if($numFilas!='' && ($numFilas=='1' || $numFilas=='0') ){
                $respuesta['mensaje']='Se ha modificado correctamente.';
            }else{ //no se ha insertado
                $respuesta['correcto']='N';
                $respuesta['mensaje']='NO se ha podido modificar.';
            }
            echo $numFilas; 
        }
    
        echo json_encode($respuesta);
        
    }

}


?>