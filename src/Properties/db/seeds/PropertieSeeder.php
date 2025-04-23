<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class UsersSeeder extends AbstractSeed
{

    public function run(): void
    {
        $data = [];
        $faker = \Faker\Factory::create();
        $date = $faker->unixTime('now');

        for($i=0 ;$i<100 ;$i++)
        {
            $data[]=[
                'user_id'     => $faker->numberBetween(1, 100),
                'title'       => $faker->sentence(4),
                'description' => $faker->paragraph(3),
                'type'        => $faker->randomElement(['house', 'apartment', 'villa']),
                'price'       => $faker->randomFloat(2, 50000, 500000),
                'surface'     => $faker->randomFloat(2, 30, 200),
                'chamber'     => $faker->numberBetween(1, 5),
                'bathroom'    => $faker->numberBetween(1, 3),
                'address'     => $faker->streetAddress,
                'postal_code' => $faker->postcode,
                'city'        => $faker->city,
                'country'     => $faker->country,
                'latitude'    => $faker->latitude,
                'longitude'   => $faker->longitude,
                'garden'      => $faker->boolean,
                'balcon'      => $faker->boolean,
                'elevator'    => $faker->boolean,
                'view'        => $faker->randomElement(['sea', 'mountain', 'city', 'garden']),
                'updated_at'=>date('Y-m-d H:i:s',$date),
                'register_at'=>date('Y-m-d H:i:s',$date),
                'phone_number'=>$faker->phoneNumber(),
            ];
        }

        $this->table('users')
            ->insert($data)
            ->save();
    }
}