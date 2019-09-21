<?php declare(strict_types=1);

namespace Store\Domain;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

class Cart implements IteratorAggregate
{
	/** @var CartItem[] */
	private $items;

	/**
	 * @param CartItem[] $items
	 */
	public function __construct(array $items = [])
	{
		$this->items = $items;
	}

	public function add(CartItem $item): self
	{
		$this->items[] = $item;

		return $this;
	}

	public function empty(): void
	{
		$this->items = [];
	}

	/**
	 * @return CartItem[]|Traversable
	 */
	public function getIterator(): Traversable
	{
		return new ArrayIterator($this->items);
	}
}
