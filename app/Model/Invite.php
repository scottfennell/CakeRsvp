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
				'rule' => array('numeric')
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'range' => array(
                'rule'=> array('range',-1,10),
                'message'=>"Seriously???!!11!! Do you really plan on bringing that many people, or are you just trying to screw with us? :-P If you really plan on bringing that many, please rsvp by phone or email"
            )
		),
        'email' => array(
            'email'=>array(
                'rule'=>'email',
                'required'=>false,
                'allowEmpty'=>true,
                'message'=>"Either leave this blank or enter a valid email address, thanks!"
            )
        )
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
