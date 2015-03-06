<?php
/**
 * @author liuxulei
 * 2015-2-19
 */

class bookController extends Controller_Action {
    
    public function index(){
        $param = $this->get_var('param', true, 'base');
        $file = File_Directory::get_file('/files/book', $param, '.html');
        if(is_file($file) === false){
            $contents = '暂时无此内容';
        }else{
            $contents = File_Operation::read($file);
        }
        
        $markdown = new Markdown_Parse();
        $contents = $markdown->change($contents);
        $data = array('contents' => $contents);
        $this->view($data);
    }
}