<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Infrastructure\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="user");
 * @ORM\Entity(repositoryClass="MarioDevment\ApiUser\Infrastructure\Doctrine\Repository\UserRepository");
 */
final class User implements UserInterface
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="string", unique=true, length=36)
	 * @ORM\GeneratedValue(strategy="CUSTOM")
	 * @ORM\CustomIdGenerator(class="MarioDevment\ApiUser\Context\Shared\Uuid\Infrastructure\DoctrineUuid")
	 */
	private $id;
	/**
	 * @ORM\Column(type="string", unique=true)
	 */
	private $username;
	/**
	 * @ORM\Column(type="string", unique=true)
	 */
	private $email;
	/**
	 * @ORM\Column(type="string")
	 */
	private $password;
	/**
	 * @ORM\Column(type="string")
	 */
	private $roles;
	/**
	 * @ORM\Column(type="string")
	 */
	private $salt;

	public function __construct(string $username, string $email, string $password, string $salt, string $roles)
	{
		$this->username = $username;
		$this->password = $password;
		$this->roles    = $roles;
		$this->salt     = $salt;
		$this->email    = $email;
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function getUsername(): string
	{
		return $this->username;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function getPassword(): string
	{
		return $this->password;
	}

	public function getRoles(): array
	{
		$roles   = explode(',', $this->roles);
		$roles[] = 'ROLE_USER';

		$result = array_filter($roles);
		return array_unique($result);
	}

	public function getSalt(): string
	{
		return $this->salt;
	}

	public function eraseCredentials(): void
	{
	}
}