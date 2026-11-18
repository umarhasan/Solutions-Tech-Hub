<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Category, Item, User};
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['General Items', 'RAMs & Hard Drives', 'Computer Scrap', 'Laptops', 'Software'];
        foreach ($categories as $name) Category::firstOrCreate(['name' => $name]);
        $path = database_path('seeders/excel_items.json');
        if (file_exists($path)) {
            foreach (json_decode(file_get_contents($path), true) as $row) {
                $category = Category::firstOrCreate(['name' => $row['category']]);
                Item::firstOrCreate(['name' => $row['name'], 'source_sheet' => $row['source_sheet']], ['category_id' => $category->id, 'buying_price' => $row['buying_price'], 'selling_price' => $row['selling_price'], 'quantity' => $row['quantity'], 'low_stock_limit' => 2]);
            }
        }
        if (!User::exists()) User::create(['name' => 'Administrator', 'email' => 'admin@example.com', 'password' => Hash::make('ChangeMe123!')]);
    }
}
