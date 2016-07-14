<?php

namespace Bican\Roles\Exceptions;

use Illuminate\Http\Request;

class LevelDeniedException extends AccessDeniedException
{
    /**
     * Create a new level denied exception instance.
     *
     * @param string $level
     */
    public function __construct($level)
    {
        return Redirect() -> back() -> with( 'error', '您没有权限访问' );
    }
}
