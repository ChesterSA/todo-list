<tr @if($task->isLate()) class="bg-red-500" @endif>
    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
        {!! $task->icon !!}
    </td>
    <td colspan="2" class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
        {{ $task->name }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
        {{ $task->due_date_formatted }}
    </td>
    <td class="text-sm text-gray-900 font-light px-6 py-2 whitespace-nowrap">
        <p class="inline" onclick="openEditModal({{ $task }})">Edit</p>

        @if(!$task->is_complete)
        <form method="POST" class="inline ml-3  " action="{{route('tasks.complete', $task)}}">
            @csrf
            <button type="submit">Complete</button>
        </form>
        @endif
    </td>
</tr>
