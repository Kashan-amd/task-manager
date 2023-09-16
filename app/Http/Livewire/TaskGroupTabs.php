<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Facades\TaskGroupServiceFacade as TaskGroupService;
use App\Facades\TaskServiceFacade as TaskService;

class TaskGroupTabs extends Component
{

    public $activeGroup;

    public function showGroup($groupId)
    {
        $this->activeGroup = $groupId;
        $this->emit('showGroup', $groupId);
    }

    public function render()
    {
        $taskGroups = TaskGroupService::getUserTaskGroup();

        return view('livewire.task-group-tabs', compact('taskGroups'));
    }
}
