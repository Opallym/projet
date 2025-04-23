<?php

use Phinx\Seed\AbstractSeed;

class PicturesSeeder extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'PropertiesSeeder'
        ];
    }

    public function run(): void
    { 
        $data = [];
        $faker = \Faker\Factory::create();
        $date = $faker->unixTime('now');

        for($i=0 ;$i<100 ;$i++)
        {
            $data[]=[
                'name'=>$faker->words(3,true),
                'position'=>$faker->randomNumber(2, true),
                'properties_id'
            ];
        }

        $this->table('pictures')
            ->insert($data)
            ->save();
    }
}

