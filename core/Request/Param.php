<?php
/**
 * @author liuxulei
 * 2015-2-15
 * Request_Param.php
 */

class Request_Param {
    
    public static function get($key = null, $default = null, $xss_clean = false) {
        $val = self::_gpcs('_GET', $key, $default);
        return $xss_clean ? self::xss_clean($val) : $val;
    }
    
    public static function post($key = null, $default = null, $xss_clean = false) {
        $val = self::_gpcs('_POST', $key, $default);
        return $xss_clean ? self::xss_clean($val) : $val;
    }
    
    public static function request($key=null, $default=null, $xss_clean=false){
        $val = self::_gpcs('_REQUEST', $key, $default);
        return $xss_clean ? self::xss_clean($val) : $val;
    }
    
    private static function _gpcs($range, $key, $default) {
        if ($key === null) {
            return false;
        } else {
            switch ($range){
                case '_GET' :
                    $range = $_GET;
                    break;
                case '_POST':
                    $range = $_POST;
                    break;
                case '_REQUEST':
                    $range = $_REQUEST;
                    break;
                default :
                    $range = $_REQUEST; 
            }
            if(isset($range[$key])){
                return $range[$key];
            }
            $server_uri = $_SERVER['REQUEST_URI'];
            $server_uri_array = explode('/', $server_uri);
            foreach ($server_uri_array as $k => $v){
                if(isset($server_uri_array[(intval($k)+1)])){
                    $server_uri_array[$v] = $server_uri_array[(intval($k)+1)];
                }
            }
            if(isset($server_uri_array[$key])){
                return $server_uri_array[$key];
            }
            
            return $default !== null ? $default : null;
        }
    }
    
    public static function xss_clean($var) {
        if (is_array($var)) {
            foreach ($var as $key => $val) {
                if (is_array($val)) {
                    $var[$key] = self::xss_clean($val);
                } else {
                    $var[$key] = self::xss_clean0($val);
                }
            }
        } elseif (is_string($var)) {
            $var = self::xss_clean0($var);
        }
        return $var;
    }
    
    private static function xss_clean0($data) {
        $data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
        $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
        do {
            $old_data = $data;
            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|iframe|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        } while ($old_data !== $data);
        return $data;
    }
}