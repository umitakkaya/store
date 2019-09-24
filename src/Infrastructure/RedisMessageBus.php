<?php declare(strict_types=1);

namespace Store\Infrastructure;

use Predis\Client;

class RedisMessageBus implements MessageBus
{
	/** @var Client */
	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	/**
	 * @param Message[] $messages
	 */
	public function publish(array $messages): void
	{
		foreach ($messages as $message)
		{
			$this->client->publish(
				$message->getName(),
				json_encode([
					'headers' => $message->getHeaders(),
					'attributes' => $message->getAttributes()
				])
			);
		}
	}
}
