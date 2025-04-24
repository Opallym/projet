<?php

use Phinx\Seed\AbstractSeed;

class PicturesSeeder extends AbstractSeed
{
    public static array $insertedIds = [];

    public function run(): void
    { 
        $propertiesIds = $this->getAdapter()->fetchAll('SELECT id FROM properties');
        $propertiesIds = array_column($propertiesIds, 'id');
        $data = [];
        $faker = \Faker\Factory::create();

        foreach($propertiesIds as $propertyId)
        {
            $data[]=[
                'name' => $faker->words(3,true),
                'position' => $faker->randomNumber(2, true),
                'properties_id' =>  $propertyId
            ];
        }

        $this->table('pictures')
            ->insert($data)
            ->save();
    }
}

