<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Shared\Uuid\Domain;

final class UuidEntry
{
	private $uuid;

	public function __construct(string $uuid)
	{
		$this->uuid = $uuid;
	}

	public function value(): string
	{
		return $this->uuid;
	}

}