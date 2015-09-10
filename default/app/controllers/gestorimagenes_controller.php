<?php
Load::models('imagenes');

class GestorimagenesController extends AppController {

	public function create()
    {
        $nombrearchivo = $_FILES["imagen"]['name'];

        if ($nombrearchivo != "") {
            if ($ext = explode('.', $nombrearchivo)) {

                $nombresinext = reset($ext);
                $ext = '.' . end($ext);
            } else {
                $ext = NULL;
            }

            if (!is_dir(APP_IMGS)) {
                mkdir(APP_IMGS . '/', 0777, true);
            }

            $path = APP_IMGS . '/';
            $archivo = Upload::factory("imagen", 'file');
            $archivo->setPath($path);
            $archivo->setExtensions(array('jpg', 'jpeg', 'png')); //le asignamos las extensiones a permitir
            $archivo->setMaxSize('10485760'); //le asignamos el tamaño maximo del archivo
            $archivo->overwrite($nombresinext, true); //fijamos que pueda sobreescribir el requisito si lo actualiza*/

            if ($archivo->isUploaded()) {
                $archivo->save($nombresinext);
                $imagen = new Imagenes();
                $imagen->nombre = APP_IMAGES . $nombresinext . $ext;
                $imagen->save();
                Flash::valid('Guardado exitosamente');
            } else {
                Flash::warning('No se ha Podido Subir la imagen');
            }
        }
        Redirect::to('/');
    }

    public function buscar(){

    }
}
?>