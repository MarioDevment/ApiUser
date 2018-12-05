<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Infrastructure;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class LoginController extends AbstractController
{
	public function logged()
	{
		$user = $this->getUser();

		return $this->json([
			'username' => $user->getUsername(),
			'roles'    => $user->getRoles(),
		]);
	}
}