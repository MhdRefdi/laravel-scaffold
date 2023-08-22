<?php
    namespace App\Models\Traits;

    use Illuminate\Support\Str;

    trait HasUuid
    {
        public static function bootHasUuid()
        {
            static::creating(function ($model) {
                $model->keyType = 'string';
                $model->incrementing = false;

                $model->{$model->getKeyName()} = $model->{$model->getKeyName()} ?: (string) Str::orderedUuid();
            });
        }

        public function getIncrementing()
        {
            return false;
        }

        public function getKeyType()
        {
            return 'string';
        }
    }
