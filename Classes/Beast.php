<?php
require_once('Classes/Character.php');
class Beast extends Character
{

	public function __construct()
	{
		$this->health = rand(60,90);
		$this->strength = rand(60,90);
		$this->defence = rand(40,60);
		$this->speed = rand(40,60);
		$this->luck = rand(25,40);
	}

	public function getName()
	{
		return 'Beast';
	}

	public function attack()
	{
		return $this->strength;
	}

	public function defend($opponentStrength)
	{
		$damage = $opponentStrength - $this->defence;
		$result = ['name'=>$this->getName()];

		if ($this->luck >= rand(0,100)){
			$result["result"] = "missed";
		}else {
			$result["result"] = "success";
			$this->health -= $damage;
		}
		$result["health"] = $this->health;
		$result["damage"] = $damage;
		return $result;
	}
}
