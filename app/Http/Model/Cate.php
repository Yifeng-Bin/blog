<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cate';
    protected $primaryKey = 'cid';
    protected $guarded = [];
    public $timestamps = false;


    public function tree() {
        $cate = $this->get();
        return $this->getTree($cate,'cid');
    }

    /**
     * 数组转换成树形数组
     * @Author wzb 2016-10-18
     **/
    public function getTree($data,$field_id='id',$field_pid='pid',$chailer='_chiler',$pid='0') {
        $arr = array();
        foreach ($data as $k => $v) {
            if($v->$field_pid == $pid){
                foreach ($data as $c => $cv) {
                    if($cv->$field_pid == $v->$field_id){
                        $data[$k][$chailer] = $data[$c];
                    }
                }
                $arr[] = $data[$k];
            }
        }
        return $arr;
    }

}
