<?php

    function readCsv($csv_file_path){
        // CSV取得
        $file = new SplFileObject($csv_file_path);
        $file->setFlags(
            // CSVとして行を読み込み
            SplFileObject::READ_CSV |
            // 先読み／巻き戻しで読み込み
            SplFileObject::READ_AHEAD |
            // 空行を読み飛ばす
            SplFileObject::SKIP_EMPTY |
            // 行末の改行を読み飛ばす
            SplFileObject::DROP_NEW_LINE
        );
        $students = [];
        // 一行ずつ処理
        foreach($file as $line)
            array_push($students, $line);
        return $students;
    }