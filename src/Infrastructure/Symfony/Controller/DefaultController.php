<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Infrastructure\Symfony\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

final class DefaultController
{
	public function __invoke()
	{
		$redirect = new RedirectResponse('http://www.atic.cl');
		return $redirect;
	}
}