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
            'name' => 'Aura Rich HONEY GOLD SOAP',
            'description' => '-is made from Collagen, Honey extract, Curcuma Longa root extract, Hesperthusa Crenulata bark extract, Ananas Sativus fruit extract, Gold, Ascorbic acid, and Daucus Carota Sativa root extract.

COLLAGEN diminishes wrinkles and fine lines, improves skin tone, minimize scars, moisturize, lastly firm and tone the skin.

HONEY EXTRACT is rich with anti-bacterial, antioxidant and anti-aging properties.

CURCUMA LONGA ROOT EXTRACT also known as TURMERIC root extract helps reduce oiliness, delays the appearance of aging, fades the appearance of dark spots and it’s great for sensitive skin.

HESPERTHUSA CRENULATA BARK EXTRACT also known as THANAKA bark extract is a natural sun protection, refines the pores, provides a cooling and soothing effect, anti-oxidant, and regulates skin moisture.

ANANAS SATIVUS FRUIT EXTRACT also known as PINEAPPLE fruit extract is high in anti-oxidant properties from vitamin C. It protects the skin from environmental damage. It exfoliates the skin to reduce dullness and dryness, and encourages cell regeneration. And it forms a protective film to the skin for moisture retention.

GOLD is an antioxidant and has anti-inflammatory properties. It reduces skin redness.
ASCORBIC ACID has antioxidant properties of vitamin C and its role in collagen systhesis make vitamin C a vital molecule for skin health. It gives the skin a brighter glow.

