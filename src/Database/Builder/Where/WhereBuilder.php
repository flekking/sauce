<?php

namespace Fk\Sauce\Database\Builder\Where;

use Illuminate\Support\Str;
use Fk\Sauce\Database\Builder\Where\Modes\Date\{
    DateBetweenMode,
};
use Fk\Sauce\Database\Builder\Where\Modes\Flag\{
    BooleanMode,
    BooleanToTimestamp,
};
use Fk\Sauce\Database\Builder\Where\Modes\Id\{
    IdArrayMode,
    IdMode,
};
use Fk\Sauce\Database\Builder\Where\Modes\Misc\{
    CallbackMode,
};
use Fk\Sauce\Database\Builder\Where\Modes\Str\{
    NullableStringMode,
    StrictStringMode,
    StringMode,
};

class WhereBuilder extends WhereExtentBuilder
{
    use DateBetweenMode;
    use BooleanMode, BooleanToTimestampMode;
    use IdArrayMode, IdMode;
    use CallbackMode;
    use NullableStringMode, StrictStringMode, StringMode;
}
