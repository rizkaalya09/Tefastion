<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Botol Plastik Bekas', 'description' => 'Plastik bekas yang biasanya digunakan untuk minuman seperti botol air mineral atau botol minuman lainnya.', 'image' => 'botol plastik bekas.png'],
            ['name' => 'Kresek Bekas', 'description' => 'Kresek bekas yang umumnya digunakan sebagai kantong pembungkus atau pembungkus makanan.', 'image' => 'kresek bekas.png'],
            ['name' => 'Kaleng', 'description' => 'Kaleng bekas yang biasanya digunakan untuk kemasan makanan atau minuman seperti kaleng minuman ringan.', 'image' => 'kaleng.png'],
            ['name' => 'Elektronik Bekas', 'description' => 'Barang-barang elektronik bekas seperti perangkat elektronik rumah tangga atau gadget bekas.', 'image' => 'elektronik bekas.png'],
            ['name' => 'TV Bekas', 'description' => 'Televisi bekas yang sudah tidak terpakai atau rusak.', 'image' => 'TV BEKAS color 5.png'],
            ['name' => 'Ban Bekas', 'description' => 'Ban bekas dari kendaraan bermotor seperti mobil atau sepeda motor.', 'image' => 'ban bekas.png'],
            ['name' => 'Kulit Kerang', 'description' => 'Kulit kerang yang umumnya menjadi limbah dari industri pengolahan kerang.', 'image' => 'kulit kerang.png'],
            ['name' => 'Tissue', 'description' => 'Tissue bekas yang digunakan untuk membersihkan atau mengelap sesuatu.', 'image' => 'tissue.png'],
            ['name' => 'Pakaian Bekas', 'description' => 'Pakaian bekas yang sudah tidak terpakai lagi atau tidak digunakan.', 'image' => 'pakaian bekas.png'],
            ['name' => 'Botol Kaca Bekas', 'description' => 'Botol kaca bekas yang biasanya digunakan untuk minuman atau kemasan makanan.', 'image' => 'botol kaca bekas.png']
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
