<?php

interface QuestionInterface
{
    public function get(): string;

    public function isRightAnswer(string $userAnswer): bool;
}