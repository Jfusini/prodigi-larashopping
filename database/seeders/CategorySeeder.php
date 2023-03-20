<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    private $categories = [
        ["name"=>"Uomo",
        "id"=>"1"],
        ["name"=>"Donna",
        "id"=>"2"],
        ["name"=>"Bambino",
        "id"=>"3"],
    ];
  public function run(): void
    {
        foreach($this->categories as $category){
            Category::create(["name"=>$category['name']]);
        }
    }
}
