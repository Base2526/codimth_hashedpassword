<?php

namespace Drupal\codimth_hashedpassword;

use Drupal\Component\Utility\Crypt;
use Drupal\Core\Password\PhpassHashedPassword;
use Drupal\Core\Password\PasswordInterface;

/**
 * Class CodimthHashedPasswordService
 * @package Drupal\codimth
 */
class CodimthHashedPasswordService extends PhpassHashedPassword implements PasswordInterface
{

    /**
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public function check($password, $hash)
    {
        if ($password) {
            $computed_hash = md5($password);
            return $computed_hash && Crypt::hashEquals($hash, $computed_hash);
        }
        return parent::check($password, $hash);
    }
}
