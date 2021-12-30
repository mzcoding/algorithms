<?php declare(strict_types=1);

abstract class Question
{
    protected string $prompt;
	protected Marker $marker;

	public function __construct(string $prompt, Marker $marker)
	{
		$this->marker = $marker;
		$this->prompt = $prompt;
	}

	public function mark(string $response): bool
	{
		return $this->marker->mark($response);
	}
}

class TextQuestion extends Question {
	//Text question actions
}

class AVQuestion extends Question {
	//Multi media questions
}

abstract class Marker
{
	protected string $test;

	public function __construct(string $test)
	{
		$this->test = $test;
	}

	abstract function mark(string $response): bool;
}

class MarkLogicMarker extends Marker
{
	private $engine;

	public function __construct(string $test)
	{
		parent::__construct($test);
		//$this->engine = new MarkParse($test);
	}

	function mark(string $response): bool
	{
		// $this->engine->evalute($response);

		return true; //dummy response
	}
}

class MatchMaker extends Marker
{
	function mark(string $response): bool
	{
		return ($this->test === $response);
	}
}

class RegexMarker extends Marker
{
	function mark(string $response): bool
	{
		return boolval(preg_match($this->test, $response));
	}
}

//clients' code

$markers = [
	new RegexMarker("/Во.мь/"),
	new MatchMaker("Восемь"),
	new MarkLogicMarker('$input equals "Восемь"')
];


foreach($markers as $marker) {
	print get_class($marker) ."\n";
	$question = new TextQuestion("Сколько планет в солнечной системе?", $marker);
	$answers = [
		"Семь", "Восемь", "Девять", "Десять"
	];
	foreach ($answers as $answer) {
		print "Ответ: $answer: ";
		if($question->mark($answer)) {
			print "Правильно! \n";
		}else {
			print "Неверно! \n";
		}
	}
}