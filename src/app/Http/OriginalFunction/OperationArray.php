<?php

    // 二次元配列を一次元配列に変換する
    function convertArray1D($ary2D){
        $convertedAry = [];
        foreach($ary2D as $ary){
            foreach($ary as $column){
                array_push($convertedAry, $column);
            }
        }
        return $convertedAry;
    }