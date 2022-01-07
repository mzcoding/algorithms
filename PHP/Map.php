<?php declare(strict_types=1);

namespace Algorithms;

use Exception;

class Map
{
   private array $map;

   public function set(int $key, mixed $value): void
   {
	   $this->map[$key] = $value;
   }

   public function get(int $key): mixed
   {
	   if(isset($this->list[$key])) {
		   return $this->list[$key];
	   }

	   throw new Exception("Wrong element");
   }

   public function delete(int $key): void
   {
	   if(isset($this->map[$key])) {
		   unset($this->map[$key]);
	   }
   }
}