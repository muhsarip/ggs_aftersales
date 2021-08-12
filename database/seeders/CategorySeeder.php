<?php

namespace Database\Seeders;

use App\Libraries\Helper;
use App\Models\Models\Brand;
use App\Models\Models\BrandCategory;
use App\Models\Models\Category;
use App\Models\Warranty;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BrandCategory::truncate();
        DB::table('categories')->delete();
        DB::table('brands')->delete();
        $categories = [
            'Mouse',
            'Keyboard',
            'VGA'
        ];

        $brands = [
            'Samsung',
            'Apple',
            'Alienware'
        ];

        collect($categories)->each(function ($item) {
            Category::firstOrCreate(['name' => $item]);
        });

        collect($brands)->each(function ($item) {
            Brand::firstOrCreate(['name' => $item]);
        });

        Category::all()->each(function ($category) {
            if ($category->name != 'VGA') {
                Brand::where('name', '!=', 'Alienware')->get()->each(function ($brand) use ($category) {
                    $category->brands()->attach($brand->id);
                });
            } else {
                Brand::all()->each(function ($brand) use ($category) {
                    $category->brands()->attach($brand->id);
                });
            }
        });

        for ($i = 1; $i < 100; $i++) {
            $brandCategory = BrandCategory::inRandomOrder()->first();
            Warranty::create(
                [
                    'category_id'  => $brandCategory->category_id,
                    'brand_id'  => $brandCategory->brand_id,
                    'name'  => 'hsdshddsd',
                    'address' => 'hfhdgfjdgfjdhf',
                    'phone' => '081263723727',
                    'email' => 'mail@mail.com',
                    'nama_barang' => 'sdgdjshsjhds',
                    'serial_number' => 'gdsjhgdshd',
                    'detail_kerusakan' => 'djshdjshdkjs',
                    "file_nota_pembelian" => "gdsgdshdsj",
                    'type' => "warranty",
                    'status' => "DATA MASUK / BARANG DALAM PERJALANAN",
                    'rma_id' => Helper::generateCode('warranty')
                ]
            );
        }
    }
}
