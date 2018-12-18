<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Domain;


interface RegisterRepository
{
	public function createUser(UserEntry $userEntry): void;
}