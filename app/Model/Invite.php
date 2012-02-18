<?php
App::uses('AppModel', 'Model');
/**
 * Invite Model
 *
 */
class Invite extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'num_people' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        
        public function afterSave($created){
//            if(empty($this->data['Invite']['uid'])){
//                $this->saveField('uid',String::uuid());
//            }
//            if(empty($this->data['Invite']['code'])){
//                $this->saveField('code',$this->gencode());
//            }
            
        }
        
        public function gencode($l = 4){
            return substr(md5(uniqid(mt_rand(), true)), 0, $l);
        }
}
