<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Infrastructure;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

final class RegisterController extends AbstractController
{

	public function __invoke(Request $request, UserPasswordEncoderInterface $encoder)
	{
		// TODO: Implement the best SOLID __invoke() method.
	}

}