<?php

namespace Fk\Sauce\Database\Builder\Extent;

use Illuminate\Support\Str;
use Fk\Sauce\Database\Builder\Extent\Modes\{
    BooleanMode,
};

class ExtentBuilder extends WhereExtentBuilder
{
    use BooleanMode;
}
