<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Infrastructure;

use MarioDevment\ApiUser\Infrastructure\Doctrine\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

final class RegisterController extends AbstractController
{

	public function __invoke(Request $request, UserPasswordEncoderInterface $encoder): Response
	{
		$username      = $request->request->get('_username');
		$plainPassword = $request->request->get('_password');
		$email         = $request->request->get('_email');

		$user     = new User($username, $email);
		$password = $encoder->encodePassword($user, $plainPassword);
		$user->setEncodePassword($password);

		$em = $this->getDoctrine()->getManager();
		$em->persist($user);
		$em->flush();

		return new Response(
			'ok',
			Response::HTTP_OK,
			['content-type' => 'application/json']
		);
	}

}