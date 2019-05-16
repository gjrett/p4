<?php

use Illuminate\Database\Seeder;
use App\Purchase;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $purchases = [
            ['Red Blend Portugal', 'Red', 'Malbec', 2019, 7.99, 'Costco'],
            ['Alamos Mendoza', 'Red', 'Malbec', 2014, 9.01, 'K-7 Liquors'],
            ['Altovinum Evodia', 'Red', 'Garnacha', 2018, 10.01, 'Costco'],
            ['Founder Estate Cabernet', 'Red', 'Cabernet Sauvignon', 2018, 9.01, 'Costco'],
            ['Bogle Old Vine Zinfadel', 'Rose', 'Zinfadel', 2017, 12.01, 'K-7 Liquors'],
            ['Estate Marborough Savingnon Blanc', 'White', 'Sauvignon Blanc', 2016, 10.01, 'Costco'],
            ['Lapostolle', 'White', 'Sauvignon Blanc', 2017, 12.01, 'K-7 Liquors'],
            ['Commanderie de la Bargemone', 'Rose', 'Rose', 2015, 18.01, 'Costco']

        ];

        $count = count($purchases);

        foreach ($purchases as $key => $purchasesData) {
            $purchase = new Purchase();

            $purchase->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $purchase->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $purchase->name = $purchasesData[0];
            $purchase->type = $purchasesData[1];
            $purchase->grape = $purchasesData[2];
            $purchase->year = $purchasesData[3];
            $purchase->cost = $purchasesData[4];
            $purchase->store = $purchasesData[5];

            $purchase->save();
            $count--;
        }
    }
}
