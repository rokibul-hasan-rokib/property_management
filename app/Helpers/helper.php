<?php

use Illuminate\Support\Facades\Log;

/**
 * @param string $message
 * @return void
 */
function alert_success(string $message): void
{
    session()->flash('message', $message);
    session()->flash('class', 'success');
}

/**
 * @param string $message
 * @return void
 */
function alert_error(string $message): void
{
    session()->flash('message', $message);
    session()->flash('class', 'danger');
}

/**
 * @param string $name
 * @param Throwable $throwable
 * @param string $type
 * @return void
 */
function log_write(string $name, Throwable $throwable, string $type = 'info'): void
{
    Log::critical($name, ['message' => $throwable->getMessage(), 'line' => $throwable->getLine(), 'file' => $throwable->getFile(), 'trace' => $throwable->getTraceAsString(), 'code' => $throwable->getCode(), 'throwable' => $throwable]);
}