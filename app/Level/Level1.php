<?php

namespace App\Level;

use App\Collection\EventCollection;
use App\Hero;

class Level1 implements LevelInterface
{
    private EventCollection $eventCollection;
    private Hero $hero;

    public function __construct(Hero $hero)
    {
        $this->hero = $hero;

        $eventsSet = [
            'question' => [
                'count' => 2,
                'difficultyLevel' => 'easy'
            ],
//            'battle' => [
//                'count' => 1,
//                'difficultyLevel' => 'easy'
//            ]
        ];

        $this->eventCollection = new EventCollection($eventsSet, $this->hero); // Опять прокидываю героя еще глубже
    }

    public function run()
    {
       stdoutSlow("Вы попали на таинственный остров, где вам предстоит пройти много испытаний для получения главного приза - оффера IT компании!\n");
       foreach ($this->eventCollection->getAll() as $event) {
           $event->run();
       }

    }
}
