<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $electronics = Category::firstOrCreate(['name' => 'Teknologi & Gaming'], ['slug' => 'tech-gaming']);
        $home = Category::firstOrCreate(['name' => 'Gaya Hidup Pintar'], ['slug' => 'smart-living']);
        $industrial = Category::firstOrCreate(['name' => 'Kekuatan Industri'], ['slug' => 'industrial']);
        $apparel = Category::firstOrCreate(['name' => 'Pakaian Masa Depan'], ['slug' => 'future-apparel']);
        
        $retailSelected = Category::firstOrCreate(['name' => 'Produk Retail Pilihan'], ['slug' => 'retail-selected']);

        // Reliable Assets
        $localAssets = [
            'laptop' => 'assets/images/laptop_purple.png',
            'phone' => 'assets/images/smartphone_purple.png',
            'keyboard' => 'assets/images/gaming_setup.png',
            'coffee' => 'assets/images/smart_coffee.png',
            'hero' => 'assets/images/hero_banner.png',
            'watch' => 'assets/images/watch_purple.png',
            'mouse' => 'assets/images/mouse_precision_pro.png',
            'printer3d' => 'assets/images/printer_3d_pro.png',
            'vacuum' => 'assets/images/vacuum_cleaner.png',
        ];

        // Specific Curated Retail Images
        $curatedAssets = [
            'silverqueen' => 'assets/images/products/silverqueen_chunky.png',
            'chiki_choco' => 'assets/images/products/chiki_balls_choco.png',
            'cimory' => 'assets/images/products/cimory_yogurt.png',
            'chitato' => 'assets/images/products/chitato_lite.png',
            'yupi' => 'assets/images/products/yupi_strawberry.png',
        ];

        // Verified Unsplash Direct URLs (Non-Food Products)
        $unsplash = [
            'headset' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&q=80&w=800',
            'lamp' => 'https://images.unsplash.com/photo-1534073828943-f801091bb18c?auto=format&fit=crop&q=80&w=800',
            'purifier' => 'https://images.unsplash.com/photo-1632928274371-878938e4d825?auto=format&fit=crop&q=80&w=800',
            'drone' => 'https://images.unsplash.com/photo-1508614589041-895b88991e3e?auto=format&fit=crop&q=80&w=800',
            'drill' => 'https://images.unsplash.com/photo-1504148455328-c376907d081c?auto=format&fit=crop&q=80&w=800',
            'thermal' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&q=80&w=800',
            'vr' => 'https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&fit=crop&q=80&w=800',
            'jacket' => 'https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3?auto=format&fit=crop&q=80&w=800',
            'sneakers' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=800',
            'glasses' => 'https://images.unsplash.com/photo-1572635196237-14b3f281503f?auto=format&fit=crop&q=80&w=800',
            'backpack' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&q=80&w=800',
            'iphone_sunset' => 'assets/images/products/iphone_user.png',
            'ps5' => 'assets/images/products/ps5_user.png',
            'gaming_headset' => 'assets/images/products/headset_user.png',
            'gaming_mouse' => 'assets/images/products/mouse_user.png',
            'study_desk' => 'assets/images/products/desk_user.png',
        ];

        $products = [
            // Second Batch of Tech Products
            ['cat' => $electronics, 'brand' => 'Apple', 'name' => 'iPhone 15 Pro Sunset Orange', 'img' => $unsplash['iphone_sunset'], 'price' => 24500000, 'desc' => 'Edisi terbatas Sunset Orange dengan material titanium yang tangguh dan elegan.'],
            ['cat' => $electronics, 'brand' => 'Sony', 'name' => 'PlayStation 5 Slim Edition', 'img' => $unsplash['ps5'], 'price' => 9500000, 'desc' => 'Konsol gaming generasi terbaru dengan desain lebih ramping dan performa super cepat.'],
            ['cat' => $electronics, 'brand' => 'Razer', 'name' => 'Pro Gaming Headset X-7', 'img' => $unsplash['gaming_headset'], 'price' => 1850000, 'desc' => 'Audio presisi tinggi dengan surround sound 7.1 untuk pengalaman gaming kompetitif.'],
            ['cat' => $electronics, 'brand' => 'SteelSeries', 'name' => 'RGB Gaming Mouse Wolf Edition', 'img' => $unsplash['gaming_mouse'], 'price' => 750000, 'desc' => 'Mouse gaming ergonomis dengan sensor optik 16K DPI dan pencahayaan RGB dinamis.'],
            ['cat' => $home, 'brand' => 'IKEA', 'name' => 'Smart Study Desk Oak White', 'img' => $unsplash['study_desk'], 'price' => 4500000, 'desc' => 'Meja belajar minimalis dengan manajemen kabel pintar dan desain modern.'],
            
            // Curated User Products (New Selection)
            ['cat' => $retailSelected, 'brand' => 'SilverQueen', 'name' => 'SilverQueen Chunky Bar', 'img' => $curatedAssets['silverqueen'], 'price' => 22500, 'desc' => 'Cokelat susu dengan kacang mente yang melimpah dan potongan chunky yang memuaskan.'],
            ['cat' => $retailSelected, 'brand' => 'Chiki', 'name' => 'Chiki Balls Chocolate', 'img' => $curatedAssets['chiki_choco'], 'price' => 8500, 'desc' => 'Snack bola renyah dengan rasa cokelat yang manis dan lezat.'],
            ['cat' => $retailSelected, 'brand' => 'Cimory', 'name' => 'Cimory Yogurt Drink Strawberry', 'img' => $curatedAssets['cimory'], 'price' => 9500, 'desc' => 'Minuman yogurt segar dengan rasa stroberi yang nikmat dan kaya nutrisi.'],
            ['cat' => $retailSelected, 'brand' => 'Chitato', 'name' => 'Chitato Lite Rumput Laut', 'img' => $curatedAssets['chitato'], 'price' => 12500, 'desc' => 'Keripik kentang potong tipis dengan rasa rumput laut yang gurih.'],
            ['cat' => $retailSelected, 'brand' => 'Yupi', 'name' => 'Yupi Strawberry Kiss', 'img' => $curatedAssets['yupi'], 'price' => 6500, 'desc' => 'Permen gummy kenyal berbentuk hati dengan rasa stroberi yang manis.'],

            // Teknologi & Gaming
            ['cat' => $electronics, 'brand' => 'Asus', 'name' => 'Laptop Quantum Elite X', 'img' => $localAssets['laptop'], 'price' => 35000000, 'desc' => 'Laptop gaming sultan dengan performa tanpa batas.'],
            ['cat' => $electronics, 'brand' => 'Samsung', 'name' => 'Incube Smartphone Z1', 'img' => $localAssets['phone'], 'price' => 18500000, 'desc' => 'Flagship revolusioner dengan kamera termutakhir.'],
            ['cat' => $electronics, 'brand' => 'Logitech', 'name' => 'Keyboard Pulsar RGB', 'img' => $localAssets['keyboard'], 'price' => 2450000, 'desc' => 'Presisi tinggi dengan lampu ungu mewah.'],
            ['cat' => $electronics, 'brand' => 'Razer', 'name' => 'Mouse Precision Pro', 'img' => $localAssets['mouse'], 'price' => 1200000, 'desc' => 'Sensor 30K DPI untuk gaming profesional.'],
            ['cat' => $electronics, 'brand' => 'HyperX', 'name' => 'Headset Aether 8K', 'img' => $unsplash['headset'], 'price' => 4500000, 'desc' => 'Audio spasial 3D dengan noise cancelling aktif.'],
            
            // Gaya Hidup Pintar
            ['cat' => $home, 'brand' => 'Nespresso', 'name' => 'Mesin Kopi Smart Brew', 'img' => $localAssets['coffee'], 'price' => 8900000, 'desc' => 'Rasa kopi premium dari genggaman ponsel anda.'],
            ['cat' => $home, 'brand' => 'Incube', 'name' => 'Smart Hub Incube V4', 'img' => $localAssets['hero'], 'price' => 5500000, 'desc' => 'Pusat integrasi rumah pintar masa depan.'],
            ['cat' => $home, 'brand' => 'Dyson', 'name' => 'Air Purifier Aero 9', 'img' => $unsplash['purifier'], 'price' => 3800000, 'desc' => 'Udara bersih maksimal dengan filter HEPA 14.'],
            ['cat' => $home, 'brand' => 'Roborock', 'name' => 'Robot Vacuum Clean-X', 'img' => $localAssets['vacuum'], 'price' => 6200000, 'desc' => 'Pembersih otomatis dengan navigasi laser Lidar.'],

            // Kekuatan Industri
            ['cat' => $industrial, 'brand' => 'DJI', 'name' => 'Drone Survey Ultra', 'img' => $unsplash['drone'], 'price' => 85000000, 'desc' => 'Pemetaan wilayah industri dengan kamera thermal.'],
            ['cat' => $industrial, 'brand' => 'Bosch', 'name' => 'Bor Industri T-900', 'img' => $unsplash['drill'], 'price' => 12500000, 'desc' => 'Tenaga torsi tinggi untuk pengerjaan logam berat.'],
            ['cat' => $industrial, 'brand' => 'Anycubic', 'name' => 'Printer 3D Resin Pro', 'img' => $localAssets['printer3d'], 'price' => 14000000, 'desc' => 'Presisi 8K untuk prototipe skala industri.'],
            ['cat' => $industrial, 'brand' => 'Meta', 'name' => 'Sistem VR Training', 'img' => $unsplash['vr'], 'price' => 45000000, 'desc' => 'Simulasi pelatihan industri berbasis cloud.'],

            // Pakaian Masa Depan
            ['cat' => $apparel, 'brand' => 'Rolex', 'name' => 'Jam Luxury Purple X', 'img' => $localAssets['watch'], 'price' => 125000000, 'desc' => 'Ikon kemewahan dengan mekanisme tourbillon ungu.'],
            ['cat' => $apparel, 'brand' => 'North Face', 'name' => 'Jaket Teknis Graphene', 'img' => $unsplash['jacket'], 'price' => 9500000, 'desc' => 'Pelindung suhu otomatis dengan serat graphene.'],
            ['cat' => $apparel, 'brand' => 'Nike', 'name' => 'Sepatu Pintar Impulse', 'img' => $unsplash['sneakers'], 'price' => 7500000, 'desc' => 'Sistem pengikat otomatis dan pelacakan langkah.'],
            ['cat' => $apparel, 'brand' => 'Ray-Ban', 'name' => 'Kacamata AR Vision', 'img' => $unsplash['glasses'], 'price' => 12000000, 'desc' => 'Overlay data real-time dengan layar OLED mikro.'],
            ['cat' => $apparel, 'brand' => 'Peak Design', 'name' => 'Ransel Urban Tech', 'img' => $unsplash['backpack'], 'price' => 3200000, 'desc' => 'Kapasitas besar dengan pengisian daya tenaga surya.'],
        ];

        shuffle($products);

        // Admin Access
        \App\Models\User::updateOrCreate(
            ['email' => 'ibam@admin.com'],
            [
                'name' => 'ibam',
                'password' => \Illuminate\Support\Facades\Hash::make('ibam123'),
                'email_verified_at' => now(),
            ]
        );

        foreach ($products as $p) {
            // Match screenshot data if product matches
            $rating = rand(30, 50) / 10;
            $sold = rand(10, 1000);
            
            if ($p['name'] == 'Keyboard Pulsar RGB') { $rating = 3.8; $sold = 742; }
            if ($p['name'] == 'Yupi Strawberry Kiss') { $rating = 4.0; $sold = 817; }
            if ($p['name'] == 'Cimory Yogurt Drink Strawberry') { $rating = 3.9; $sold = 182; }

            $product = Product::create([
                'category_id' => $p['cat']->id,
                'brand' => $p['brand'],
                'name' => $p['name'],
                'slug' => Str::slug($p['name'] . '-' . Str::random(5)),
                'description' => $p['desc'],
                'price' => $p['price'],
                'is_free_shipping' => rand(0, 1),
                'has_installment' => $p['name'] == 'Yupi Strawberry Kiss' ? 1 : rand(0, 1),
                'rating' => $rating,
                'review_count' => rand(5, 500),
                'sold_count' => $sold,
                'specs' => 'Kemasan ritel standar untuk produk ' . $p['name'],
            ]);
            
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $p['img'],
                'is_primary' => true
            ]);
        }
    }
}
