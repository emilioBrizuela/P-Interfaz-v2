<?php
require_once 'modelos/DAO.php';

class M_Menu{
    private $DAO;

    public function __construct(){
        $this->DAO=new DAO();
    }

    public function buscarOpciones(){
        $SQL = "select * from menu";
        $menu=$this->DAO->consultar($SQL);
        return $menu;

        
    }
}