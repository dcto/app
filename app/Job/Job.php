<?php

namespace App\Job;

/**
 * 定时计划任务
 * 
 */
class Job {
    /*
    * 秒级时间格式兼容Linux Crontab 
    * 0    1    2    3    4    5
    * *    *    *    *    *    *
    * -    -    -    -    -    -
    * |    |    |    |    |    |
    * |    |    |    |    |    +----- day of week (0 - 6) (Sunday=0)
    * |    |    |    |    +----- month (1 - 12)
    * |    |    |    +------- day of month (1 - 31)
    * |    |    +--------- hour (0 - 23)
    * |    +----------- min (0 - 59)
    * +------------- sec (0-59)
    */
    public $crontab = '*/5 * * * * *';

    /**
     * 时区
     */
    public $timezone = 'PRC';

    /**
     * 状态true=启用，false=禁用
     */
    public $status = true;

    /**
    * 执行计划
    */
    public function execute()
    {
        echo "execute job at: ", date("Y-m-d H:i:s").PHP_EOL;
    }
}