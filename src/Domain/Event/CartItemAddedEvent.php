<?php declare(strict_types=1);

namespace Store\Domain\Event;

use Store\Domain\Cart;
use Store\Domain\CartItem;

class CartItemAddedEvent implements Event
{
	public const NAME = 'store.cart.item_added';

	/** @var Cart */
	private $cart;

	/** @var CartItem */
	private $addedItem;

	public function __construct(Cart $cart, CartItem $addedItem)
	{
		$this->cart = clone $cart;
		$this->addedItem = clone $addedItem;
	}

	public function getName(): string
	{
		return self::NAME;
	}

	public function getAddedCartItem(): CartItem
	{
		return $this->addedItem;
	}

	public function getCart(): Cart
	{
		return $this->cart;
	}
}
