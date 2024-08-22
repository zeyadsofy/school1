<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Specialization;
use ClassroomTableSeeder;
use Database\Seeders\adminSeeder;

use Database\Seeders\Genders;
use Database\Seeders\GradeSeeder;

use Database\Seeders\SectionsTableSeeder1;
use GenderTableSeeder;
use Illuminate\Database\Seeder;
use SectionsTableSeeder;
use SpecializationsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(Genders::class);
        $this->call(Specializations::class);
        $this->call(adminSeeder::class);
        $this->call(GradeSeeder1::class);
        // $this->call(ClassroomTableSeeder1::class);
        // $this->call(SectionsTableSeeder1::class);

     
    }
}
