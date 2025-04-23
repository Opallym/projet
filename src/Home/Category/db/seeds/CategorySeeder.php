<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class CategorySeeder extends AbstractSeed
{
    
    public function run(): void
    {
        $data = [];
        $faker = \Faker\Factory::create();
        $date = $faker->unixTime('now');

        for($i=0 ;$i<100 ;$i++)
        {
            $data[]=[
                'name'=>$faker->words(1,true),
                'langue'=>$faker->words(1, true),
                'slug' => $faker->words(1, true),
                'picture'=>$faker->words(1, true),
                'is_online'=>$faker->boolean(0,5),
                'parent'=>$faker->numberBetween(11, true)
            ];
        }

        $this->table('category')
            ->insert($data)
            ->save();
    }
}