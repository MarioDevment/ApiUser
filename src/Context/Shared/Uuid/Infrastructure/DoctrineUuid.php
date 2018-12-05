<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Shared\Uuid\Infrastructure;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;
use MarioDevment\ApiUser\Context\Shared\Uuid\Application\Uuid4;

class DoctrineUuid extends AbstractIdGenerator
{

	public function generate(EntityManager $em, $entity): string
	{
		$repository = new UuidGenerator();
		$generator = new Uuid4($repository);

		$uuid4 = $generator->__invoke();

		return $uuid4->value();
	}
}