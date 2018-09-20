<?php

namespace Olivernybroe\TeamMatcher;

use Laravel\Nova\ResourceTool;

class TeamMatcher extends ResourceTool
{

    /**
     * Get the displayable name of the resource tool.
     *
     * @return string
     */
    public function name()
    {
        return 'Team Matcher';
    }

    /**
     * Get the component name for the resource tool.
     *
     * @return string
     */
    public function component()
    {
        return 'team-matcher';
    }
}