DAUCUS CAROTA SATIVA ROOT EXTRACT also known as CARROT SEED OIL is beneficial for mature skin, sun damaged skin, or skin that is exposed to harsh weather conditions. It is also valued for its soothing and relaxing properties.
',
            'price' => '111',
            'category_id' => 1,
        ]);

          \App\Product::create([
            'name' => 'Aura Rich HONEY GOLD SOAP 9',
            'description' => '-is made from collagen, Melaleuca Al Ternifolia leaf oil, Honey extract, Ascorbic acid, Oxidized Glutathione, Gold, Curcuma Longa root powder, Garcinia Mangostana peel powder, Centella Asiatica extract, Hesperthusa Crenulata bark extract, Ananas Sativus fruit extract, Carica Papaya fruit extract, Malus Domestica fruit extract, and Fragaria Ananassa fruit extract.

COLLAGEN diminishes wrinkles and fine lines, improves skin tone, minimize scars, moisturize, lastly firm and tone the skin.

MELALEUCA AL TERNIFOLIA LEAF OIL also known as TEA TREE leaf oil helps relieve inflamed skin. It has anti-viral and anti-fungal benefits to heal the skin.

HONEY EXTRACT is rich with anti-bacterial, antioxidant and anti-aging properties.

ASCORBIC ACID has antioxidant properties of vitamin C and its role in collagen synthesis make vitamin C a vital molecule for skin health. It gives the skin a brighter glow.

OXIDIZED GLUTATHIONE has a skin whitening effect.

GOLD is an antioxidant and has anti-inflammatory properties. It reduces skin redness.

CURCUMA LONGA ROOT EXTRACT also known as TURMERIC root extract helps reduce oiliness, delays the appearance of aging, fades the appearance of dark spots and it’s great for sensitive skin.

GARCINIA MANGOSTANA PEEL POWDER also known as MANGOSTEEN peel powder; these antioxidants have healing properties that heal cells damaged by free radicals, slows down aging. It is the most powerful antioxidants in the natural world.

CENTELLA ASIATICA EXTRACT also known as GOTU KOLA extract is rich in amino acids, beta carotene, fatty acids, and numerous potent phytochemicals. It improves circulation as well as the synthesis of collagen and skin tissue. It prevents skin aging.

HESPERTHUSA CRENULATA BARK EXTRACT also known as THANAKA bark extract is a natural sun protection, refines the pores, provides a cooling and soothing effect, anti-oxidant, and regulates skin moisture.

ANANAS SATIVUS FRUIT EXTRACT also known as PINEAPPLE fruit extract is high in anti-oxidant properties from vitamin C. It protects the skin from environmental damage. It exfoliates the skin to reduce dullness and dryness, and encourages cell regeneration. And it forms a protective film to the skin for moisture retention.

CARICA PAPAYA FRUIT EXTRACT has skin lightening properties that help clear blemishes and pigmentation. The enzyme papain, along with the alpha-hydroxy acids, acts as powerful exfoliator and dissolves inactive proteins and dead skin cells.

MALUS DOMESTICA FRUIT EXTRACT also known as APPLE fruit extract protects skin stem cells while also delaying the senescence of hair follicles. It succeeds in delivering a revolutionary anti-aging performance for real rejuvenation.

FRAGARIA ANANASSA FRUIT EXTRACT also known as STRAWBERRY fruit extract , being rich in ellagic acid, it helps lighten hyper pigmentation caused by UV rays.
',
            'price' => '111',
            'category_id' => 1,
        ]);

           \App\Product::create([
            'name' => 'Aura Rich HONEY GOLD SUN CARE',
            'description' => '-is made from Simmondsia Chinensis Seed Oil, Honey extract, Gold, Collagen and Glutathione.

SIMMONDSIA CHINENSIS SEED OIL also known as JOJOBA seed oil provides skin protection and emolliency while still allowing the skin to breathe.

HONEY EXTRACT is rich with anti-bacterial, antioxidant and anti-aging properties.

GOLD is an antioxidant and has anti-inflammatory properties. It reduces skin redness.

COLLAGEN diminishes wrinkles and fine lines, improves skin tone, minimize scars, moisturize, lastly firm and tone the skin.

GLUTATHIONE it has skin whitening effect.
',
            'price' => '111',
            'category_id' => 1,
        ]);

            \App\Product::create([
            'name' => 'Aura Rich AURA HONEY GOLD CREAM',
            'description' => '-is made from Simmondsia Chinensis Seed Oil, Oenothera Biennis (Evening Primrose) Oil, Ginkgo Biloba Leaf Extract, Glutathione, Gold, Honey extract and Collagen.

SIMMONDSIA CHINENSIS SEED OIL also known as JOJOBA seed oil provides skin protection and emolliency while still allowing the skin to breathe.
OENOTHERA BIENNIS (EVENING PRIMROSE) OIL it helps reduce the oil secretion without causing dryness.

GLUTATHIONE it has skin whitening effect.

GOLD is an antioxidant and has anti-inflammatory properties. It reduces skin redness.

HONEY EXTRACT is rich with anti-bacterial, antioxidant and anti-aging properties.

COLLAGEN diminishes wrinkles and fine lines, improves skin tone, minimize scars, moisturize, lastly firm and tone the skin.
',
            'price' => '111',
            'category_id' => 1,
        ]);

             \App\Product::create([
            'name' => 'Aura Rich HONEY GOLD BODY SERUM',
            'description' => '-it is made from Opuntia Streptacantha Stem Extract, Aloe Barbadensis Leaf Extract, Ascorbic acid, Honey extract, Gold and Glutathione.

OPUNTIA STREPTACANTHA STEM EXTRACT also known as PRICKLY PEAR CACTUS stem extract soothes sensitive and dry skin and protects it from environmental stress factors including UV radiation.

ALOE BARBADENSIS LEAF EXTRACT can soothe skin and serve as an anti-inflammatory. It can be efficiently used topically because of its burn healing effects, scar reducing and wounds healing properties.

ASCORBIC ACID has antioxidant properties of vitamin C and its role in collagen synthesis make vitamin C a vital molecule for skin health. It gives the skin a brighter glow.

HONEY EXTRACT is rich with anti-bacterial, antioxidant and anti-aging properties.

GOLD is an antioxidant and has anti-inflammatory properties. It reduces skin redness.

GLUTATHIONE it has skin whitening effect.
',
            'price' => '111',
            'category_id' => 1,
        ]);

              \App\Product::create([
            'name' => 'Aura Rich BEARBERRY WHITE BOOSTER FACE',
            'description' => '-it is made from Arctostaphylos UVA Ursi Leaf Extract, Rubus Fructicosus Extract, Algae Extract, Hyaluronic acid, Macadamia nut Oil, Ginseng Extract, Safflower Seed Oil, Lupinus Albus  Seed Extract, Curcuma  Longa Root Extract and Glycine Soja Seed Extract.

ARCTOSTAPHYLOS UVA URSI LEAF EXTRACTS also known as BEARBERRY leaf extracts lightens the skin using its high levels of Arbutin. Arbutin blocks Tyrosinase, which your body uses to create melanin discolorations on your skin- like freckles and age spots. It works as an antioxidant and anti-aging.
RUBUS FRUTICOSUS EXTRACT also known as BLACKBERRY extract boosts the production of collagen and elastin, two compounds which are responsible for skin’s elasticity and firmness.

ALGAE EXTRACT has the ability to instantly hydrate and condition the skin. It is an antioxidant, meaning it protects your skin from free radicals that cause premature aging.

HYALURONIC ACID naturally found in the body, it secures moisture and creates fullness- youthful skin naturally. It swoops in with the ability to replenish moisture that is crucial to having younger-looking, supple skin.

MACADAMIA NUT OIL is a moisturizing, anti-inflammatory, making it perfect for a dry, sensitive skin types. It restores the skin’s barrier function and keeps skin hydrated.

GINSENG EXTRACT is an anti-aging ingredient because it has so many phytonutrients, and it helps tone and brightens the skin.

SAFFLOWER SEED OIL is less aggravating to skin and contains about 78% of linoleic acid, which is undoubtedly a secret weapon in fighting against acne problems.

LUPINUS ALBUS SEED EXTRACT also known as WHITE LUPIN seed extract rejuvenates the skin and is thus used in anti-aging formulas.

CURCUMA LONGA ROOT EXTRACT also known as TURMERIC root extract helps reduce oiliness, delays the appearance of aging, fades the appearance of dark spots and it’s great for sensitive skin.

GLYCINE SOJA SEED EXTRACT also known as SOYBEAN seed extract reduces the appearance of lines and wrinkles while stimulating collagen production.
',
            'price' => '111',
            'category_id' => 1,
        ]);

               \App\Product::create([
            'name' => 'Aura Rich SUNSCREEN  HONEY GOLD LOTION',
            'description' => '-is made from Ascorbic Acid, Allantoin, Aloe Barbadensis Leaf Extract, Honey extract, Curcuma Longa Root extract, Gold extract, and Simmondsia Chinensis Oil.

ASCORBIC ACID has antioxidant properties of vitamin C and its role in collagen synthesis make vitamin C a vital molecule for skin health. It gives the skin a brighter glow.

ALLANTOIN helps soften and protect while actively soothing the skin.

ALOE BARBADENSIS LEAF EXTRACT can soothe skin and serve as an anti-inflammatory. It can be efficiently used topically because of its burn healing effects, scar reducing and wounds healing properties.

HONEY EXTRACT is rich with anti-bacterial, antioxidant and anti-aging properties.

CURCUMA LONGA ROOT EXTRACT also known as TURMERIC root extract helps reduce oiliness, delays the appearance of aging, fades the appearance of dark spots and it’s great for sensitive skin.

GOLD is an antioxidant and has anti-inflammatory properties. It reduces skin redness.

SIMMONDSIA CHINENSIS SEED OIL also known as JOJOBA seed oil provides skin protection and emolliency while still allowing the skin to breathe.
',
            'price' => '111',
            'category_id' => 1,
        ]);

                \App\Product::create([
            'name' => 'Aura Rich GOLD FACE POWDER SPF 35 PA++',
            'description' => 'lorem ipsum',
            'price' => '111',
            'category_id' => 1,
        ]);

                 \App\Product::create([
            'name' => 'Perfect Face Makeup',
            'description' => '-A full makeup set has 3 lipstick color shades ,  6  eyeshadow shades, blusher, bronzer and highlighter.  ',
            'price' => '111',
            'category_id' => 1,
        ]);
    }
}
