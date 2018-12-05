<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Shared\Uuid\Infrastructure;

use MarioDevment\ApiUser\Context\Shared\Uuid\Domain\Repository;
use Ramsey\Uuid\Uuid as RUuid;
use Symfony\Component\HttpKernel\Exception\HttpException;

final class UuidGenerator implements Repository
{
	public function uuid(): string
	{
		try {
			$uuid4 = RUuid::uuid4();
			return $uuid4->toString();
		} catch (\Exception $e) {
			throw new HttpException(500, 'Caught exception: ' . $e->getMessage());
		}
	}
}