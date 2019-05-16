<?php

use Illuminate\Database\Seeder;
use App\Wine;
use App\Purchase;
use App\Vineyard;

class WinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $wines = [
            ['Red Blend Portugal', 'Red', 'Malbec', 2019, 'Casa Santos Lima', 90, 7.99, 'Good, not to dry, fruity'],
            ['Alamos Mendoza', 'Red', 'Malbec', 2014, 'Alamos Mendoza', 92, 9.01, 'Velvety raspberry fruit with and toasty oak notes'],
            ['Altovinum Evodia', 'Red', 'Garnacha', 2018, 'European Cellars', 84, 10.01, 'Ebulliently juicy dark fruited red'],
            ['Founder Estate Cabernet', 'Red', 'Cabernet Sauvignon', 2018, 'Beringers', 90, 9.01, 'Velvety, generous, cassis-driven red'],
            ['Bogle Old Vine Zinfadel', 'Rose', 'Zinfadel', 2017, 'Bodega Norton', 95, 12.01, 'Jammy and lucious Old Vine Zinfadel, best value on the market'] ,
            ['Estate Marborough Savingnon Blanc', 'White', 'Sauvignon Blanc', 2016, 'Brancott Estate Marborough', 90, 10.01, 'Compulsively drinkable'] ,
            ['Lapostolle', 'White', 'Sauvignon Blanc', 2017, 'Casa Lapostolle', 87, 12.01, 'Crisp and lively Sauvignon Blanc that is consistently one of the best from Chile'],
            ['Commanderie de la Bargemone', 'Rose', 'Rose', 2015, 'Commanderie de la Bargemone Coteaux de I’Aix', 85, 18.01, 'Delicate and bright with a suprising intesity of flavor']
        ];

        $count = count($wines);

        foreach ($wines as $key => $wineData) {
            $wine = new Wine();

            # First, figure out the id of the vineyard we want to associate with this wine
            # Extract just the vineyard name from the wine data...
            $name = $wineData[4];

            # Find that author in the authors table
            $vineyard_id = Vineyard::where('name', '=', $name)->pluck('id')->first();

           /* # First, figure out the id of the wine_purchase we want to associate with this wine
            # Extract just the wine name from the wine data...
            $name = explode(' ', $wineData[0]);

            # Find these wine_purchases in the wine_purchases table and get  the cost of the latest buy
            $cost = Purchase::where('name', '=', $name)->Orderby('id', 'DESC')->pluck('cost')->first();
            */

            $wine->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $wine->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $wine->name = $wineData[0];
            $wine->type = $wineData[1];
            $wine->grape = $wineData[2];
            $wine->year = $wineData[3];
            $wine->vineyard_id = $vineyard_id;
            $wine->rating = $wineData[5];
            $wine->cost = $wineData[6];
            $wine->comment = $wineData[7];

            $wine->save();
            $count--;
        }
    }
}
