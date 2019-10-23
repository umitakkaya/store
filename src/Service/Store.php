<?php declare(strict_types=1);

namespace Store\Service;

use Store\Domain\Cart;
use Store\Domain\User;
use Store\Event\EventHandler;
use Store\Repository\UserRepository;

class Store
{
	/** @var UserRepository */
	private $userRepository;

	/** @var EventHandler */
	private $eventHandler;

	public function __construct(UserRepository $userRepository, EventHandler $eventHandler)
	{
		$this->userRepository = $userRepository;
		$this->eventHandler   = $eventHandler;
	}

	public function checkout(User $user): void
	{
		$user->pay();

		$this->userRepository->persist($user);

		$this->eventHandler->publish($user->getCart()->pullEvents());
		$this->eventHandler->publish($user->pullEvents());
	}
}
