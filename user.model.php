<?php
class UserModel {
	private $users = array(
        1 => "James Bond",
        2 => "John Doe",
        3 => "Alex Trim",
        4 => "Josh Matwew"
    );

    public function getNameById($id) {
        return $this->users[$id];
    }

    public function getUsers() {
        return $this->users;
    }

    public function changeName($old_nickname_id, $new_nickname) {
        if (!$old_nickname_id || !$new_nickname)
            return false;

        $this->users = array_replace($this->users, array(
            $old_nickname_id => $new_nickname
        ));

        return $this->users[$old_nickname_id];
    }

    public function validateNickname($new_nickname) {
        return preg_match('/^[a-zA-Z0-9_.-]{3,20}$/', $new_nickname);
    }

    public function validateUserId($old_nickname_id) {
        return isset($this->users[$old_nickname_id]);
    }
}	 