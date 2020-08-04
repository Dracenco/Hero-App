<?php

class Orderus extends Character implements AttackAbilities, DefenceAbilities
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

    public function rapidStrike()
    {
        return (rand(0,100) <= 10);
    }

    public function magicShield()
    {
        return (rand(0,100) <= 20);
    }

	public function attack()
	{
		return $this->rapidStrike() ? $this->strength * 2 : $this->strength;
	}

	public function defend($opponentStrength)
	{

		$magicShield = $this->magicShield();
        $damage = $opponentStrength - $this->defence;
        $damage = ($magicShield ? $damage / 2 : $damage);
        $result = ['name'=>$this->getName()];
        $magicShield ? $result['skills'] = 's-a folosit magic shield' : $result['skills'] = 'nu s-a folosit nici o abilitate';
        if ($this->luck >= rand(0,100)){
			$result['result'] ='ratat lovitura';
		}else {
			$result["result"] = "lovit cu succes";
			$this->health -= $damage;
		}
		$result["health"] = $this->health;
		$result["damage"] = $damage;
		return $result;
	}


}
