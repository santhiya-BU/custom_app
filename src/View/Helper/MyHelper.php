<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

class MyHelper extends Helper
{
    public function greet($name)
    {
        return "Hi, " . ucfirst($name);
    }
}
