<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Application;

use MarioDevment\ApiUser\Context\Users\Domain\EncoderRepository;
use MarioDevment\ApiUser\Context\Users\Domain\RegisterRepository;
use MarioDevment\ApiUser\Context\Users\Domain\UserEntry;
use MarioDevment\ApiUser\Context\Users\Domain\ValueObjects\Password;
use MarioDevment\ApiUser\Context\Users\Domain\ValueObjects\UserEmail;
use MarioDevment\ApiUser\Context\Users\Domain\ValueObjects\Username;

final class Register
{
	private $registerRepository;
	private $encoderRepository;

	public function __construct(RegisterRepository $registerRepository, EncoderRepository $encoderRepository)
	{
		$this->registerRepository = $registerRepository;
		$this->encoderRepository  = $encoderRepository;
	}

	public function __invoke(string $rawUsername, string $rawEmail, string $rawPassword): UserEntry
	{
		$username  = new Username($rawUsername);
		$userEmail = new UserEmail($rawEmail);
		$password  = new Password($rawPassword, $this->encoderRepository);

		$user = new UserEntry($username, $userEmail, $password);

		$this->registerRepository->createUser($user);

		return $user;
	}
}