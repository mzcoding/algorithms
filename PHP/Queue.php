<?php declare(strict_types=1);

namespace Algorithms;

use Exception;

class Queue
{
	protected array $queue = [];

	public function __construct() {}

	public function enqueue($item): void
	{
		$this->queue[] = $item;
	}

	public function dequeue()
	{
		if (!$this->isEmpty()) {
			return array_shift($this->queue);
		}

		throw new Exception('Wrong element in this queue');
	}

	public function isEmpty(): bool
	{
		return empty($this->stack);
	}
}