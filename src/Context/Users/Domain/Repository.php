<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Domain;

interface Repository
{
	public function createUser(): void;
}