<?php

namespace App\Level;

use App\Collection\EventCollection;
use App\Hero;

class Level2 implements LevelInterface
{
    private EventCollection $eventCollection;
    private Hero $hero;

    public function __construct(Hero $hero)
    {
        $this->hero = $hero;

        $eventsSet = [
            'question' => [
                'count' => 3,
                'difficultyLevel' => 'easy'
            ],
            'battle' => [
                'count' => 1,
                'difficultyLevel' => 'easy'
            ]
        ];

        $this->eventCollection = new EventCollection($eventsSet, $this->hero);
    }

    public function run()
    {
        stdoutSlow("Поздравляю! Ты прошел первое испытание, но это только начало...\n");
        foreach ($this->eventCollection->getAll() as $event) {
            $event->run();
        }

    }
}
