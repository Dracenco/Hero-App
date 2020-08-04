<?php

use Symfony\Component\HttpFoundation\Response;

require_once('autoloader/autoload.php');

class Hero
{
	private $beast;
	private $orderus;

	public function __construct()
	{
		$this->beast = new \Beast();
		$this->orderus = new \Orderus();
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
			    echo $players[$currentAttacker]->getName() . " A Castigat! <br><br>";
			    echo "Dupa " . $i . " runde " . $players[$currentDefender]->getName() . " a fost invins. <br><br> Detaliile bataliei:<br> ";
				break;
			}
			list($currentAttacker,$currentDefender) = array($currentDefender,$currentAttacker);
		}

		foreach ($rounds as $round) {

            vprintf(
                "<br> <br> Runda noua <br> ============ <br>Se apara : %s, <br> Oponentul ataca cu o putere de : %s,<br>  %s, <br> Oponentul a : %s,<br> viata ramasa :  %s <br> ============ <br> ", [
                $round['name'],
                $round['damage'],
                $round['skills'],
                $round['result'],
                $round['health']
            ]);

		}
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
		return $defender->defend($attacker->attack());
	}

	/**.
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


