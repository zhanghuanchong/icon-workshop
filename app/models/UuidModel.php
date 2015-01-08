<?php
/**
 * Created by PhpStorm.
 * User: ezbur_000
 * Date: 1/8/15
 * Time: 4:56 PM
 */

class UuidModel extends Eloquent {

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Attach to the 'creating' Model Event to provide a UUID
         * for the `id` field (provided by $model->getKeyName())
         */
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string)$model->generateNewId();
        });
    }

    /**
     * Get a new version 4 (random) UUID.
     *
     * @return \Nathanmac\GUID\Facades\GUID
     */
    public function generateNewId()
    {
        return GUID::generate();
    }

} 