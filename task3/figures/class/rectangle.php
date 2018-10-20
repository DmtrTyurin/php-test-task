<?php

namespace Figures;

require_once dirname(dirname(__FILE__)).'/interface/figureInterface.php';

class Rectangle implements Figure
{
	private $width;
	private $height;
	
	public function __construct($x, $y)
	{
		$this->width = $x;
		$this->height = $y;
	}

	public function Area()
	{
		return $this->width * $this->height;
	}
}