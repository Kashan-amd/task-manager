<?php
namespace Tests\Unit;

use App\Models\TaskGroup;
use App\Models\User;
use App\Facades\TaskGroupServiceFacade as TaskGroupService;;
use Tests\TestCase;

class TaskGroupServiceTest extends TestCase
{



    public function setUp(): void
    {
        parent::setUp();

    }

    public function test_create_task_group()
    {
        $taskGroupData = [
            'name' => 'Test Task Group',
            'description' => 'This is a test task group.',
            'user_id' => User::factory()->create()->id,
        ];

        $taskGroup = TaskGroupService::create($taskGroupData);

        $this->assertDatabaseHas('task_groups', $taskGroupData);

        $this->assertEquals($taskGroupData['name'], $taskGroup->name);
        $this->assertEquals($taskGroupData['description'], $taskGroup->description);
        $this->assertEquals($taskGroupData['user_id'], $taskGroup->user_id);
    }

    public function test_update_task_group()
    {
        $taskGroup = TaskGroup::factory()->create();


        $taskGroupData = [
            'name' => 'New Name',
            'description' => 'New Description',
        ];

        TaskGroupService::update($taskGroupData, $taskGroup);

        $this->assertDatabaseHas('task_groups', $taskGroupData);

        $updatedTaskGroup = TaskGroupService::find($taskGroup->id);

        $this->assertEquals($taskGroupData['name'], $updatedTaskGroup->name);
        $this->assertEquals($taskGroupData['description'], $updatedTaskGroup->description);
    }

    public function test_delete_task_group()
    {
        $taskGroup =TaskGroup::factory()->create();

        TaskGroupService::delete($taskGroup);

        $this->assertDeleted('task_groups', [
            'id' => $taskGroup->id,
        ]);
    }

    public function test_get_all_task_groups()
    {
        $taskGroups = TaskGroup::factory(3)->create();

        $retrievedTaskGroups = TaskGroupService::all();

        $this->assertGreaterThanOrEqual($taskGroups->count(), $retrievedTaskGroups->count());
    }

    public function test_get_task_group_by_id()
    {
        $taskGroup = TaskGroup::factory()->create();

        $retrievedTaskGroup = TaskGroupService::find($taskGroup->id);

        $this->assertEquals($taskGroup->name, $retrievedTaskGroup->name);
        $this->assertEquals($taskGroup->description, $retrievedTaskGroup->description);
        $this->assertEquals($taskGroup->user_id, $retrievedTaskGroup->user_id);
    }
}
