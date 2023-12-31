<?php

/**
 * Хелпер для посимвольного вывода строки
 */
function stdoutSlow(string $string): void
{
    $chrArray = preg_split('//u', $string, null, PREG_SPLIT_NO_EMPTY);
    foreach ($chrArray as $char) {
        echo $char === '|' ? "\n" : $char;
        usleep(50 * 1);
    }
}
