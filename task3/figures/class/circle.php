<?php

namespace Figures;

require_once dirname(dirname(__FILE__)).'/interface/figureInterface.php';

class Circle implements Figure
{
	private $radius;
	
	public function __construct($r)
	{
		$this->radius = $r;
	}

	public function Area()
	{
		return pi() * pow($this->radius, 2);
	}
}