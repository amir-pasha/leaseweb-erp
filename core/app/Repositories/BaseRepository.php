<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    abstract public function getModel();

    public function index()
    {
        return $this->getModel()->query();
    }

    public function create(array $data, bool $runAfterCreate = true)
    {
        $model = $this->getModel()->create($data);

        if ($runAfterCreate) {
            $this->afterCreate($model, $data);
            $model->refresh();
        }

        return $model;
    }

    public function afterCreate(Model $model, array $data)
    {
        //
    }

    public function beforeDelete(Model $model)
    {
        return $model;
    }

    public function delete(Model $model, bool $runBeforeDelete = true)
    {
        if ($runBeforeDelete) {
            $model = $this->beforeDelete($model);
        }


        $model->delete();
    }
}
