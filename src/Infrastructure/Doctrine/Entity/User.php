<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Infrastructure\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use MarioDevment\ApiUser\Context\Shared\Types\RandomDictionary;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="user");
 * @ORM\Entity(repositoryClass="MarioDevment\ApiUser\Infrastructure\Doctrine\Repository\UserRepository");
 */
final class User implements UserInterface
{
	private const LENGTH       = 32;
	private const DELIMITER    = ',';
	private const DEFAULT_ROLE = 'ROLE_USER';

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

	public function __construct(string $username, string $email, string $password, string $roles)
	{
		$this->username = $username;
		$this->password = $password;
		$this->roles    = $roles;
		$this->email    = $email;

		$randomSalt = new RandomDictionary();
		$this->salt = $randomSalt->generate(self::LENGTH);
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
		$roles   = explode(self::DELIMITER, $this->roles);
		$roles[] = self::DEFAULT_ROLE;

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