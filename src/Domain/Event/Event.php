<?php declare(strict_types=1);

namespace Store\Domain\Event;

interface Event
{
	public function getName(): string;
}
