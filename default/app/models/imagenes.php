<?php
class Imagenes extends ActiveRecord
{
	public function initialize()
	{
		$this->validates_uniqueness_of('nombre');
	}

	public function buscar()
	{
		return $this->find('order: nombre');
	}
}
?> 