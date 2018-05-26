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
            'price' => '111',
            'category_id' => 1,
        ]);

          \App\Product::create([
            'name' => 'Aura Rich Honey Gold Soap 9',
            'description' => 'Diminishes Wrinkles & Fine lines; Improves skin tone; Minimizes scars, and Moisturizes the skin.',
            'price' => '111',
            'category_id' => 1,
        ]);

           \App\Product::create([
            'name' => 'Aura Rich Honey Gold Sun Care',
            'description' => 'The Sunscreen with a mixture of collagen is formulated for all skin types. The texture is smooth and light.',
            'price' => '111',
            'category_id' => 1,
        ]);

            \App\Product::create([
            'name' => 'Aura Rich Aura Honey Gold Cream',
            'description' => 'This facial cream will deeply nourish the skin. Provides protection to harmful pollution. It clears away dark spots.',
            'price' => '111',
            'category_id' => 1,
        ]);

             \App\Product::create([
            'name' => 'Aura Rich Honey Gold Body Serum',
            'description' => 'The concentrated serum gel with honey & gold extracts regenerate skin. It should be mixed with honey gold lotion or apply directly to skin.',
            'price' => '111',
            'category_id' => 1,
        ]);

              \App\Product::create([
            'name' => 'Aura Rich Bearberry White Booster Face',
            'description' => 'Nourishes, moisturizes, restores youthfulness of the face to be silky smooth and clear. It removes dark spots and whitens the skin. It does not clog pores. It protect the skin from UVA & UVE rays that causes skin damage.',
            'price' => '111',
            'category_id' => 1,
        ]);

               \App\Product::create([
            'name' => 'Aura Rich Sunscreen Honey Gold Lotion',
            'description' => 'The sunscreen lotion is concentrated, easily absorbed and non-sticky. It has a mixture of Honey and Gold. The Honey is like a coating film to prevent water loss. The Gold helps prevent aging.',
            'price' => '111',
            'category_id' => 1,
        ]);

                \App\Product::create([
            'name' => 'Aura Rich Gold Face Powder SPF 35 PA++',
            'description' => 'Discover the new dimension of face powder with a mixture of Honey, Gold, and Collagen. It helps prevent wrinkles and does not clog pores.',
            'price' => '111',
            'category_id' => 1,
        ]);

                 \App\Product::create([
            'name' => 'Perfect Face Makeup',
            'description' => 'A full Makeup set with 3 Lipstick Color Shades, 6 Eyeshadow Shades, Blusher, Bronzer, and Highlighter.',
            'price' => '111',
            'category_id' => 1,
        ]);
    }
}
