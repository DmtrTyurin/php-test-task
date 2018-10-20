<?php

namespace Figures;

require_once dirname(dirname(__FILE__)).'/interface/figureInterface.php';

class Triangle implements Figure
{
	private $a;
	private $b;
	private $c;
	
	public function __construct($a, $b, $c)
	{
		$this->a = $a;
		$this->b = $b;
		$this->c = $c;
	}

	public function Area()
	{
		$a=$this->a;
		$b=$this->b;
		$c=$this->c;
		$p=($a+$b+$c)/2;		
		$s=sqrt($p*($p-$a)*($p-$b)*($p-$c));
		return $s;
	}
}