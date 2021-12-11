<?php declare(strict_types=1);

abstract class Decorator
{
  abstract public function getWealthFactor(): int;
}

class Plains extends Decorator
{
	private int $wealthFactor = 2;

	public function getWealthFactor(): int
	{
		return $this->wealthFactor;
	}
}

class Title extends Decorator
{
	private int $wealthFactor = 5;

	public function getWealthFactor(): int
	{
		return $this->wealthFactor;
	}
}

abstract class TitleDecorator extends Decorator
{
	protected Decorator $decorator;

	public function __construct(Decorator $decorator)
	{
		$this->decorator = $decorator;
	}
}

// clients classes

class DiamondDecorator extends TitleDecorator
{
	public function getWealthFactor(): int
	{
		return $this->decorator->getWealthFactor()+2;
	}
}
class PollutionDecorator extends TitleDecorator
{
	public function getWealthFactor(): int
	{
		return $this->decorator->getWealthFactor()-5;
	}
}

//example 1
$title = new DiamondDecorator(
	new Plains()
);
var_dump($title->getWealthFactor());

//example 2
$title = new PollutionDecorator(
	new DiamondDecorator( new Plains() )
);
var_dump($title->getWealthFactor());