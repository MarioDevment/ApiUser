<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Infrastructure\TokenManagement;


use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;

final class CreateTokenListener
{
	private $requestStack;

	public function __construct(RequestStack $requestStack)
	{
		$this->requestStack = $requestStack;
	}

	public function onJWTCreated(JWTCreatedEvent $event)
	{
		$request = $this->requestStack->getCurrentRequest();

		$payload       = $event->getData();
		$payload['ip'] = $request->getClientIp();

		$event->setData($payload);

		$header        = $event->getHeader();
		$header['prov'] = 'MHG';

		$event->setHeader($header);
	}
}