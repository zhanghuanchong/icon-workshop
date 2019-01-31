<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 2019/1/31
 * Time: 18:03
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getService()
    {
        return null;
    }
}