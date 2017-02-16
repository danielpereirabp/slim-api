<?php

namespace App\Auth;

class Auth
{
	protected $container;

	public function __construct($container)
	{
		$this->container = $container;
	}

	public function attempt($email, $password)
	{
		$user = $this->container->get('UserRepository')->findByEmail($email);

		if (!$user) {
			return false;
		}

		if (!password_verify($password, $user->password)) {
			return false;
		}

		return true;
	}
}
