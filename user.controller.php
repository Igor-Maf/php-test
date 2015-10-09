<?php 
	// $users['user_id'] = array('nickname' => 'Ihor Gevorkyan');
	
class UserController {
    private $msg = '', 
            $msg_type = false,
            $_model;

    public function __construct() {
        $this->_model = new UserModel;

        if (filter_input(INPUT_POST, 'submit'))
            $this->watcherForm(filter_input(INPUT_POST, 'oldNickname'), filter_input(INPUT_POST, 'newNickname'));
    }
    
    public function getUsers() {
        return $this->_model->getUsers();
    }

    public function watcherForm($old_nickname_id, $new_nickname) {
        if ($this->_model->validateUserId($old_nickname_id)) {
            if ($this->_model->validateNickName($new_nickname)) {

                $old_nickname = $this->_model->getNameById($old_nickname_id);

                $this->_model->changeName($old_nickname_id, $new_nickname);

                $this->setMsg(
                    'You changed ' . $old_nickname . ' to ' . $new_nickname, 
                    true
                );
            } else
                $this->setMsg('Bad nickname.');
        } else
            $this->setMsg('Select which user name your would like to change.');
    }

    public function setMsg($msg, $msg_type = false) {
        $this->msg = $msg;
        $this->msg_type = $msg_type;
    }

    public function getMsg() {
        return $this->msg;
    }

    public function getMsgType() {
        return $this->msg_type;
    }
}