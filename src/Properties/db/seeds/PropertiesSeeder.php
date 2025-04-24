<?php

use Phinx\Seed\AbstractSeed;
use PhpParser\Builder\Property;

class PropertiesSeeder extends AbstractSeed
{
    public static array $insertedIds = [];

    public function run(): void
    {

        $usersIds = $this->getAdapter()->fetchAll('SELECT id FROM users');
        $usersIds = array_column($usersIds, 'id');
        $data = [];
        $faker = \Faker\Factory::create();
        $date = $faker->unixTime('now');

        foreach($usersIds as $userId)
        {
            $data[]=[
                'title'       => $faker->sentence(4),
                'description' => $faker->paragraph(3),
                'type'        => $faker->randomElement(['house', 'apartment', 'villa']),
                'price'       => $faker->randomFloat(2, 50000, 500000),
                'surface'     => $faker->randomFloat(2, 30, 200),
                'chamber'     => $faker->numberBetween(1, 5),
                'bathroom'    => $faker->numberBetween(1, 3),
                'address'     => $faker->streetAddress(),
                'postal_code' => $faker->postcode(),
                'city'        => $faker->city(),
                'country'     => $faker->country(),
                'latitude'    => $faker->latitude(),
                'longitude'   => $faker->longitude(),
                'garden'      => $faker->boolean(),
                'balcon'      => $faker->boolean(),
                'elevator'    => $faker->boolean(),
                //'view'        => $faker->randomElement(['South', 'North', 'West', 'East']),
                'updated_at'  =>date('Y-m-d H:i:s',$date),
                'created_at'  =>date('Y-m-d H:i:s',$date),
                //'phone_number'=>$faker->phoneNumber(),
                'user_id'     => $userId
            ];
        }

        $this->table('properties')
            ->insert($data)
            ->save();

        $row = $this->getAdapter()->fetchAll('SELECT id FROM properties');
        PicturesSeeder::$insertedIds = array_column($row, 'id');
    }
}