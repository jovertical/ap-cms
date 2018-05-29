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
         \App\Product::create([
            'name' => 'Aura Rich Honey Gold Soap',
            'description' => 'Helps reduce oiliness & delays the appearance of aging.',
            'price' => '0',
            'category_id' => 1,
        ]);

        \App\Product::create([
            'name' => 'Aura Rich Honey Gold Soap 9',
            'description' => 'Diminishes Wrinkles & Fine lines; Improves skin tone; Minimizes scars, and Moisturizes the skin.',
            'price' => '0',
            'category_id' => 1,
        ]);

        \App\Product::create([
            'name' => 'Aura Rich Honey Gold Sun Care',
            'description' => 'The Sunscreen with a mixture of collagen is formulated for all skin types. The texture is smooth and light.',
            'price' => '0',
            'category_id' => 1,
        ]);

        \App\Product::create([
            'name' => 'Aura Rich Aura Honey Gold Cream',
            'description' => 'This facial cream will deeply nourish the skin. Provides protection to harmful pollution. It clears away dark spots.',
            'price' => '0',
            'category_id' => 1,
        ]);

        \App\Product::create([
            'name' => 'Aura Rich Honey Gold Body Serum',
            'description' => 'The concentrated serum gel with honey & gold extracts regenerate skin. It should be mixed with honey gold lotion or apply directly to skin.',
            'price' => '0',
            'category_id' => 1,
        ]);

        \App\Product::create([
            'name' => 'Aura Rich Bearberry White Booster Face',
            'description' => 'Nourishes, moisturizes, restores youthfulness of the face to be silky smooth and clear. It removes dark spots and whitens the skin. It does not clog pores. It protect the skin from UVA & UVB rays that causes skin damage.',
            'price' => '0',
            'category_id' => 1,
        ]);

        \App\Product::create([
            'name' => 'Aura Rich Sunscreen Honey Gold Lotion',
            'description' => 'The sunscreen lotion is concentrated, easily absorbed and non-sticky. It has a mixture of Honey and Gold. The Honey is like a coating film to prevent water loss. The Gold helps prevent aging.',
            'price' => '0',
            'category_id' => 1,
        ]);

        \App\Product::create([
            'name' => 'Aura Rich Gold Face Powder SPF 35 PA++',
            'description' => 'Discover the new dimension of face powder with a mixture of Honey, Gold, and Collagen. It helps prevent wrinkles and does not clog pores.',
            'price' => '0',
            'category_id' => 1,
        ]);

        \App\Product::create([
            'name' => 'Perfect Face Makeup',
            'description' => 'A full Makeup set with 3 Lipstick Color Shades, 6 Eyeshadow Shades, Blusher, Bronzer, and Highlighter.',
            'price' => '0',
            'category_id' => 1,
        ]);


        // deals
        \App\Product::create([
            'category_id' => 0,
            'type' => 'deal',
            'name' => 'Reseller Kit # 1 Face Set',
            'description' => '
                <b><i>"A Complete Whitening Solution for the Face."</b></i><br><br>
                <i>Honey Gold Soap 9,
                Honey Gold Cream,
                Honey Gold Sun Care, <br>
                Bearberry White Booster Face</i><br>',
            'price' => '00000',
        ]);

        \App\Product::create([
            'category_id' => 0,
            'type' => 'deal',
            'name' => 'Reseller Kit # 2 Makeup Set',
            'description' => '<i><b>"A Full Makeup Set"</b><br><br>
                Perfect Face Makeup,
                Honey Gold Face Powder</i><br>',
            'price' => '00000',
        ]);

        \App\Product::create([
            'category_id' => 0,
            'type' => 'deal',
            'name' => 'Reseller Kit # 3 Body Set',
            'description' => '<i> <b>"A Complete Anti-Aging Solution for the Body."</i> </b><br><br>
                <i>Honey Gold Soap,
                Honey Gold Body Serum,
                Honey Gold Body Lotion</i><br>',
            'price' => '00000',
        ]);

        \App\Product::create([
            'category_id' => 0,
            'type' => 'deal',
            'name' => 'Distributor Signup Pack',
            'description' => '<i>Three(3) pieces of each nine(9) AuraRich products.</i>',
            'price' => '00000',
        ]);

        \App\Product::create([
            'category_id' => 0,
            'type' => 'deal',
            'name' => 'Distributor Sample Pack',
            'description' => '<i>Five(5) pieces of each nine(9) AuraRich products. </i>',
            'price' => '00000',
        ]);

        \App\Product::create([
            'category_id' => 0,
            'type' => 'deal',
            'name' => 'Distributor Starter Pack',
            'description' => '<i>Ten(10) pieces of each nine(9) AuraRich products.  </i>',
            'price' => '00000',
        ]);
    }
}
