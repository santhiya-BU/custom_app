<?php
declare(strict_types=1);

namespace App\Model\Behavior;

use Cake\ORM\Behavior;

class MyLoggerBehavior extends Behavior
{
    public function logAction($message)
    {
        file_put_contents(LOGS . 'mylogger.log', $message . PHP_EOL, FILE_APPEND);
    }
}
