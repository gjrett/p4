<?php

use Illuminate\Database\Seeder;
use App\Redwine;

class RedwinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $redwines = [
            ['Red Blend Portugal', 'Red Blend', 2019, 'Casa Santos Lima', 90, 7.99, 'Good, not to dry, fruity'],
        ];

        $count = count($redwines);

        foreach ($redwines as $key => $redwineData) {
            $redwine = new Redwine();

            $redwine->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $redwine->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $redwine->name = $redwineData[0];
            $redwine->grape = $redwineData[1];
            $redwine->vintage_year = $redwineData[2];
            $redwine->vineyard = $redwineData[3];
            $redwine->rating = $redwineData[4];
            $redwine->cost = $redwineData[5];
            $redwine->comment = $redwineData[6];

            $redwine->save();
            $count--;
        }
    }
}
