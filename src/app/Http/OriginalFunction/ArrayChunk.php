<?php

    function arrayChunkObject($model_object,int $num){
        $model_ary = [];
        foreach($model_object as $model){
            array_push($model_ary, $model);
        }
        $model_ary = array_chunk($model_ary, $num);
        return $model_ary;
    }