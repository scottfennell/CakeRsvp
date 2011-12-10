<?php


class AppController extends Controller {
    var $components = array(
        'Auth' => array(
            'authenticate' => array('Form')
         )
    );
}
?>