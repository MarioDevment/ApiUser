<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Shared\Types;

use ArrayIterator;
use Countable;
use IteratorAggregate;

abstract class Collection implements Countable, IteratorAggregate
{
	private $items;

	public function __construct(array $items)
	{
		Assert::arrayOf($this->type(), $items);
		$this->items = $items;
	}

	abstract protected function type(): string;

	public function getIterator()
	{
		return new ArrayIterator($this->items());
	}

	protected function items()
	{
		return $this->items;
	}

	public function count()
	{
		return count($this->items());
	}

	protected function each(callable $fn)
	{
		foreach ($this->items() as $key => $value) {
			$fn($value, $key);
		}
	}
}
