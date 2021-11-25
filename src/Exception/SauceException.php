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
    /**
     * @var array
     */
    protected $messages = [];

    /**
     * @static
     * @return  \Exception
     */
    public static function new() : Exception
    {
        return new self;
    }

    /**
     * @param  mixed  $problem
     * @param  array  $replacers
     * @return void
     */
    public function problem($problem, $replacers = [])
    {
        // Get the message from stored problem.
        $message = $this->messages[$problem];

        // Replace the string with specified arguments.
        foreach ($replacers as $index => $replace) {
            $index = ':'.$index;
            $replace = is_array($replace) ? json_encode($replace) : $replace;

            $message = Str::replaceFirst($index, $replace, $message);
        }

        $this->message = $message;
    }

    /**
     * Help the chaining method to return \Exception instance by default.
     * 
     * @return \Exception
     */
    public function toss() : Exception
    {
        return $this;
    }
}
