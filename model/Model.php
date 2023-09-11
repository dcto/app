<?php

namespace App\Model;

/**
 * The Base Class App\Model
 * 
 * @package App\Model
 *
 */
abstract class Model extends \VM\Model
{
    /**
     * 分页数
     * @var int
     */
    public $perPage = 20;

    /**
     * Automatically maintained
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     * Auto hidden deleted_at 
     */
    protected $hidden = ['deleted_at'];
}