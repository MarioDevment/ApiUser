<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Infrastructure\TokenManagement;


use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTExpiredEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;

final class AuthenticationExpiredListener
{
	/** @var JWTAuthenticationFailureResponse */
	private $response;

	public function onJWTExpired(JWTExpiredEvent $event)
	{
		$this->response = $event->getResponse();
		$this->response->setMessage('Your token is expired, please renew it.');
	}
}