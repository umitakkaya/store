<?php declare(strict_types=1);

namespace Store\Infrastructure;

use Psr\Log\LoggerInterface;

class LoggingMessageBus implements MessageBus
{
	/** @var LoggerInterface */
	private $logger;

	public function __construct(LoggerInterface $logger)
	{
		$this->logger = $logger;
	}

	/**
	 * @param Message[] $messages
	 */
	public function publish(array $messages): void
	{
		foreach ($messages as $message)
		{
			$this->logger->info(
				'message published',
				[
					'headers' => $message->getHeaders(),
					'attributes' => $message->getAttributes()
				]
			);
		}
	}
}
