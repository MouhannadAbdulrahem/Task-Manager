<div class="table-responsive">
    <table class="table mb-0">
        <thead>
            <tr>
                <th scope="col" class="text-nowrap w-10 fs-4 fw-bolder text-center">#</th>
                <th scope="col" class="text-nowrap w-20 fs-4 fw-bolder text-center ">User </th>
                <th scope="col" class="text-nowrap w-20 fs-4 fw-bolder text-center ">Title </th>
                <th scope="col" class="text-nowrap w-15 fs-4 fw-bolder text-center">Description </th>
                <th scope="col" class="text-nowrap w-15 fs-4 fw-bolder text-center">Status </th>
                    <th scope="col" class="text-nowrap w-20 fs-4 fw-bolder text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $key => $task)
                <tr>
                    <td class="text-nowrap fs-5 fw-bolder w-10 text-center">
                        {{ ++$key + ($tasks->currentPage() - 1) * $tasks->perPage() }}</td>
                    <td class="text-nowrap w-20 text-center">
                        {{ $task->user->name ?? "Not Assigned"  }}
                    </td>
                    <td class="text-nowrap w-20 text-center">
                        {{ $task->title }}
                    </td>
                    <td class="text-nowrap w-15 text-center">
                        {{ $task->description }}
                    </td>
                    <td class="text-nowrap w-15 text-center">
                        {{ $task->status }}
                    </td>
                        <td class="text-nowrap w-20 text-center">
                                <x-Button.edit route="{{ route('dashboard.tasks.edit', $task->id) }}" />
                                <x-Button.delete route="{{ route('dashboard.tasks.delete', $task->id) }}" />
                        </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center fs-4 fw-bolder"> No Data </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="px-1">
    {{ $tasks->links('components.Pagination.ajax') }}
</div>
