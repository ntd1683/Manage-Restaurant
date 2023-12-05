<?php

namespace Database\Seeders;

use App\Enums\UserLevelEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        for ($i = 1; $i <= 5; $i++) {
            $arr[] = [
                'name' => fake()->firstName . ' ' . fake()->lastName,
                'phone' => fake()->phoneNumber,
                'id_card' => '21806' . fake()->unique()->numberBetween(10000, 99999),
                'email' => fake()->unique()->email,
                'birthday' => fake()->date(),
                'gender' => fake()->boolean,
                'password' => Hash::make('12345678'),
                'level' => fake()->randomElement(UserLevelEnum::getValues()),
            ];
        }
        User::insert($arr);
    }
}
