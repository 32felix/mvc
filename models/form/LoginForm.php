<?php

class LoginForm
{
    public $login;
    public $password;

    private $_user = false;

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        if (!$this->getUser() || md5($this->password)!=$this->_user['pass'])
        {
            return false;
        }

        return true;
    }


    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login($post)
    {
        $this->login = $post['login'];
        $this->password = $post['password'];

        if ($this->validatePassword())
        {
            if (!empty($_SESSION['userId']))
                $_SESSION = [];


            $_SESSION['userId'] = $this->_user['id'];
            $_SESSION['userName'] = $this->_user['name'];
            $_SESSION['userEmail'] = $this->_user['email'];
            $_SESSION['userCreate'] = $this->_user['timeCreate'];

            (new Router)->getRegex();

            return true;
        }
        return false;
    }


    public function getUser()
    {
        if ($this->_user === false)
        {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM `User` WHERE login='" . $this->login . "'");
            $this->_user = $result->fetch_array(MYSQLI_ASSOC);
        }

        return $this->_user;
    }

}
