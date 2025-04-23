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
                'Reference'=>$faker->randomNumber(5, true),
                'PriceTTC'=>$faker->randomFloat(2, 1, 1000),
                'priceHT'=>$faker->randomFloat(2, 1, 1000),
                'EntryDate'=>date('Y-m-d H:i:s',$date),
                'ReleaseDate'=>date('Y-m-d H:i:s',$date)

            ];
        }

        $this->table('Cart')
            ->insert($data)
            ->save();
    }
}
