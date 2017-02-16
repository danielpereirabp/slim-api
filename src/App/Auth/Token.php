<?php

namespace App\Auth;

class Token
{
	public $decoded;

    public function hydrate($decoded)
    {
        $this->decoded = $decoded;
    }
}
