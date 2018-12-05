<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Shared\Uuid\Application;

use MarioDevment\ApiUser\Context\Shared\Uuid\Domain\Repository;
use MarioDevment\ApiUser\Context\Shared\Uuid\Domain\UuidEntry;

final class Uuid4
{
	private $repository;

	public function __construct(Repository $repository)
	{
		$this->repository = $repository;
	}

	public function __invoke(): UuidEntry
	{
		$uuid = new UuidEntry($this->repository->uuid());
		return $uuid;
	}
}