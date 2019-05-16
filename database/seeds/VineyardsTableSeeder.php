<?php

use Illuminate\Database\Seeder;
use App\Vineyard;

class VineyardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vineyards = [
            ['Casa Santos Lima', 'Portugal', 'Red', 'Unknown'],
            ['Alamos Mendoza', 'Agentina', 'Malbec',' Nicholas Catena'],
            ['European Cellars', 'Spain', 'Garnacha', 'Eric Soloman'],
            ['Beringers', 'California', 'Cabernet Sauvignon', 'Beringers'],
            ['Bodega Norton', 'Argentina','Zinfadel', 'Unknown'] ,
            ['Brancott Estate Marborough', 'New Zealand','Sauvignon Blanc','Unknown'] ,
            ['Casa Lapostolle', 'Chile', 'Sauvignon Blanc', 'Michel Rolland'],
            ['Commanderie de la Bargemone Coteaux de I’Aix', 'France', 'Rose', 'Unknown']
        ];

        $count = count($vineyards);

        foreach ($vineyards as $key => $vineyardData) {
            $vineyard = new Vineyard();


            $vineyard->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $vineyard->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $vineyard->name = $vineyardData[0];
            $vineyard->location = $vineyardData[1];
            $vineyard->specialty = $vineyardData[2];
            $vineyard->vintner = $vineyardData[3];

            $vineyard->save();
            $count--;
        }
    }
}
