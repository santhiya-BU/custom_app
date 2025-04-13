<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

class AppTable extends Table
{
    public function logInfo($msg)
    {
        file_put_contents(LOGS . 'app_model.log', $msg . PHP_EOL, FILE_APPEND);
    }
}
