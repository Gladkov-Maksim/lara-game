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
            ->inRandomOrder()
            ->get()
            ->toArray();
    }

    /**
     * Запуск события
     */
    public function run(): void
    {
        stdoutSlow("Теперь тебе предстоит ответить на несколько вопросов для перехода на следующий уровень!\n");
        foreach ($this->questions as $question) {
            stdoutSlow($question['text'] . "\n");
            $answer = readline();
            if ($answer === $question['answer']) {
                stdoutSlow("Верно!\n");
                $this->hero->setMoney($this->hero->getMoney() + $question['cost']);
            }
            else {
                stdoutSlow("Неверный ответ\n");
                $this->hero->setMoney($this->hero->getMoney() - $question['cost']);
            }

            $this->hero->showState();
        }
    }
}
