<?php

use App\Product;
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
        Product::create([
                'name' => "Monitor Dell 22 | SE2219H",
                'description' => "Vea imágenes, videos y archivos claramente en este monitor Full HD de 21,5 pulgadas con cubiertas delgadas encima de una base compacta y que le ahorra espacio.",
                'price' => 12315690.99,
                'image' => "https://bucket-heroku-assets.s3.amazonaws.com/store-placetopay/images/products/monitor-se2219h.jpg",
                'stock' => 12,
                'categories_id' => 1
        ]);
        Product::create([
                'name' => "Monitor Dell 24 | S2419H",
                'description' => "Experimente CinemaSound con dos parlantes de 5 W integrados en este atractivo monitor de 23,8 pulgadas que cuenta con una pantalla InfinityEdge prácticamente sin bordes.",
                'price' => 1120000.99,
                'image' => "https://bucket-heroku-assets.s3.amazonaws.com/store-placetopay/images/products/monitor-s2419h.jpeg",
                'stock' => 10,
                'categories_id' => 1
        ]);
        Product::create([
                'name' => "Monitor Dell  Gaming 24 | S2419HGF",
                'description' => "Mate a cualquier bestia con su propia bestia. Domine con imágenes libres de screen-tearing gracias a FreeSyncTM.",
                'price' => 3240000.00,
                'image' => "https://bucket-heroku-assets.s3.amazonaws.com/store-placetopay/images/products/monitor-s2419hgf.jpeg",
                'stock' => 5,
                'categories_id' => 1
        ]);
        Product::create([
                'name' => "Mochila Dell Essential 15 | ES1520P",
                'description' => "Diseñada con impresiones reflectantes en el panel frontal, la mochila Dell Essential15 (ES1520P) se destaca en condiciones de poca luz y brilla intensamente cuando recibe luz directa, tal como la de los faros de los automóviles, lo que lo hace más visible para otras personas cuando camina en calles y aceras concurridas.",
                'price' => 180000.99,
                'image' => "https://bucket-heroku-assets.s3.amazonaws.com/store-placetopay/images/products/mochila-es1520p.jpg",
                'stock' => 11,
                'categories_id' => 2
        ]);
        Product::create([
                'name' => "Funda Dell Premier 14 | PE1420V",
                'description' => "Como si de un envoltorio de lujo para su portátil se tratara, la funda Dell Premier 14 (PE1420V) le ofrece una protección robusta durante sus desplazamientos. La funda de color gris jaspeado está fabricada en material compacto y ligero, con un suave toque de cuero en la parte superior, que combina a la perfección con el diseño elegante de su 2 en 1 Dell Latitude 7400.",
                'price' => 140500.80,
                'image' => "https://bucket-heroku-assets.s3.amazonaws.com/store-placetopay/images/products/mochila-pe1420v.jpg",
                'stock' => 3,
                'categories_id' => 2
        ]);
        Product::create([
                'name' => "Mochila Dell Gaming 14 | 460-BCJY2",
                'description' => "Mantenga el hardware para juegos seguro y protegido con la mochila para juegos Dell 17. Con una cubierta delantera EVA resistente y un interior acolchado con espuma, la laptop y los accesorios estarán protegidos de los elementos mientras está de viaje.",
                'price' => 249999.00,
                'image' => "https://bucket-heroku-assets.s3.amazonaws.com/store-placetopay/images/products/mochila-460-bcjy.jpg",
                'stock' => 8,
                'categories_id' => 2
        ]);
    }
}
