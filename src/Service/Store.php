<?php declare(strict_types=1);

namespace Store\Service;

use Store\Domain\User;
use Store\Repository\EventRepository;
use Store\Repository\UserRepository;

class Store
{
	/** @var UserRepository */
	private $userRepository;

	/** @var EventRepository */
	private $eventRepository;

	public function __construct(UserRepository $userRepository, EventRepository $eventRepository)
	{
		$this->userRepository = $userRepository;
		$this->eventRepository = $eventRepository;
	}

	public function checkout(User $user)
	{
		$user->pay();

		$this->userRepository->persist($user);
		$this->eventRepository->publish($user->pullEvents());
	}
}
