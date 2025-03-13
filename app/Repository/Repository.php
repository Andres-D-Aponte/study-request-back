<?php

namespace App\Repository;

class Repository
{
    public function save($model){
        $model->save();
        return $model;
    }

    public function update($model){
        $model->update();
        return $model;
    }

    public function delete($model){
        $model->delete();
    }
}