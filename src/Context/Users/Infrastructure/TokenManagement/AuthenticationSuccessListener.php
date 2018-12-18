<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Infrastructure\TokenManagement;


use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\Security\Core\User\UserInterface;

final class AuthenticationSuccessListener
{
	public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
	{
		$data = $event->getData();
		$user = $event->getUser();

		if (!$user instanceof UserInterface) {
			return;
		}

		$data['data'] = [
			'roles' => $user->getRoles()
		];

		$event->setData($data);
	}
}