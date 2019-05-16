<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run()
    {

        $this->call(VineyardsTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
        $this->call(WinesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TagWineTableSeeder::class);

    }
}
