<?php


class AppController extends Controller {
    var $components = array(
        'Auth' => array(
            'authenticate' => array('Form')
         ),
        'RequestHandler'
    );

    public function  beforeFilter() {
        $user = array();
        if($this->Session->check("user")){
            $user = $this->Session->read('user');
        }
        $this->set('user',$user);
    }
}
?>