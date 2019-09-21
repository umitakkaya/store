<?php declare(strict_types=1);

namespace Store\Domain;

use Store\Domain\Event\Event;
use Store\Domain\Event\UserAddedCartItemEvent;
use Store\Domain\Event\UserPlacedOrderEvent;

class User
{
	/** @var Event[] */
	private $events = [];

	/** @var Cart */
	private $cart;

	public function __construct(Cart $cart)
	{
		$this->cart = $cart;
	}

	public function order(Item $item, int $quantity): void
	{
		$cartItem = new CartItem($item, $quantity);

		$this->cart->add($cartItem);

		$this->events[] = new UserAddedCartItemEvent($this->cart, $cartItem);
	}

	public function pay(): void
	{
		//process the payment for the items in the cart

		$this->events[] = new UserPlacedOrderEvent($this, $this->cart);

		$this->cart->empty();
	}

	/** @return Event[] */
	public function pullEvents(): array
	{
		$events = $this->events;

		$this->events = [];

		return $events;
	}
}
