<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;

class MyCustomComponent extends Component
{
    public function sayHello()
    {
        return "Hello from Component!";
    }
}
