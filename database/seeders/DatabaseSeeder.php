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
         \App\Models\Question::insert([
            ['text'=> 'PHP - это язык ...', 'answer'=> 'программирования', 'cost' => 100, 'difficultyLevel' => 'easy'],
            ['text'=> 'В каком году появился PHP?', 'answer'=> '1995', 'cost' => 120, 'difficultyLevel' => 'easy'],
            ['text'=> 'Максимальная версия PHP на сегодняшний день - ...', 'answer'=> '8.3', 'cost' => 130, 'difficultyLevel' => 'easy'],
            ['text'=> 'Linux - это ...', 'answer'=> 'операционная система', 'cost' => 200, 'difficultyLevel' => 'medium'],
            ['text'=> '<div></div> - это HTML ...', 'answer'=> 'тег', 'cost' => 210, 'difficultyLevel' => 'medium'],
            ['text'=> 'Столица России - ...', 'answer'=> 'Москва', 'cost' => 235, 'difficultyLevel' => 'medium'],
            ['text'=> 'Какой сейчас год?', 'answer'=> '2023', 'cost' => 350, 'difficultyLevel' => 'hard'],
            ['text'=> 'На какой планете мы живем?', 'answer'=> 'Земля', 'cost' => 365, 'difficultyLevel' => 'hard'],
            ['text'=> 'США - это ...', 'answer'=> 'страна', 'cost' => 400, 'difficultyLevel' => 'hard'],
        ]);
    }
}
