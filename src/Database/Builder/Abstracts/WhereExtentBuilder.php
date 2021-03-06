<?php

namespace Fk\Sauce\Database\Builder\Abstracts;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class WhereExtentBuilder
{
    /**
     * The index on queue.
     * 
     * @var string
     */
    private string $queueIndex = '';

    /**
     * The column on queue.
     * 
     * @var string
     */
    private string $queueColumn = '';

    /**
     * Injected request.
     * 
     * @var \Illuminate\Http\Request
     */
    private Request $request;

    /**
     * Request usage.
     * 
     * @var string
     */
    private string $requestUsage = 'query';

    /**
     * Store the data to be converted.
     * 
     * @var array
     */
    private array $data;

    /**
     * Set the request.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function with(Request $request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Set the index to be built.
     * 
     * @param  string  $index
     * @return mixed
     */
    public function index(string $index)
    {
        $this->queueIndex = $index;
        $this->queueColumn = $index;

        return $this;
    }

    /**
     * Set the column to be built
     * 
     * @param  string  $column
     * @return mixed
     */
    public function column(string $column)
    {
        $this->queueColumn = $column;

        return $this;
    }

    /**
     * Execute the mode.
     * 
     * @param  string  $mode
     * @param  array   $args
     * @return mixed
     */
    public function mode($mode, $args = [])
    {
        $args = is_array($args) ? $args : explode('|', $args);

        $mode = Str::camel($mode);
        $this->{$mode.'Mode'}(...$args);

        return $this;
    }

    /**
     * Get the data collection.
     * 
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * Prettier version of "toArray" method.
     * 
     * @return array
     */
    public function done()
    {
        return $this->toArray();
    }

    /**
     * Add data dynamically
     * 
     * @param  array  ...$args
     * @return void
     */
    protected function add(...$args)
    {
        foreach ($args as $arg) $this->data[] = $arg;
    }

    /**
     * @param  string  $queueIndex
     * @return bool
     */
    protected function valueNotAll(string $queueIndex) : bool
    {
        return $this->value($queueIndex, '*') !== '*';
    }

    /**
     * Get the value dynamically based on the request usage.
     * 
     * @param  string  $queueIndex
     * @param  mixed  $default
     * @return mixed
     */
    protected function value(string $queueIndex, $default)
    {
        return $this->request->{$this->requestUsage}($queueIndex, $default);
    }
}
