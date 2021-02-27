<?php
require_once 'modelos/DAO.php';

class M_Permisos{
    private $DAO;

    public function __construct(){
        $this->DAO=new DAO();
    }

    public function buscarPermisos($filtros=array()){
        $texto='';
        $id_permisos='';
        $descripcion='';
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
        $SQL.="FROM app_permisos
                WHERE 1=1 ";
        if($texto!=''){
            $SQL.=" AND ( nombre LIKE '%$texto%'
                            OR descripcion LIKE '%$texto%') ";
        }
        if($id_permisos!=''){
            $SQL.=" AND id_permisos='$id_permisos' ";
        }
        if($descripcion!=''){
            $SQL.=" AND descripcion='$descripcion' ";
        }
        if($estado!=''){
            $SQL.=" AND activo='$estado' ";
        }
        $SQL.=" ORDER BY nombre ";
        if($contar!='S'){
            $SQL.=" LIMIT ".($pagina*$filasPagina-$filasPagina ).", $filasPagina ";
            //$SQL.=" LIMIT ".($filasPagina*($pagina-1)).", $filasPagina ";
        }

        $permisos=$this->DAO->consultar($SQL);
        if($contar=='S'){
            return $permisos[0]['totalFilas'];
        }else{
            return $permisos;
        }
    }

    public function cambiarActivo($datos){
        $id_permisos=$datos['id_permisos'];
        $SQL="UPDATE app_permisos
                SET activo= CASE WHEN activo='S' THEN 'N' ELSE 'S' END
                WHERE id_permisos='$id_permisos' ";
        $numFilasActualizadas=$this->DAO->actualizar($SQL);

        return $numFilasActualizadas;
    }

    public function actualizarPermisoPorId($datos){
        // echo json_encode($datos);
        $nombre='';
        $descripcion='';
        $activo='S';
        extract($datos);

        $nombre=addslashes($nombre);  //  D'or  ->  D\'or
        $descripcion=addslashes($descripcion);

        $SQL="UPDATE app_permisos SET ";

        if($activo=='S' || $activo=='N'){
            $SQL.=" activo='$activo', ";
        }

        $SQL.=" nombre='$nombre',
                descripcion='$descripcion',
                activo='$activo'";

        $SQL.=" WHERE id_permisos='$id_permisos' ";
        //echo $SQL;
        return $this->DAO->actualizar($SQL); //devuelve el num. filas actualizadas
    }

    public function insertarPermiso($datos){
        $nombre='';
        $descripcion='';
        $activo='S';
        extract($datos);
        
        $nombre=addslashes($nombre);
        $descripcion=addslashes($descripcion);

        $SQL="INSERT INTO app_permisos SET 
                nombre='$nombre',
                descripcion='$descripcion',
                activo='$activo'";
        return $this->DAO->insertar($SQL);
    }

    public function borrarPermiso($datos){
        $id_permisos='';
        extract($datos);

        $SQL="DELETE FROM app_permisos 
                WHERE id_permisos='$id_permisos' ";
        return $this->DAO->borrar($SQL); // retorna el num de filas borradas

    }


}


?>