<?php

namespace App\Level;

use App\Collection\EventCollection;

class Level1 implements LevelInterface
{
    private EventCollection $eventCollection;

    public function __construct()
    {
        $eventsSet = [
            'question' => [
                'count' => 2,
                'difficultyLevel' => 'easy'
            ]
        ];

        $this->eventCollection = new EventCollection($eventsSet);
    }

    public function run()
    {
       echo "Это начало первого уровня\n";
       foreach ($this->eventCollection->getAll() as $event) {
           $event->run();
       }

    }
}
