<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class CartSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [];
        $faker = \Faker\Factory::create();
        $date = $faker->unixTime('now');

        for($i=0 ;$i<100 ;$i++)
        {
            $data[]=[
                'slug'=>$faker->slug(),
                'reference'=>$faker->randomNumber(5, true),
                'pricettc'=>$faker->randomFloat(2, 1, 1000),
                'priceht'=>$faker->randomFloat(2, 1, 1000),
                'rntrydate'=>date('Y-m-d H:i:s',$date),
                'releasedate'=>date('Y-m-d H:i:s',$date)

            ];
        }

        $this->table('cart')
            ->insert($data)
            ->save();
    }
}
