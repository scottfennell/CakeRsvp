<?php
App::uses('AppController', 'Controller');
/**
 * Rsvp Controller
 *
 * @property User $User
 */
class RsvpController extends AppController {

    var $name = 'Rsvp';
    var $components = array('Auth', 'Session'); // Not necessary if declared in your app controller
    var $uses = array('Invite');
    
    function beforeFilter() {
        $this->Auth->allow('*');
    }

    public function search($srch) {
        $this->layout = 'ajax';

        $users = $this->Invite->find('all',array(
            'conditions'=>array(
                'OR' => array(
                    'name LIKE'=>"%".$srch."%",
                    'code'=>$srch
                )
            )
        ));

        $this->set("invites",$users);
    }
    
    public function add() {
        $this->layout = "home";
        if(!empty($this->data)){
            $hash = $this->data['Invite']['test_hash'];
            $answer = $this->data['Invite']['test'];
            $invite = $this->data;
            $invite['Invite']['comments'] = "[User was added via web]\n".var_export($_SERVER,true);
            $invite['Invite']['uid'] = String::uuid();
            if(md5($answer) == $hash){
                if($this->Invite->save($invite)){                    
                    $id = $this->Invite->getLastInsertID();
                    $invite = $this->Invite->findById($id);                    
                    $this->_sendMail($invite);                    
                    $this->flash("Thanks for RSVPing!", "/rsvp/confirm/{$invite['Invite']['uid']}");
                }
            } else {
                $this->Session->setFlash("Nope, Not Human!");
            }             
        }
    }
    
    public function qr($code) {
        $user = $this->Invite->find('first',array(
            'conditions'=>array(
                'code'=>$code
            )
        ));
        
        if(!empty($user)){
            $this->redirect('/rsvp/edit/'.$user['Invite']['uid']);
        }else{
            $this->Session->setFlash("We couldn't find you!");
            $this->redirect('/');
        }
    }

    public function edit($uid) {
        $this->layout = "home";
        $user = $this->Invite->find('first',array(
            'conditions'=>array(
                'uid'=>$uid
            )
        ));


        if(!empty($this->data)){
            $hash = $this->data['Invite']['test_hash'];
            $answer = $this->data['Invite']['test'];
            if(md5($answer) == $hash){
                $user = am($user,$this->data);
                $user['Invite']['confirm'] = true;
                if($this->Invite->save($user)){
                    $this->_sendMail($user);
                    $this->flash("Thanks for RSVPing!", "/rsvp/confirm/$uid");
                }
            } else {
                $this->Session->setFlash("Nope, Not Human!");
            }            
        } else {
            $this->data = $user;            
        }
        
        $this->Session->write('user',$user);
        $this->set('invite',$user);
    }

    public function confirm($uid){
        $this->layout = 'home';
        $user = $this->Invite->find('first',array(
            'conditions'=>array(
                'uid'=>$uid
            )
        ));
        $this->set("user",$user);
    }

    private function _sendMail($user){
        $iv = $user['Invite'];
        $to      = 'sj@scottandjavaneh.us';
        $subject = $iv['name'].' has RSVPd for your wedding!';
        $message = "{$iv['name']} has RSVPd for your wedding for {$iv['num_people']} with the comment {$iv['user_comments']}";
        $headers = 'From: sj@scottandjavaneh.us' . "\r\n" .
            'Reply-To: sj@scottandjavaneh.us' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
 }

?>