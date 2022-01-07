<?php declare(strict_types=1);

namespace Algorithms;

use Exception;

class ListItem
{
   private array $list = [];

   public function insert(int $index, mixed $element): void
   {
	   $this->list[$index] = $element;
   }

   public function remove(int $index): void
   {
	   if(isset($this->list[$index])) {
		   unset($this->list[$index]);
	   }
   }

	/**
	 * @throws Exception
	 */
   public function get(int $index): mixed
   {
       if(isset($this->list[$index])) {
		   return $this->list[$index];
	   }

	   throw new Exception("Wrong element");
   }

   public function sort(): void
   {
	   sort($this->list);
   }

   public function slice(int $start, int $end): void
   {
	   $length = $end - $start;
	   $this->list = array_slice($this->list, $start, $length);
   }

   public function reverse(): void
   {
	   $this->list = array_reverse($this->list);
   }
}