<?php

namespace App\Exception;

/**
* @package App Exception
*/
class AuthException extends \VM\Exception\Exception
{
    /**
     * HTTP STATUS
     *
     * @var int
     */
    protected $status = 401;

    /**
     * HTTP Exception Message
     * @var string
     */
    protected $message = 'Authorization Exception';

}