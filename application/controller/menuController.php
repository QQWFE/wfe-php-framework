<?php
/**
 * @author liuxulei
 * 2015-2-15
 * admin_menuController.php
 */

class menuController extends Controller_Action {
    
    public function index(){
        
        $this->view();
    }
    
    public function add(){
        
        $this->view();
    }
	
	public function achieve(){
		
		$result = $this->table('menu')->fetch_all();
		$this->ajax($result);
	}
    
    public function do_add(){
        
        $chinese_name = $this->post_var('chinese_name', true);
        $english_name = $this->post_var('english_name', true);
        
        $data = array(
            'chinese_name' => $chinese_name,
            'english_name' => $english_name,
        );
        $result = $this->table('menu')->insert($data);
        
        $this->redirect('/menu/list');
    }
}