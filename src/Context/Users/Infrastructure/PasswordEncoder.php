<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Infrastructure;

use MarioDevment\ApiUser\Context\Users\Domain\EncoderRepository;
use MarioDevment\ApiUser\Infrastructure\Doctrine\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

final class PasswordEncoder implements EncoderRepository
{
	private $encoder;

	public function __construct(UserPasswordEncoderInterface $encoder)
	{
		$this->encoder = $encoder;
	}

	public function encode(String $password): string
	{
		$user = new User();
		return $this->encoder->encodePassword($user, $password);
	}
}