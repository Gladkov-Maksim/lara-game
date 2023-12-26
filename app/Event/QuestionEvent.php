<?php

namespace App\Event;

use App\Models\Question;
use App\Event\EventInterface;

class QuestionEvent implements EventInterface
{
    private int $count;
    private string $difficultyLevel;
    private array $questions;

    public function __construct(int $count, string $difficultyLevel)
    {
        $this->count = $count;
        $this->difficultyLevel = $difficultyLevel;

        $this->questions = Question::select('text', 'answer', 'cost')
            ->where('difficultyLevel', $this->difficultyLevel)
            ->limit($this->count)
            ->get()
            ->toArray();
    }

    public function run()
    {
        foreach ($this->questions as $question) {
            $answer = readline($question['text'] . "\n");
            echo $answer === $question['answer'] ? "Верно!\n" : "Неверный ответ\n";
        }
    }
}
