<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
                \App\Deal::create([
            'name' => 'Reseller Kit # 1 Face Set',
            'description' => '<b><i> Reseller Kit # 1 Face Set </b></i><br> 
  <b><i>"A Complete Whitening Solution for the Face."</b></i><br><br>
  <i>Honey Gold Soap 9,
  Honey Gold Cream,
  Honey Gold Sun Care, <br>
  Bearberry White Booster Face</i><br>',
            'price' => '00000',
        ]);

                 \App\Deal::create([
            'name' => 'Reseller Kit # 2 Makeup Set',
            'description' => '<i><b>"A Full Makeup Set"</b><br><br>
  Perfect Face Makeup,
  Honey Gold Face Powder</i><br>',
            'price' => '00000',
        ]);
                \App\Deal::create([
            'name' => 'Reseller Kit # 3 Body Set',
            'description' => '<i> <b>"A Complete Anti-Aging Solution for the Body."</i> </b><br><br>
  <i>Honey Gold Soap,
  Honey Gold Body Serum,
  Honey Gold Body Lotion</i><br>',
            'price' => '00000',
        ]);
                \App\Deal::create([
            'name' => 'Distributor Signup Pack',
            'description' => '<i>Three(3) pieces of each nine(9) AuraRich products.</i>',
            'price' => '00000',
        ]);

                 \App\Deal::create([
            'name' => 'Distributor Sample Pack',
            'description' => '<i>Five(5) pieces of each nine(9) AuraRich products. </i>',
            'price' => '00000',
        ]);
                    \App\Deal::create([
            'name' => 'Distributor Starter Pack',
            'description' => '<i>Ten(10) pieces of each nine(9) AuraRich products.  </i>',
            'price' => '00000',
        ]);
    }
}
