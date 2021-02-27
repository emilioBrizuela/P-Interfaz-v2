<?php
require_once 'modelos/DAO.php';

class M_Usuarios{
    private $DAO;

    public function __construct(){
        $this->DAO=new DAO();
    }

    public function buscarUsuarios($filtros=array()){
        $texto='';
        $fSexo='';
        $id_Usuario='';
        $login='';
        $estado='';
        //para el paginador:
            $contar='N';
            $pagina=1;
            $filasPagina=10;
        //fin para paginador
        extract($filtros);

        if($contar=='S'){
            $SQL="SELECT count(*) as totalFilas ";
        }else{
            $SQL="SELECT * ";
        }
        $SQL.="FROM usuarios
                WHERE 1=1 ";
        if($texto!=''){
            $SQL.=" AND ( nombre LIKE '%$texto%'
                            OR apellido_1 LIKE '%$texto%'
                            OR apellido_2 LIKE '%$texto%'
                            OR mail LIKE '%$texto%'
                            OR login LIKE '%$texto%' ) ";
        }
        if($fSexo!=''){
            $SQL.=" AND sexo='$fSexo' ";
        }
        if($login!=''){
            $SQL.=" AND login='$login' ";
        }
        if($id_Usuario!=''){
            $SQL.=" AND id_Usuario='$id_Usuario' ";
        }
        if($estado!=''){
            $SQL.=" AND activo='$estado' ";
        }
        $SQL.=" ORDER BY apellido_1, apellido_2, nombre, login ";
        if($contar!='S'){
            $SQL.=" LIMIT ".($pagina*$filasPagina-$filasPagina ).", $filasPagina ";
            //$SQL.=" LIMIT ".($filasPagina*($pagina-1)).", $filasPagina ";
        }

        $usuarios=$this->DAO->consultar($SQL);
        if($contar=='S'){
            return $usuarios[0]['totalFilas'];
        }else{
            return $usuarios;
        }
    }

    public function cambiarActivo($datos){
        $id_Usuario=$datos['id_Usuario'];

        /* $SQL="SELECT * FROM usuarios WHERE id_Usuario='$id_Usuario' ";
        $res=$this->DAO->consultar($SQL);
        if($res[0]['activo']=='S'){
            $ac='N';
        }else{
            $ac='S';
        }

        $SQL="UPDATE usuarios
                SET activo='$ac'
                WHERE id_Usuario='$id_Usuario' ";
        $numFilasActualizadas=$this->DAO->actualizar($SQL); */
        
        $SQL="UPDATE usuarios
                SET activo= CASE WHEN activo='S' THEN 'N' ELSE 'S' END
                WHERE id_Usuario='$id_Usuario' ";
        $numFilasActualizadas=$this->DAO->actualizar($SQL);

        return $numFilasActualizadas;
    }

    public function actualizarUsuarioPorId($datos){
        echo json_encode($datos);
        $id_Usuario='';
        $nombre='';
        $apellido_1='';
        $apellido_2='';
        $sexo='H';
        $mail='';
        $movil='';
        $login='';
        $fechaAlta='';
        $activo='';
        $pass='';
        extract($datos);

        $nombre=addslashes($nombre);  //  D'or  ->  D\'or
        $apellido_1=addslashes($apellido_1);
        $apellido_2=addslashes($apellido_2);
        // uf8_encode($nombre);
        // uf8_decode($nombre);

        $SQL="UPDATE usuarios SET ";

        if($pass!=''){
            $SQL.=" pass=MD5($pass), ";
        }
        if($activo=='S' || $activo=='N'){
            $SQL.=" activo='$activo', ";
        }

        $SQL.=" nombre='$nombre',
                apellido_1='$apellido_1',
                apellido_2='$apellido_2',
                sexo='$sexo',
                mail='$mail',
                movil='$movil',
                login='$login',
                fechaAlta='$fechaAlta' ";

        $SQL.=" WHERE id_Usuario='$id_Usuario' ";
        //echo $SQL;
        return $this->DAO->actualizar($SQL); //devuelve el num. filas actualizadas
    }

    public function insertarUsuario($datos){
        $nombre='';
        $apellido_1='';
        $apellido_2='';
        $sexo='H';
        $mail='';
        $movil='';
        $login='';
        $fechaAlta=date('Y-m-d');
        $activo='S';
        $pass='kjs%$l98dñjfalkjd';
        extract($datos);
        
        $nombre=addslashes($nombre);
        $apellido_1=addslashes($apellido_1);
        $apellido_2=addslashes($apellido_2);

        $SQL="INSERT INTO usuarios SET 
                nombre='$nombre',
                apellido_1='$apellido_1',
                apellido_2='$apellido_2',
                sexo='$sexo',
                mail='$mail',
                movil='$movil',
                login='$login',
                fechaAlta='$fechaAlta',
                activo='$activo',
                pass=MD5($pass) ";
              
        //$id_Usuario=$this->DAO->insertar($SQL);    
        //return $id_Usuario;
        return $this->DAO->insertar($SQL);
    }

    public function borrarUsuario($datos){
        $id_Usuario='';
        extract($datos);

        $SQL="DELETE FROM usuarios 
                WHERE id_Usuario='$id_Usuario' ";
        return $this->DAO->borrar($SQL); // retorna el num de filas borradas

    }

    public function loginUsuarios($filtros=array()){
        $login='';
        $pass='';
        $activo='S';
        extract($filtros);
        // $pass=md5($pass);

        $SQL = "SELECT COUNT(*) as contar from usuarios where  login = '$login' AND pass = md5('$pass') AND activo ='$activo' " ;
        $usuarios=$this->DAO->consultar($SQL);
        // var_dump( $usuarios[0]['contar']);
        if($usuarios[0]['contar']!="0" ){
            // var_dump($usuario);
            return $usuario;
        }
       

    }

}


?>