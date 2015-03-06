<?php
/**
 * @author liuxulei
 * 2015-2-20
 */

class File_Operation {
    
    public static function write($file, $contents){
        $result = @file_put_contents($file, $contents);
        return $result;
    }
    
    public static function read($file){
        $result = @file_get_contents($file);
        return $result;
    }
}