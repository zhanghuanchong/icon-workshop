<?php

/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2017/7/1
 * Time: 上午1:13
 */
class Requirement extends Eloquent
{
    const STATUS_NEW = 'new';
    const STATUS_VOTING = 'voting';
    const STATUS_WORKING = 'working';
    const STATUS_DONE = 'done';

    public $fillable = [
        'title', 'vote', 'status',
    ];
}