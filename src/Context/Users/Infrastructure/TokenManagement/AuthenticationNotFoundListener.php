<?php

namespace MarioDevment\ApiUser\Context\Users\Infrastructure\TokenManagement;


use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTNotFoundEvent;
use Symfony\Component\HttpFoundation\JsonResponse;

final class AuthenticationNotFoundListener
{
	public function onJWTNotFound(JWTNotFoundEvent $event)
	{
		$data = [
			'status'  => '403 Forbidden',
			'message' => 'Missing token',
		];

		$response = new JsonResponse($data, 403);

		$event->setResponse($response);
	}
}