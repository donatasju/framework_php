<?php

namespace Core\User;

class Repository extends \Core\User\Model {

    public function register(\Core\User\User $user) {
        if (!$this->exists($user)) {
            $this->insert($user);

            return self::REGISTER_SUCCESS;
        }

        return self::REGISTER_ERR_EXISTS;
    }

}
