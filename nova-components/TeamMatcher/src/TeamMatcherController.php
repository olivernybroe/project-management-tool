<?php


namespace Olivernybroe\TeamMatcher;


use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class TeamMatcherController extends Controller
{
    public function match(Request $request, $projectId)
    {
        /** @var Project $project */
        $project = Project::findOrFail($projectId);

        return $project->findEmployees();
    }
}