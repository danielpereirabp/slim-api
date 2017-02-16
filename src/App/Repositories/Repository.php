<?php

namespace App\Repositories;

abstract class Repository
{
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}
}
