<?php

namespace Fk\Sauce\Export;

use Fk\Sauce\Exception\SauceException;

class ExportException extends SauceException
{
    /**
     * @var array
     */
    protected $messages = [
        'invalid_format' =>
            'Export format \':format\' is invalid. Available formats are \':available\'.',
    ];
}
