<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Infrastructure\TokenManagement;


use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTInvalidEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;

final class AuthenticationInvalidListener
{
	public function onJWTInvalid(JWTInvalidEvent $event)
	{
		$response = new JWTAuthenticationFailureResponse('Your token is invalid, please login again to get a new one', 403);

		$event->setResponse($response);
	}
}