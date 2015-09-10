<?php
Load::models('imagenes');

class GestorimagenesController extends AppController {

	public function index() {
        $imagenes = new Imagenes();
        $this->campos = array('Nombre'=>'nombre','Descripcion'=>'descripcion');
        $this->imagenes = $imagenes->buscar();
	}

	public function create($nombre) {
        $imagen = new Imagenes();
        $imagen->nombre = $nombre;

		if($imagen->save())
		{
            Flash::valid('Operación exitosa');
        }
        else
        {
            Flash::error('Falló Operación');
        }
	}

	public function delete($id) {
		if($id) {
			$imagen = new Imegenes();
			if($imagen->delete((int)$id)) {
				Flash::valid('Operación exitosa');
				//Redirect::to('prueba/');
			}
			else {
				Flash::error('Falló Operación');
			}
		}
	}
}
?>