<?php

use Phinx\Seed\AbstractSeed;

class Users extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $this->execute('TRUNCATE users');

        $data = [
            [
                'name' => 'Daniel Pereira',
                'email' => 'danielpereirabp@gmail.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
            ]
        ];

        $tasks = $this->table('users');
        $tasks->insert($data)
              ->save();
    }
}
