<?php
/**
 * @author liuxulei
 * 2015-2-20
 */

class File_Directory {
    
    public static function get_path($path){
        $path = ROOT_PATH.$path;
        if(!is_dir($path)){
            $result = @mkdir($path, 0777, true);
        }
        return $path;
    }
    
    public static function get_name($name, $suffix='.file'){
        return $name.$suffix;
    }
    
    public static function get_file($path, $name, $suffix='.file'){
        return self::get_path($path).'/'.self::get_name($name, $suffix);
    }
}