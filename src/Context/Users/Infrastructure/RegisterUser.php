<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Infrastructure;


use Doctrine\Common\Persistence\ManagerRegistry;
use MarioDevment\ApiUser\Context\Users\Domain\RegisterRepository;
use MarioDevment\ApiUser\Context\Users\Domain\UserEntry;
use MarioDevment\ApiUser\Infrastructure\Doctrine\Entity\User;


final class RegisterUser implements RegisterRepository
{
	private $doctrine;

	public function __construct(ManagerRegistry $doctrine)
	{
		$this->doctrine = $doctrine;
	}

	public function createUser(UserEntry $userEntry): void
	{
		$userEntity = new User();
		$userEntity->setUsername($userEntry->username()->value());
		$userEntity->setUserEmail($userEntry->email()->value());
		$userEntity->setEncodePassword($userEntry->password()->encodedValue());

		$entityManager = $this->doctrine->getManager();
		$entityManager->persist($userEntity);
		$entityManager->flush();
	}
}