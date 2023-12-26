<?php

namespace App\Collection;

use App\Event\ObstacleEvent;
use App\Event\BattleEvent;
use App\Event\QuestionEvent;

class EventCollection
{
    private \Ramsey\Collection\Collection $collection;

    public function __construct(array $eventsSet)
    {
        $this->collection = new \Ramsey\Collection\Collection('App\\Event\\EventInterface');

        foreach ($eventsSet as $eventName => $eventData) {
            switch ($eventName) {
                case 'obstacle':
                    $event = new ObstacleEvent($eventData['count'], $eventData['difficultyLevel']);
                    break;
                case 'battle':
                    $event = new BattleEvent($eventData['count'], $eventData['difficultyLevel']);
                    break;
                case 'question':
                    $event = new QuestionEvent($eventData['count'], $eventData['difficultyLevel']);
                    break;
            }


            $this->collection->add($event);
        }
    }


    /**
     * Получение всех элементов коллекции
     */
    public function getAll(): \Ramsey\Collection\Collection
    {
        return $this->collection;
    }
}
