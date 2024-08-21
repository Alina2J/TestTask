<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            'status' => 'Новый'
        ]);

        DB::table('statuses')->insert([
            'status' => 'В работе'
        ]);

        DB::table('statuses')->insert([
            'status' => 'Завершен'
        ]);
    }
}
