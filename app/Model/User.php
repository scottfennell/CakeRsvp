<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';
    function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }
}
