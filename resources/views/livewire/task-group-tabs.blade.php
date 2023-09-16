
<div class="py-12 mt-2">
    
    <div class="flex flex-col items-center justify-center h-64">

        <div class="w-auto">
            <div class="bg-white  sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-4 bg-white">
                                
                            <table class="w-full min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">

                                @foreach($taskGroups as $group)
                                    <!-- Row  -->
                                    <tr class="border-b hover:bg-gray-50 hover:text-gray-900">
                                    @foreach ($group->tasks as $task)
                                        <!-- Column -->
                                        <td class="px-4 py-1  text-left">
                                            <h1 class="font-semibold font-medium ">{{ $task->name??"" }}</h1>
                                            <p class="text-sm ring-gray-300"> {{ $task->description??"" }}</p>
                                        </td>
                                        <!-- Column -->
                                        <td class="px-4 py-1  text-left">
                                            <span class="p-2 inline-flex items-center px-2.5 py-0.5 rounded-md text-sm border border-indigo-400  text-indigo-700 bg-transparent hover:bg-gray-50">
                                                {{ $task->frequency??"" }}
                                                </span>
                                        </td>
                                        <!-- Column -->
                                        <td class="px-4 py-1  text-left">
                                            <span class="p-2 inline-flex items-center px-2.5 py-0.5 rounded-md text-sm border border-indigo-400  text-indigo-700 bg-transparent hover:bg-gray-50">
                                                {{ $task->taskGroup->name??"" }}
                                                </span>
                                        </td>
                                        <!-- Column -->
                                        <td class="px-4 py-1  text-left">
                                            <p class="text-sm ring-gray-300">
                                                Due Date: {{\Carbon\Carbon::parse($task->due_date)->format('d,M,Y')}}</p>
                                        </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>