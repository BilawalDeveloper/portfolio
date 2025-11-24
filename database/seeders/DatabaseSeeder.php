<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call all portfolio seeders
        $this->call([
            ProjectSeeder::class,
            ServiceSeeder::class,
            TestimonialSeeder::class,
        ]);

        $this->command->info('Portfolio database seeded successfully!');
        $this->command->info('- 6 projects created');
        $this->command->info('- 6 services created');
        $this->command->info('- 6 testimonials created');
    }
}
