<?php declare(strict_types=1);

namespace Store\Domain\Event;

trait EventRecorder
{
	/** @var Event[] */
	private $events = [];

	/** @return Event[] */
	public function pullEvents(): array
	{
		$events = $this->events;

		$this->events = [];

		return $events;
	}
}
