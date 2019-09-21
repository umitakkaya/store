<?php declare(strict_types=1);

namespace Store\Domain\Event;

use Store\Domain\Cart;
use Store\Domain\User;

class UserPlacedOrderEvent implements Event
{
	public const NAME = 'store.user.placed_order';

	private $user;
	private $cart;

	public function __construct(User $user, Cart $cart)
	{
		$this->user = clone $user;
		$this->cart = clone $cart;
	}

	public function getName(): string
	{
		return self::NAME;
	}

	public function getUser(): User
	{
		return $this->user;
	}

	public function getCart(): Cart
	{
		return $this->cart;
	}
}
