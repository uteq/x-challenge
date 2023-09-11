<?php

namespace Database\Seeders;

use App\Models\Challenger;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Challengers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $challenger = new Challenger();
        $challenger->name = 'Djesse & Jakob';
        $challenger->save();

        $challenger = new Challenger();
        $challenger->name = 'Ruben';
        $challenger->save();

        $challenger = new Challenger();
        $challenger->name = 'Nathan';
        $challenger->save();
    }
}
