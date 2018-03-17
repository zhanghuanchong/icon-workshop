<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * 
 * User: hans
 * Date: 2017/7/1
 * Time: 上午1:13
 *
 * @property int $id
 * @property string $title
 * @property int $vote
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string|null $deleted_at
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Requirement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Requirement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Requirement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Requirement whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Requirement whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Requirement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Requirement whereVote($value)
 * @mixin \Eloquent
 */
class Requirement extends Model
{
    const STATUS_NEW = 'new';
    const STATUS_VOTING = 'voting';
    const STATUS_WORKING = 'working';
    const STATUS_DONE = 'done';

    public $fillable = [
        'title', 'vote', 'status',
    ];
}