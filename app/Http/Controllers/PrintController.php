<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    //
    function printTask(Project $project){
        return view('admin.print.tasks', [
            'project' => $project,
        ]);
    }

    function printBudget(Project $project){
        return view('admin.print.budget', [
            'project' => $project,
        ]);
    }

    function printTeam(Project $project){
        return view('admin.print.team', [
            'project' => $project,
        ]);
    }

    function printResources(Project $project){
        return view('admin.print.resources', [
            'project' => $project,
        ]);
    }

    function printTimeline(Project $project){
        return view('admin.print.timeline', [
            'project' => $project,
        ]);
    }

    function printInventory(Project $project){
        return view('admin.print.inventory', [
            'project' => $project,
        ]);
    }

    function printActivity(Project $project){
        return view('admin.print.activities', [
            'project' => $project,
        ]);
    }

    function printComments(Project $project){
        return view('admin.print.comments', [
            'project' => $project,
        ]);
    }
}
