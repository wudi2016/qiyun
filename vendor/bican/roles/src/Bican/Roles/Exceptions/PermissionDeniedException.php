<?php

namespace Bican\Roles\Exceptions;

class PermissionDeniedException extends AccessDeniedException
{
    /**
     * Create a new permission denied exception instance.
     *
     * @param string $permission
     */
    public function __construct($permission)
    {
        return Redirect() -> back() -> with( 'error', '您没有权限访问' );
        // $this->message = sprintf("You don't have a required ['%s'] permission.", $permission);
    }
}
