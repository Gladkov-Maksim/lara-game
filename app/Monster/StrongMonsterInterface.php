<?php

namespace Monster;

use QuestionInterface;

interface StrongMonsterInterface
{
    public function getQuestion(): QuestionInterface;
}