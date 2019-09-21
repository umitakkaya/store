<?php declare(strict_types=1);

namespace Store\Infrastructure;

interface MessageBus
{
	/**
	 * @param Message[] $messages
	 */
	public function publish(array $messages): void;
}
