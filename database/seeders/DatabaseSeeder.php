<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dish;
use App\Models\Menu;
use App\Models\User;
use App\Models\Image;
use App\Models\Client;
use App\Models\BugReport;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Restaurant::factory(10)->create();
        User::factory(20)->create();
        Client::factory(50)->create();
        Reservation::factory(100)->create();
        Dish::factory(50)->create();
        Menu::factory(20)->create();
        $imageables = ['Dish', 'Menu', 'Restaurant'];
        Image::factory(100)->create([
            'imageable_id' => function () use ($imageables) {
                $imageableType = $imageables[rand(0, 2)];
                if ($imageableType === 'Dish') {
                    return Dish::all()->random()->id;
                } elseif ($imageableType === 'Menu') {
                    return Menu::all()->random()->id;
                } else {
                    return Restaurant::all()->random()->id;
                }
            },
            'imageable_type' => function () use ($imageables) {
                return $imageables[rand(0, 2)];
            },
        ]);
        BugReport::factory(10)->create();
    }
}
