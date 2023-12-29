<?php

namespace App\Event;

use Enum\EventTypeEnum;

interface EventInterface
{
    public function run(): void;
//    public function getConditions();
//
//    public function execute(string $userChoice): string;
//
//    public function getType(): EventTypeEnum;
//
//    public function isCompleted(): bool;
}
