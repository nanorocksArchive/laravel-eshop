<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    const DESCRIPTION = 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            Product::TITLE => 'UT WISI ENIM AD',
            Product::SLUG => 'UT-WISI-ENIM-AD',
            Product::DESCRIPTION => self::DESCRIPTION,
            Product::PRICE => '587.50',
            Product::IMAGE => 'themes/images/ladies/1.jpg',
            Product::STOCK => '0',
            Product::ADDITIONAL => '{"color":["red","green","blue"],"size":["small","large","medium","extra small"]}'
        ]);

        ProductImage::create([
           ProductImage::PRODUCT_ID => $product->id,
           ProductImage::IMAGE => 'themes/images/ladies/2.jpg'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/2.jpg'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/2.jpg'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/2.jpg'
        ]);

        $product = Product::create([
            Product::TITLE => 'QUIS NOSTRUD EXERCI TATION-5',
            Product::SLUG => 'QUIS-NOSTRUD-EXERCI-TATION-5',
            Product::DESCRIPTION => self::DESCRIPTION,
            Product::PRICE => '40.25',
            Product::IMAGE => 'themes/images/ladies/2.jpg',
            Product::STOCK => '5',
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/3.jpg'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/3.jpg'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/3.jpg'
        ]);

        $product = Product::create([
            Product::TITLE => 'KNOW EXACTLY TURNED',
            Product::SLUG => 'KNOW-EXACTLY-TURNED-3',
            Product::DESCRIPTION => self::DESCRIPTION,
            Product::PRICE => '587.50',
            Product::IMAGE => 'themes/images/ladies/3.jpg',
            Product::STOCK => '10',
        ]);


        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/4.jpg'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/1.jpg'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/2.jpg'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/4.jpg'
        ]);

        $product = Product::create([
            Product::TITLE => 'YOU THINK FAST 1',
            Product::SLUG => 'YOU-THINK-FAST-1',
            Product::DESCRIPTION => self::DESCRIPTION,
            Product::PRICE => '587.50',
            Product::IMAGE => 'themes/images/ladies/4.jpg',
            Product::STOCK => '20',
            Product::ADDITIONAL => '{"color":["red","green","blue"],"size":["small","large","medium","extra small"]}'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/1.jpg'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/1.jpg'
        ]);

        $product = Product::create([
            Product::TITLE => 'UT WISI ENIM AD 1',
            Product::SLUG => 'UT-WISI-ENIM-AD-1',
            Product::DESCRIPTION => self::DESCRIPTION,
            Product::PRICE => '587.50',
            Product::IMAGE => 'themes/images/ladies/5.jpg',
            Product::STOCK => '10',
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/1.jpg'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/1.jpg'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/1.jpg'
        ]);

        $product = Product::create([
            Product::TITLE => 'UT WISI ENIM AD 2',
            Product::SLUG => 'UT-WISI-ENIM-AD-2',
            Product::DESCRIPTION => self::DESCRIPTION,
            Product::PRICE => '587.50',
            Product::IMAGE => 'themes/images/ladies/6.jpg',
            Product::STOCK => '20',
            Product::ADDITIONAL => '{"color":["red","green","blue"],"size":["small","large","medium","extra small"]}'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/5.jpg'
        ]);

        ProductImage::create([
            ProductImage::PRODUCT_ID => $product->id,
            ProductImage::IMAGE => 'themes/images/ladies/4.jpg'
        ]);

        Product::create([
            Product::TITLE => 'KNOW EXACTLY TURNED 2',
            Product::SLUG => 'KNOW-EXACTLY-TURNED-2',
            Product::DESCRIPTION => self::DESCRIPTION,
            Product::PRICE => '587.50',
            Product::IMAGE => 'themes/images/ladies/7.jpg',
            Product::STOCK => '10',
            Product::ADDITIONAL => '{"color":["red","green","blue"],"size":["small","large","medium","extra small"]}'
        ]);

        Product::create([
            Product::TITLE => 'UT WISI ENIM AD 11',
            Product::SLUG => 'UT-WISI-ENIM-AD-11',
            Product::DESCRIPTION => self::DESCRIPTION,
            Product::PRICE => '587.50',
            Product::IMAGE => 'themes/images/ladies/8.jpg',
            Product::STOCK => '0',
        ]);
    }
}
