<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Domain\ValueObjects;

final class UserEmail
{
	private $email;

	public function __construct(string $email)
	{
		$this->email = $email;
	}

	public function value(): string
	{
		return $this->email;
	}
}