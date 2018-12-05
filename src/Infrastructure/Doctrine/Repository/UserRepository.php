<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Infrastructure\Doctrine\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

final class UserRepository extends EntityRepository implements UserLoaderInterface
{
	public function loadUserByUsername($username)
	{
		try {
			return $this->createQueryBuilder('u')
				->where('u.username = :username OR u.email = :email')
				->setParameter('username', $username)
				->setParameter('email', $username)
				->getQuery()
				->getOneOrNullResult();
		} catch (NonUniqueResultException $e) {
			throw new UsernameNotFoundException(
				sprintf('"%s" it\'s is invalid login.', $username)
			);
		}
	}
}