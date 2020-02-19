<?php

class Pages extends Controller{
    
    public function __construct() {
        
    }
    
    public function index() {
    
      $data = [
        'title' => 'Share Posts',
        'description' => 'simple social network  build on the mvc php framework'
      ];
        
      $this->view('pages/index', $data);
    }
    
    public function about() {
        $data = [
        'title' => 'About',
        'description' => 'About application that your going to use'
      ];
         $this->view('pages/about', $data);
    }
}
?>