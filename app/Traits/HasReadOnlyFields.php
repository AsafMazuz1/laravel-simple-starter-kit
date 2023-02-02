<?php

namespace App\Traits;
use App\Exceptions\CannotUpdateReadOnlyField;
use Illuminate\Database\Eloquent\Model;

trait HasReadOnlyFields
{
    protected array $writableFields = [];

    public function writable(array $fields): self
    {
        $this->writableFields = array_merge($this->writableFields, $fields);
        return $this;
    }

    public static function bootHasReadOnlyFields()
    {
        static::updating(function (Model $model) {
            $violatingFields = array_intersect(array_keys($model->getDirty()), $model->getReadOnlyFields());
            $violatingFields = array_diff($violatingFields, $model->writableFields ?? []);

            if(count($violatingFields) > 0){
                throw CannotUpdateReadOnlyField::forFields($violatingFields);
            }

            $model->writableFields = [];
        });
    }

    public function getReadOnlyFields(): array
    {
        return $this->readOnlyFields ?? [];
    }


}
