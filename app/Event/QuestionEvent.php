<?php

namespace App\Event;

use App\Models\Question;
use App\Event\EventInterface;
use App\Hero;

class QuestionEvent implements EventInterface
{
    private int $count;
    private string $difficultyLevel;
    private array $questions;
    private Hero $hero;

    public function __construct(int $count, string $difficultyLevel, Hero $hero)
    {
        $this->count = $count;
        $this->difficultyLevel = $difficultyLevel;
        $this->hero = $hero;

        $this->questions = Question::select('text', 'answer', 'cost')
            ->where('difficultyLevel', $this->difficultyLevel)
            ->limit($this->count)
            ->get()
            ->toArray();
    }

    /**
     * Запуск события
     */
    public function run(): void
    {
        foreach ($this->questions as $question) {
            $answer = readline($question['text'] . "\n");
            if ($answer === $question['answer']) {
                echo  "Верно!\n";
                $this->hero->setMoney($this->hero->getMoney() + $question['cost']);
            }
            else {
                echo "Неверный ответ\n";
                $this->hero->setMoney($this->hero->getMoney() - $question['cost']);
            }

            $this->hero->showState();
        }
    }
}
