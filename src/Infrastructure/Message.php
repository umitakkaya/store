<?php declare(strict_types=1);

namespace Store\Infrastructure;

use DateTimeImmutable;
use Ramsey\Uuid\Uuid;

class Message
{
	private $name;
	private $createdAt;
	private $attributes;

	public function __construct(string $name, array $attributes)
	{
		$this->name = $name;
		$this->attributes = $attributes;
		$this->createdAt = new DateTimeImmutable();
	}

	/**
	 * @return string[]
	 */
	public function getHeaders(): array
	{
		return [
			'X-Message-Name: ' . $this->name,
			'X-Message-Id: ' . Uuid::uuid4()->toString(),
			'X-Message-Created-At: ' . $this->createdAt->format(DATE_ATOM)
		];
	}

	public function getAttributes(): array
	{
		return $this->attributes;
	}
}
