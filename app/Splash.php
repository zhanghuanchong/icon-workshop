<?php

namespace App;
use App\Services\SplashService;
use Emadadly\LaravelUuid\Uuids;

/**
 * App\Splash
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $folder
 * @property mixed|null $config
 * @property string|null $user_agent
 * @property string|null $ip
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Splash whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Splash whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Splash whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Splash whereFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Splash whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Splash whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Splash whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Splash whereUserAgent($value)
 * @property string $uuid
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Splash uuid($uuid, $first = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Splash whereUuid($value)
 */
class Splash extends BaseModel
{
    use Uuids;

    protected $table = 'splash';

    public $casts = [
        'config' => 'array',
    ];

    public function getService()
    {
        return new SplashService($this);
    }

    public function getPlatformAttribute()
    {
        return $this->config['platforms'] ?? [];
    }

    public function delete()
    {
        $this->getService()->deleteFolder();
        parent::delete();
    }

    public function deleteCache()
    {
        $this->getService()->deleteCache();
    }
}
