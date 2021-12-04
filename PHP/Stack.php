<?php declare(strict_types=1);

namespace Algorithms;

use Exception;

class Stack
{
	protected array $stack = [];

	public function __construct()
	{
	}

	public function push(mixed $item): void
	{
		$this->stack[] = $item;
	}

	public function pop(): mixed
	{
		if (!$this->isEmpty()) {
			return array_pop($this->stack);
		}

		throw new Exception('Wrong element in this stack');
	}

	public function isEmpty(): bool
	{
		return empty($this->stack);
	}
}