<?php declare(strict_types=1);

namespace Store\Domain;

use Store\Domain\Event\EventRecorder;
use Store\Domain\Event\UserPlacedOrderEvent;

class User
{
	use EventRecorder;

	/** @var Cart */
	private $cart;

	public function __construct(Cart $cart)
	{
		$this->cart = $cart;
	}

	public function getCart(): Cart
	{
		return $this->cart;
	}

	public function order(Item $item, int $quantity): void
	{
		$cartItem = new CartItem($item, $quantity);

		$this->cart->add($cartItem);
	}

	public function pay(): void
	{
		//process the payment for the items in the cart

		$this->events[] = new UserPlacedOrderEvent($this, $this->cart);

		$this->cart->empty();
	}
}
