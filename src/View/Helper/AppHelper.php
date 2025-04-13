<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;

class AppHelper extends Helper
{
    public function formatDate($date)
{
    if ($date instanceof \Cake\I18n\FrozenTime) {
        return $date->format('d-m-Y');
    }
    return date('d-m-Y', strtotime($date));
}

    public function greet($name)
    {
        return "Hello, " . ucfirst($name);
    }
}
