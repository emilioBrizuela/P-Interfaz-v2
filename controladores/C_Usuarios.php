<?php
require_once 'Controlador.php';
require_once 'vistas/Vista.php';
require_once 'modelos/M_Usuarios.php';


class C_Usuarios extends Controlador{
    private $modelo;

    public function __construct(){
        parent::__construct(); //ejecutar el constructor padre
        $this->modelo= new M_Usuarios();
    }
    public function vistaInicio(){
        //echo 'He llegado al metodo vistaInicio';
        //$v= new Vista();
        //$v->render('vistas/Usuarios/V_Usuarios_Inicio.php');
        
        //En lugar de crear un objeto y llamar al metodo, como
        //el metodo es static lo llamo directamente:
        Vista::render('vistas/Usuarios/V_Usuarios_Inicio.php');
    }

    public function buscar($datos){
        if(!isset($datos['filasPagina']) 
                    || !is_numeric($datos['filasPagina'])
                    || !isset($datos['pagina'])
                    || !is_numeric($datos['pagina'])){
            //Por si no lo recibimos, le damos un valor por defecto
            $datos['pagina']=1;
            $datos['filasPagina']=10;
        }


        //consultar BD, los usuarios
        $usuarios=$this->modelo->buscarUsuarios($datos);
        //echo json_encode($usuarios);

        //generar la vista de resultados
        Vista::render('vistas/Usuarios/V_Usuarios_Listado.php', $usuarios);
        
        //visualizar paginador:
        $datos['contar']='S';
        $datos['totalFilas']=$this->modelo->buscarUsuarios($datos);
        Vista::render('vistas/Paginador/V_Paginador.php', $datos);
        

    }

    public function editarNuevo($datos){
        // echo json_encode($datos);
        if($datos['id_Usuario']==''){ //nuevo
            Vista::render('vistas/Usuarios/V_Usuarios_EditarNuevo.php');
        }else{ //editar
            $usuarios=$this->modelo->buscarUsuarios($datos);
            // echo json_encode($datos);
            if(empty($usuarios) || sizeof($usuarios)>1){
                echo 'Usuario no encontrado.';
            }else{
                Vista::render('vistas/Usuarios/V_Usuarios_EditarNuevo.php', $usuarios[0]);
            }
        }
    }

    public function cambiarEstadoUsuario($datos){
        $numFilas=$this->modelo->cambiarActivo(array('id_Usuario'=>$datos['id_Usuario']));
        $filas=$this->modelo->buscarUsuarios(array('id_Usuario'=>$datos['id_Usuario']));
        echo $filas[0]['activo'];
    }

    public function eliminarUsuario($datos){
        $filas=$this->modelo->borrarUsuario(array('id_Usuario'=>$datos['id_Usuario']));
    }

    public function guardar($datos){
        $id_Usuario=$datos['id_Usuario'];
        $CV=$datos['CV'];
        $login=$datos['login'];

        $respuesta=array('mensaje'=>'', 
                        'correcto'=>'S', 
                        'camposErroneos'=>array());
        if($CV!=md5(session_id().$id_Usuario)){
            $respuesta['correcto']='N';
            $respuesta['mensaje']='Intento de modificacion fraudulento.';
        }else{

            if($id_Usuario==''){ //nuevo usuario
                //¿se repite el login?
                $filas=$this->modelo->buscarUsuarios(array('login'=>$login));
                if(!empty($filas)){ //login ya existe
                    $respuesta['correcto']='N';
                    $respuesta['mensaje']='Login repetido.';
                    $respuesta['camposErroneos']['login']='Error';
                }else{//login nuevo
                    $id=$this->modelo->insertarUsuario($datos);
                    if($id!='' && is_numeric($id)){
                        $respuesta['mensaje']='Se ha creado correctamente.';
                    }else{ //no se ha insertado
                        $respuesta['correcto']='N';
                        $respuesta['mensaje']='NO se ha podido crear.';
                    }
                }

                
            }else{ //modificacion usuario
                $filas=$this->modelo->buscarUsuarios(array('login'=>$login));
                if(!empty($filas) && $filas[0]['id_Usuario']!=$id_Usuario){ 
                    //login ya existe y es otro usuario
                    $respuesta['correcto']='N';
                    $respuesta['mensaje']='Login repetido.';
                    $respuesta['camposErroneos']['login']='Error';
                }else{//login nuevo
                    $numFilas=$this->modelo->actualizarUsuarioPorId($datos);
                    if($numFilas!='' && ($numFilas=='1' || $numFilas=='0') ){
                        $respuesta['mensaje']='Se ha modificado correctamente.';
                    }else{ //no se ha insertado
                        $respuesta['correcto']='N';
                        $respuesta['mensaje']='NO se ha podido modificar.';
                    }
                    echo $numFilas; 
                }
            } 
        }
            
        echo json_encode($respuesta);
    }

    public function vistaLogin(){
        Vista::render('vistas/Usuarios/V_Usuarios_Login.php');
    }

    public function logearUsuario($datos){

        session_start();
        if($datos['login']=='' || $datos['pass']==''){ 
            Vista::render('vistas/Usuarios/V_Usuarios_Login.php');
        }else{
            $usuarios=$this->modelo->buscarUsuarios($datos);
            if(empty($usuarios) || sizeof($usuarios)>1){
                echo '<div class="alert alert-danger mt-2">
                <strong>Error: </strong> Usuario no encontrado
                </div>';
                // echo json_encode($_SESSION['usuario']);
                Vista::render('vistas/Usuarios/V_Usuarios_Login.php');
            }else{
                $_SESSION['usuario'] = $usuarios[0]['login'];
                // echo json_encode($usuarios[0]['login']);
                // echo "BIENVENIDO  $$usuarios[0]['nombre']";    
                // Vista::render('vistas/V_Menu.php', $usuarios[0]);
            }
        }
    }

    public function logoutUsuario(){
        echo json_encode("HAS SALIDO");
        session_start();
        unset($_SESSION['usuario']);
    }

}
  

?>