<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Domain\ValueObjects;

use MarioDevment\ApiUser\Context\Users\Domain\EncoderRepository;

final class Password
{
	private $password;
	private $repository;

	public function __construct(string $password, EncoderRepository $repository)
	{
		$this->password   = $password;
		$this->repository = $repository;
	}

	public function encodedValue(): string
	{
		$encodePassword = $this->repository->encode($this->password);
		return $encodePassword;
	}

}