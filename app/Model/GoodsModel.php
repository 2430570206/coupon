<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{

}
class GoodsModel extends Model
{
    protected $table = 'goods';
    protected  $primaryKey = 'id';
    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo(Cate::class, 'cate_id');

    }

}
