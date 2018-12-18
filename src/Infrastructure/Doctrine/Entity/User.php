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
	private const DEFAULT_ROLE = ['ROLE_USER'];

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
	 * @ORM\Column(type="string")
	 */
	private $password;
	/**
	 * @ORM\Column(type="string", unique=true)
	 */
	private $email;
	/**
	 * @ORM\Column(type="array")
	 */
	private $roles;
	/**
	 * @ORM\Column(type="boolean")
	 */
	private $isActive;

	public function __construct()
	{
		$this->isActive = true;
		$this->roles    = self::DEFAULT_ROLE;
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
		return array_unique($this->roles);
	}

	public function setRoles($roles): void
	{
		$this->roles = $roles;
	}

	public function setEncodePassword(string $password): void
	{
		$this->password = $password;
	}

	public function setUsername(string $username): void
	{
		$this->username = $username;
	}

	public function setUserEmail(string $email): void
	{
		$this->email = $email;
	}

	public function eraseCredentials(): void
	{
	}

	public function getSalt()
	{
		return null;
	}
}