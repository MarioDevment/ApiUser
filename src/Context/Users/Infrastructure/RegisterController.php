<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Infrastructure;

use MarioDevment\ApiUser\Context\Users\Application\Register;
use MarioDevment\ApiUser\Context\Users\Domain\UserEntry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

final class RegisterController extends AbstractController
{
	public function __invoke(Request $request, UserPasswordEncoderInterface $encoder): Response
	{
		$username = $request->request->get('_username');
		$password = $request->request->get('_password');
		$email    = $request->request->get('_email');

		$registerRepository = new RegisterUser($this->getDoctrine());
		$encoderRepository  = new PasswordEncoder($encoder);

		$registerUser = new Register($registerRepository, $encoderRepository);

		$user = $registerUser->__invoke($username, $email, $password);

		if (!$user instanceof UserEntry) {
			throw new UsernameNotFoundException(
				sprintf('The user "%s" could not be created.', $username)
			);
		}

		return new Response(
			'ok',
			Response::HTTP_OK,
			['content-type' => 'application/json']
		);
	}

}