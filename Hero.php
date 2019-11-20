<?php

use Symfony\Component\HttpFoundation\Response;

require_once('Classes/Beast.php');
require_once('Classes/Orderus.php');
require_once('Classes/Character.php');

class Hero
{
	private $beast;
	private $orderus;

	public function __construct()
	{
		$beast = new \Beast();
		$orderus = new \Orderus();
		$this->beast = $beast;
		$this->orderus = $orderus;
	}


	public function play()
	{
		$players = [1 => $this->orderus, 2 => $this->beast];
		$currentAttacker = $this->firstAttack();
		$currentDefender = ($currentAttacker == 1 ? 2 : 1);
		$rounds = [];

		for ($i = 1 ; $i <= 20 ; $i++){
			$rounds [] = $this->round($players[$currentAttacker],$players[$currentDefender]);

			if ($players[$currentDefender]->getHealth() <= 0){
				break;
			}
			list($currentAttacker,$currentDefender) = array($currentDefender,$currentAttacker);
		}

		foreach ($rounds as $round) {

			vprintf(
				"Se apara : %s, Oponentul ataca cu o putere de : %s, abilitati folosite: %s, viata ramasa :  %s <br>", [
					$round['name'],
					$round['damage'],
					'skills',
					$round['health']
				]);

		}
	}

	public function display()
	{

	}

	public function firstAttack()
	{
		if ($this->orderus->getSpeed() > $this->beast->getSpeed()){
			$primul = 1;

		} elseif ($this->orderus->getSpeed() < $this->beast->getSpeed())
		{
			$primul = 2;
		} elseif($this->orderus->getSpeed() == $this->beast->getSpeed())
		{
			if ($this->orderus->getLuck() > $this->beast->getLuck()){
				$primul = 1;
			}elseif ($this->orderus->getLuck() < $this->beast->getLuck()){
				$primul = 2;
			} elseif ($this->orderus->getLuck() == $this->beast->getLuck()){
				$primul = rand(1,2);
			}
		}
		return $primul;
	}

	public function round($attacker,$defender)
	{
		$strength = $attacker->attack();
		return $defender->defend($strength);
	}



	/**
	 * @return \Beast
	 */
	public function getBeast()
	{
		return $this->beast;
	}

	/**
	 * @param \Beast $beast
	 */
	public function setBeast($beast)
	{
		$this->beast = $beast;
	}

	/**
	 * @return \Orderus
	 */
	public function getOrderus()
	{
		return $this->orderus;
	}

	/**
	 * @param \Orderus $orderus
	 */
	public function setOrderus($orderus)
	{
		$this->orderus = $orderus;
	}
}

$jocTest = new Hero();
$primaRunda = $jocTest->play();
echo "<pre>";
var_dump($primaRunda);

