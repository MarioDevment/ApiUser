<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Domain;

use MarioDevment\ApiUser\Context\Users\Domain\ValueObjects\Password;
use MarioDevment\ApiUser\Context\Users\Domain\ValueObjects\UserEmail;
use MarioDevment\ApiUser\Context\Users\Domain\ValueObjects\Username;

class UserEntry
{
	private $username;
	private $email;
	private $password;

	public function __construct(Username $username, UserEmail $email, Password $password)
	{
		$this->username = $username;
		$this->email    = $email;
		$this->password = $password;
	}

	public function username(): Username
	{
		return $this->username;
	}

	public function email(): UserEmail
	{
		return $this->email;
	}

	public function password(): Password
	{
		return $this->password;
	}


}