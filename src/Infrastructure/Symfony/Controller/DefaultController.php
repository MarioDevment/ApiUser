<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Infrastructure\Symfony\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final class DefaultController extends AbstractController
{
	public function __invoke()
	{
		$user = $this->getUser();

		$normalizer = new ObjectNormalizer();
		$encoder    = new JsonEncoder();

		$serializer = new Serializer([$normalizer], [$encoder]);
		return new Response(
			$serializer->serialize($user, 'json'),
			Response::HTTP_OK,
			['content-type' => 'application/json']
		);
	}
}