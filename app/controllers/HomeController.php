<?php

class HomeController extends Controller {

    function index() {
        $premium = new Course($this->db);
        $this->f3->set('premium',$premium->find("types=1 and status=1")); 
        $this->f3->set('free',$premium->find("types=0 and status=1"));      
        $this->f3->set('ESCAPE', FALSE);       
        $this->f3->set('view', 'page/index.html');
    }

    function terms(){
        $this->f3->set('view', 'page/syarat_ketentuan.html');
    }

    function about(){
        $this->f3->set('view', 'page/about.html');
    }
    
    function kelas(){       
        $premium = new Course($this->db);
        $this->f3->set('premium',$premium->find("types=1 and status=1")); 
        $this->f3->set('free',$premium->find("types=0 and status=1"));      
        $this->f3->set('ESCAPE', FALSE);      
        $this->f3->set('view', 'page/kelas.html');
    }

    function detail(){
        $id=$this->f3->get('PARAMS.id');
        $course = new Course($this->db);
        $items = new Item($this->db);
        $this->f3->set('course',$course->load(array('id=?',$id)));    
        $this->f3->set('items', $items->find("course_id=$id"));  
        $this->f3->set('ESCAPE', FALSE);  
        $this->f3->set('view', 'page/detail.html');
    }

}
