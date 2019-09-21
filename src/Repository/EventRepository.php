<?php declare(strict_types=1);

namespace Store\Repository;

use Store\Domain\Event\Event;
use Store\Infrastructure\MessageBus;
use Store\Repository\Mapper\EventMapper;

class EventRepository
{
	private $messageBus;
	private $mapper;

	public function __construct(MessageBus $messageBus, EventMapper $mapper)
	{
		$this->messageBus = $messageBus;
		$this->mapper = $mapper;
	}

	/**
	 * @param Event[] $events
	 */
	public function publish(array $events): void
	{
		$this->messageBus->publish(
			$this->mapper->mapEventsToMessages($events)
		);
	}
}
