<?php

namespace Fk\Sauce\Exception\Traits;

use Illuminate\Support\Str;

trait Problem
{
    /**
     * @param  mixed  $problem
     * @param  array  $replacers
     * @return mixed
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

        return $this;
    }
}
