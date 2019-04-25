<?php

use Illuminate\Database\Seeder;
use App\Whitewine;

class WhitewinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $whitewines = [
            ['White Blend Portugal', 'White Blend', 2019, 'Casa Santos Lima', 90, 7.99, 'Good, not to dry, fruity'],
        ];

        $count = count($whitewines);

        foreach ($whitewines as $key => $whitewineData) {
            $whitewine = new Whitewine();

            $whitewine->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $whitewine->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $whitewine->name = $whitewineData[0];
            $whitewine->grape = $whitewineData[1];
            $whitewine->vintage_year = $whitewineData[2];
            $whitewine->vineyard = $whitewineData[3];
            $whitewine->rating = $whitewineData[4];
            $whitewine->cost = $whitewineData[5];
            $whitewine->comment = $whitewineData[6];

            $whitewine->save();
            $count--;
        }
    }
}
