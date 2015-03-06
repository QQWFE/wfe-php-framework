<?php
/**
 * @author liuxulei
 * 2015-3-6
 */

require_once ROOT_PATH.'/extra/Parsedown.php';

class Markdown_Parse {
    
    private $parsedown;
    
    public function __construct(){

        //$this->parsedown = new Parsedown();
    }
    
    public function change($content){
        
        return Parsedown::instance()
            ->setMarkupEscaped(false)
            ->text($content);
    }
}