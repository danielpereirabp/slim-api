<?php

namespace App\Repositories;

class UserRepository extends Repository
{
	public function getAll()
	{
		return $this->db->table('users')->get(['id', 'name', 'email']);
	}

	public function findByEmail($email)
	{
		return $this->db->table('users')->where('email', $email)->first();
	}
}
