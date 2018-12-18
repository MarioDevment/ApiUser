<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Infrastructure\TokenManagement;


use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTDecodedEvent;
use Symfony\Component\HttpFoundation\RequestStack;

final class ValidatingTokenListener
{
	private $requestStack;

	public function __construct(RequestStack $requestStack)
	{
		$this->requestStack = $requestStack;
	}


	public function onJWTDecoded(JWTDecodedEvent $event)
	{
		$request = $this->requestStack->getCurrentRequest();

		$payload = $event->getPayload();

		if (!isset($payload['ip']) || $payload['ip'] !== $request->getClientIp()) {
			$event->markAsInvalid();
		}
	}
}