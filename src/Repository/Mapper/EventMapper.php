<?php declare(strict_types=1);

namespace Store\Repository\Mapper;

use RuntimeException;
use Store\Domain\Event\Event;
use Store\Domain\Event\UserAddedCartItemEvent;
use Store\Domain\Event\UserPlacedOrderEvent;
use Store\Infrastructure\Message;

class EventMapper
{
	/**
	 * @param Event[] $events
	 *
	 * @return Message[]
	 */
	public function mapEventsToMessages(array $events): array
	{
		return array_map([$this, 'mapEventToMessage'], $events);
	}

	private function mapEventToMessage(Event $event): Message
	{
		return new Message(
			$event->getName(),
			$this->mapEventAttributes($event)
		);
	}

	private function mapEventAttributes(Event $event): array
	{
		if ($event instanceof UserPlacedOrderEvent)
		{
			return [ /* mapped event specific attributes */ ];
		}

		if ($event instanceof UserAddedCartItemEvent)
		{
			return [ /* mapped event specific attributes */ ];
		}

		throw new RuntimeException('Invalid event');
	}
}
