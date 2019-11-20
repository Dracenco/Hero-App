<?php

abstract class Character
{
	protected $health;
	protected $strength;
	protected $defence;
	protected $speed;
	protected $luck;


	abstract public function attack();
	abstract public function defend($opponentStrength);
	abstract public function getName();

	/**
	 * @return mixed
	 */
	public function getHealth()
	{
		return $this->health;
	}

	/**
	 * @param mixed $health
	 */
	public function setHealth($health)
	{
		$this->health = $health;
	}

	/**
	 * @return mixed
	 */
	public function getStrength()
	{
		return $this->strength;
	}

	/**
	 * @param mixed $strength
	 */
	public function setStrength($strength)
	{
		$this->strength = $strength;
	}

	/**
	 * @return mixed
	 */
	public function getDefence()
	{
		return $this->defence;
	}

	/**
	 * @param mixed $defence
	 */
	public function setDefence($defence)
	{
		$this->defence = $defence;
	}

	/**
	 * @return mixed
	 */
	public function getSpeed()
	{
		return $this->speed;
	}

	/**
	 * @param mixed $speed
	 */
	public function setSpeed($speed)
	{
		$this->speed = $speed;
	}

	/**
	 * @return mixed
	 */
	public function getLuck()
	{
		return $this->luck;
	}

	/**
	 * @param mixed $luck
	 */
	public function setLuck($luck)
	{
		$this->luck = $luck;
	}
}