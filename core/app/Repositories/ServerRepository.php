<?php

namespace App\Repositories;


use App\Models\Ram;
use App\Models\Server;
use Illuminate\Support\Arr;

class ServerRepository extends BaseRepository
{
    public function getModel()
    {
        return new Server();
    }

    public function index()
    {
        return $this->getModel()->query()->with([
            'brand' => function ($query) {
                return $query->select('id', 'name');
            },
            'ramModules' => function ($query) {
                return $query->select('type', 'size', 'amount');
            }])
            ->orderBy('created_at', 'desc');
    }

    public function afterCreate($model, $data)
    {
        foreach (Arr::get($data,'ram_modules') as $module) {
            $model->ramModules()->attach(
                Ram::query()->where('size', Arr::get($module, 'size'))->first(),
                [
                    'type' => Arr::get($module, 'type'),
                    'amount' => Arr::get($module, 'amount')
                ]
            );
        }
    }

    public function beforeDelete($model)
    {
        $model->ramModules()->detach();
        $model->refresh();

        return $model;
    }
}
