<?php declare(strict_types=1);

namespace Store\Domain;

use ArrayIterator;
use IteratorAggregate;
use Store\Domain\Event\EventRecorder;
use Store\Domain\Event\CartItemAddedEvent;
use Traversable;

class Cart implements IteratorAggregate
{
	use EventRecorder;

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

		$this->events[] = new CartItemAddedEvent($this, $item);

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
