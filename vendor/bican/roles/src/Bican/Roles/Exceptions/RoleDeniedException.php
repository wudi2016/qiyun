<?php

namespace Bican\Roles\Exceptions;

class RoleDeniedException extends AccessDeniedException
{
    /**
     * Create a new role denied exception instance.
     *
     * @param string $role
     */
    public function __construct($role)
    {
        return Redirect() -> back() -> with( 'error', '您没有权限访问' );
        // $this->message = sprintf("You don't have a required ['%s'] role.", $role);
    }
}
