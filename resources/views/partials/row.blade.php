<tr class="@if($task->isLate()) bg-red-500 @endif">
    <td class="px-6 py-2 whitespace-nowrap">
        {!! $task->icon !!}
    </td>
    <td class="text-sm font-light px-6 py-2 whitespace-nowrap">
        {{ $task->name }}
    </td>
    <td class="text-sm font-light px-6 py-2 whitespace-nowrap">
        {{ $task->due_at_formatted }}
    </td>
    <td class="px-6 py-2 whitespace-nowrap">
        <p class="inline cursor-pointer" onclick="openEditModal({{ $task }})">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
        </p>

        @if(!$task->completed_at)
            <form method="POST" class="inline ml-3" action="{{route('tasks.complete', $task)}}">
                @csrf
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
            </form>
        @endif
    </td>
</tr>
