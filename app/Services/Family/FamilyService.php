<?php


namespace App\Services\Family;


class FamilyService
{

    public function __construct(PersionService $persion,TvService $tv)
    {
        $this->persion = $persion;
        echo '访问了Family类';

    }
    //调用方法 persion 中的方法
    public function getPersion(){

        $this->persion->getPersion();
    }

}
