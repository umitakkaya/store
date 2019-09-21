<?php declare(strict_types=1);

namespace Store\Domain;

class CartItem
{
	private $item;
	private $quantity;

	public function __construct(Item $item, int $quantity)
	{
		$this->item = clone $item;
		$this->quantity = $quantity;
	}

	public function getItem(): Item
	{
		return $this->item;
	}

	public function getQuantity(): int
	{
		return $this->quantity;
	}
}
