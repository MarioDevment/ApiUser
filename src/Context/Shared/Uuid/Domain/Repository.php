<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Shared\Uuid\Domain;

interface Repository
{
	public function uuid(): string;
}