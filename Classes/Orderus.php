<?php
require_once('Classes/Character.php');
class Orderus extends Character
{

	public function __construct()
	{
		$this->health = rand(70,100);
		$this->strength = rand(70,80);
		$this->defence = rand(45,55);
		$this->speed = rand(40,50);
		$this->luck = rand(10,30);
	}
	public function getName()
	{
		return 'Orderus';
	}

	private function rapidStrike()
	{
		return (rand(0,100) <= 10);
	}
	public function attack()
	{
		return $this->rapidStrike() ? $this->strength*2 : $this->strength;
	}

	private function magicShield()
	{
		return (rand(0,100) <= 20);
	}
	public function defend($opponentStrength)
	{
		$magicShield = $this->magicShield();
		$damage = $opponentStrength - $this->defence;
		$damage = ($magicShield ? $damage / 2 : $damage);
		$result = ['name'=>$this->getName()];

		if ($this->luck >= rand(0,100)){
			$result['result'] ='missed';
		}else {
			$result["result"] = "success";
			$this->health -= $damage;
		}
		$result["health"] = $this->health;
		$result["damage"] = $damage;
		return $result;
	}
}
