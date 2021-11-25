<?php

namespace Fk\Sauce\Exception;

use Exception;
use Fk\Sauce\Exception\Traits\{
    Generate,
    Problem,
    Toss
};

class SauceException extends Exception
{
    use Generate, Problem, Test;
}
