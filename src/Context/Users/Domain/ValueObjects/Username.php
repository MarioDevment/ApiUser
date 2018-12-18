<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Domain\ValueObjects;

final class Username
{
	private $username;

	public function __construct(string $username)
	{
		$this->username = $username;
	}

	public function value(): string
	{
		return $this->username;
	}

}