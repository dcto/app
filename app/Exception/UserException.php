<?php

namespace App\Exception;

/**
* @package App Exception
*/
class UserException extends \VM\Exception\Exception
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
    protected $message = 'User Exception';

}