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

        for ($i = 0; $i < 100; $i++) {
            $question = $faker->sentence(8);
            $slug = strtolower(preg_replace('/[^a-z0-9]+/', '-', trim($question)));

            $data[] = [
                'slug' => $slug,
                'question' => $question,
                'answer' => $faker->paragraph(3),
                'users_id' => null ,
                'created_at' => $faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d H:i:s')
            ];
        }

        $this->table('faq')
            ->insert($data)
            ->save();
    }
}

