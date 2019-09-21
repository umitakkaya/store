<?php declare(strict_types=1);

namespace Store\Domain\Event;

use Store\Domain\Cart;
use Store\Domain\CartItem;

class UserAddedCartItemEvent implements Event
{
	public const NAME = 'store.user.added_cart_item';

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
