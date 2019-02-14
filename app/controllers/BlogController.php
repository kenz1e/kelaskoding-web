<?php

class BlogController extends Controller {

    function index() {
        $blogs = new Blog($this->db);
        $this->f3->set('blogs',$blogs->find("status=1"));
        $this->f3->set('ESCAPE', FALSE);     
        $this->f3->set('view', 'page/blogs.html');
    }

    function read(){
        $blogId = $this->f3->get('PARAMS.blogId');
        $blog = new Blog($this->db);
        $this->f3->set('blog',$blog->load(array('id=?',$blogId)));            
        $this->f3->set('ESCAPE', FALSE);      
        $this->f3->set('view', 'page/blog_detail.html');
    }

}