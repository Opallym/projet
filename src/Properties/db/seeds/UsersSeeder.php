<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class UsersSeeder extends AbstractSeed
{
    public static array $insertedIds = [];

    public function run(): void
    {
        $data = [];
        $faker = \Faker\Factory::create();
        $date = $faker->unixTime('now');

        for($i=0 ;$i<100 ;$i++)
        {
            $data[]=[
                'firstname'=>$faker->words(1,true),
                'lastname'=>$faker->words(1, true),
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'email'=>$faker->email(),
                'role'=>$faker->randomElement([
                    'admin',
                    'user',
                    'moderator'
                ]),
                'is_valid'=>$faker->boolean(0,5),
                'updated_at'=>date('Y-m-d H:i:s',$date),
                'register_at'=>date('Y-m-d H:i:s',$date),
                'phone_number'=>$faker->phoneNumber(),
            ];
        }
        $this->table('users')
            ->insert($data)
            ->save();

        $row = $this->getAdapter()->fetchAll('select id from users');
        PropertiesSeeder::$insertedIds = array_column($row, 'id');
    }
}