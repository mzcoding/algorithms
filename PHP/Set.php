<?php declare(strict_types=1);
namespace Algorithms;

class Set
{
   private array $set;

   public function add(mixed $element): void
   {
	   $this->set[] = $element;
   }

   public function list(): array
   {
	   return $this->set;
   }

   public function delete(mixed $element): void
   {
	   if (($key = array_search($element, $this->set)) !== false) {
		   unset($this->set[$key]);
	   }
   }
}