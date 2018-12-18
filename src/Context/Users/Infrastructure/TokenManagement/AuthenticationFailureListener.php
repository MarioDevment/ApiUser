<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Infrastructure\TokenManagement;


use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;

final class AuthenticationFailureListener
{
	public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event)
	{
		$data = [
			'status'  => '401 Unauthorized',
			'message' => 'Bad credentials, please verify that your username/password are correctly set',
		];

		$response = new JWTAuthenticationFailureResponse($data);

		$event->setResponse($response);
	}

}