<?php
Load::models('imagenes');

/**
 * Controller por defecto si no se usa el routes
 * 
 */
class IndexController extends AppController
{

    public function index()
    {
        $imagenes = new Imagenes();
        $this->campos = array('Nombre'=>'nombre','Descripcion'=>'descripcion');
        $this->imagenes = $imagenes->buscar();
    }

}
