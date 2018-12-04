<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $datas = array('Comics', 'Computers & Tech', 'Cooking', 'Hobbies & Crafts', 'Edu & Reference', 'Gay & Lesbian', 'Health & Fitness', 'History', 'Home & Garden',
                    'Horror', 'Entertainment', 'Literature & Fiction', 'Medical', 'Mysteries', 'Parenting', 'Social Sciences', 'Religion', 'Romance', 'Science & Math',
                    'Sci-Fi & Fantasy', 'Self-Help', 'Sports', 'Teen', 'Travel', 'True Crime', 'Westerns');
      foreach ($datas as $data) {
        DB::table('categories')->insert([
          'name' => $data,
        ]);
      }
    }
}
