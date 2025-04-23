<?php

use Phinx\Seed\AbstractSeed;

class FaqSeeder extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'UsersSeeder'
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
                'question'=>$faker->words(10,true),
                'answer'=>$faker->words(10, true),
                'users_id'
            ];
        }
        $this->table('faq')
            ->insert($data)
            ->save();
    }
}
