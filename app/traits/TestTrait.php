<?php
namespace App\traits;


trait TestTrait{
    public function getData($model){
        return $model::all();
    }
    public function scopeName($query){
        $query->where('name','Gianni Greenholt');
    }
}
