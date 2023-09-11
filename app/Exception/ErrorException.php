<?php

namespace App\Exception;

/**
* @package App Exception
*/
class ErrorException extends \VM\Exception\Exception
{
    /**
     * HTTP STATUS
     *
     * @var int
     */
    protected $status = 500;

    /**
     * HTTP Exception Message
     * @var string
     */
    protected $message = 'Not Found!';

}