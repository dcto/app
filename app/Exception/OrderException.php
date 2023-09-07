<?php

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
    protected $status = 600;

    /**
     * HTTP Exception Message
     * @var string
     */
    protected $message = 'User Exception';

}