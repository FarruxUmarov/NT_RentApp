<?php

namespace App;

class Session
{
    public function getUser()
    {
        if ($_SESSION['user']) {
            return $_SESSION['user'];
        }
        return null;
    }

    public function getId()
    {
        if (isset($this->getUser()['id'])) {
            return $this->getUser()['id'];
        }

        return '';
    }
    public function getName()
    {
        if (isset($this->getUser()['name'])) {
            return $this->getUser()['name'];
        }
        return '';
    }

    public function roleId()
    {
        if (isset($this->getUser()['role_id'])) {
            return $this->getUser()['role_id'];
        }
        return '';
    }
}