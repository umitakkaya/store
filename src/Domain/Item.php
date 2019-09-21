<?php declare(strict_types=1);

namespace Store\Domain;

use Ramsey\Uuid\UuidInterface;

class Item
{
	/** @var UuidInterface */
	private $id;

	/** @var string */
	private $name;

	/** @var float */
	private $price;

	public function __construct(UuidInterface $id, string $name, float $price)
	{
		$this->id    = $id;
		$this->name  = $name;
		$this->price = $price;
	}

	public function getId(): UuidInterface
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	public function getPrice(): float
	{
		return $this->price;
	}
}
