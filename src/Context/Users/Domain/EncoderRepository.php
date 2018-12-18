<?php
declare(strict_types=1);

namespace MarioDevment\ApiUser\Context\Users\Domain;


interface EncoderRepository
{
	public function encode(String $password): string;
}