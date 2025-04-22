<?php


use Phinx\Seed\AbstractSeed;

class BlogSeeder extends AbstractSeed
{
    public function run(): void
    { 
        $data = [];
        $faker = \Faker\Factory::create();
        $date = $faker->unixTime('now');

        for($i=0 ;$i<100 ;$i++)
        {
            $data[]=[
                'title'=>$faker->words(3,true),
                'slug'=>$faker->slug(),
                'content'=>$faker->sentence(),
                'photo'=>$faker->imageUrl()  ,
                'created_at'=>date('Y-m-d H:i:s',$date),
                'updated_at'=>date('Y-m-d H:i:s',$date),

            ];
        }

        $this->table('blog')
            ->insert($data)
            ->save();
    }
}

