<?php 

require_once 'Controlador.php';
require_once 'vistas/Vista.php';
require_once 'modelos/M_Menu.php';

class C_Menu extends Controlador{
    private $modelo;

    public function __construct(){
        parent::__construct(); //ejecutar el constructor padre
        $this->modelo= new M_Menu();
    }

    public function crearMenu(){
        $datos=$this->modelo->buscarOpciones();
        Vista::render('vistas/Menu/V_Menu.php', $datos);
    }



}
