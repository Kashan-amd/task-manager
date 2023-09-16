<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\TaskGroup;
use App\Models\User;
use App\Facades\TaskServiceFacade as TaskService;
use Tests\TestCase;

/**
 * Class TaskServiceTest
 *
 * @package Tests\Unit
 */
class TaskServiceTest extends TestCase
{



    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test creating a task.
     *
     * @return void
     */
    public function test_create_task()
    {
        $taskGroup = TaskGroup::factory()->create();
        $taskData = [
            'user_id' => User::factory()->create()->id,
            'name' => 'Sample Task',
            'description' => 'Sample Task Description',
            'frequency' => 'daily',
            'duration' => 30,
            'start_date'=>now()->format('Y-m-d H:m:s'),
            'due_date'=>now()->addDays(30)->format('Y-m-d H:m:s'),
            'completed'=>false,
            'task_group_id' => $taskGroup->id,
        ];

        $task = TaskService::create($taskData);
        $this->assertDatabaseHas('tasks', $taskData);

        // $this->assertInstanceOf(Task::class, $task);
        $this->assertEquals($taskData['name'], $task->name);
        $this->assertEquals($taskData['description'], $task->description);
        $this->assertEquals($taskData['frequency'], $task->frequency);
        $this->assertEquals($taskData['duration'], $task->duration);
        $this->assertEquals($taskData['task_group_id'], $task->task_group_id);
    }
    /**
     * Test update a task.
     *
     * @return void
     */
    public function test_update_task()
    {
        $task = Task::factory()->create();


        $taskData = [
            'name' => 'New Task Name',
            'description' => 'New Description for New Task Name',
        ];

        TaskService::update($taskData, $task);

        $this->assertDatabaseHas('tasks', $taskData);

        $updatedTask = TaskService::find($task->id);

        $this->assertEquals($taskData['name'], $updatedTask->name);
        $this->assertEquals($taskData['description'], $updatedTask->description);
    }
    /**
     * Test finding a task.
     *
     * @return void
     */
    public function test_task_find_by_id()
    {
        $task = Task::factory()->create();

        $foundTask = TaskService::find($task->id);

        $this->assertInstanceOf(Task::class, $foundTask);
        $this->assertEquals($task->id, $foundTask->id);
    }

    /**
     * Test fetching all tasks.
     *
     * @return void
     */
    public function test_get_all_tasks()
    {
        $tasks = Task::factory()->count(3)->create();

        $retrievedTasks = TaskService::all();

        $this->assertGreaterThanOrEqual($tasks->count(), $retrievedTasks->count());
    }

    /**
     * Test deleting a task.
     *
     * @return void
     */
    public function test_delete_task()
    {
        $task = Task::factory()->create();

        TaskService::delete($task);

        $this->assertDeleted($task);
    }

    /** @test */
    public function it_determines_task_time_group_based_on_due_date()
    {
        $today = now()->startOfDay();
        $tomorrow =  now()->addDay()->startOfDay();
        $nextWeek =  now()->addWeek()->startOfDay();


        $tasksToday = TaskService::determineTaskTimeGroup($today);
        $tasksTomorrow = TaskService::determineTaskTimeGroup($tomorrow);
        $tasksNextWeek = TaskService::determineTaskTimeGroup($nextWeek);
        $tasksInTheNearFuture = TaskService::determineTaskTimeGroup($nextWeek->addWeeks(3));
        $tasksInTheFuture = TaskService::determineTaskTimeGroup($nextWeek->addDays(1));

        $this->assertEquals('Tasks Today', $tasksToday);
        $this->assertEquals('Tasks Tomorrow', $tasksTomorrow);
        $this->assertEquals('Tasks Next Week', $tasksNextWeek);
        $this->assertEquals('Tasks in the Near Future', $tasksInTheNearFuture);
        $this->assertEquals('Tasks in the Future', $tasksInTheFuture);
    }

    /** @test */
    public function it_marks_task_as_completed_and_recreates_task_based_on_frequency()
    {
        $task = Task::factory()->create([
            'frequency' => 'weekly',
            'due_date' => now()->subWeek(),
        ]);

        TaskService::markAsCompleted($task->id);

        $this->assertTrue($task->fresh()->completed);
    }
    /** @test */
    public function test_get_due_date()
    {

        $startDate = '2022-04-01'; // April 1st, 2022
        $duration = 7; // 7 days
        $dueDate = TaskService::getDueDate($startDate, $duration);

        // Assert
        $this->assertEquals('2022-04-08 00:00:00', $dueDate);
    }


}
