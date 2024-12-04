<div class="table-responsive">
    <table class="table mb-0">
        <thead>
            <tr>
                <th scope="col" class="text-nowrap w-10 fs-4 fw-bolder text-center">#</th>
                <th scope="col" class="text-nowrap w-20 fs-4 fw-bolder text-center ">Name </th>
                <th scope="col" class="text-nowrap w-20 fs-4 fw-bolder text-center ">Email </th>
                <th scope="col" class="text-nowrap w-30 fs-4 fw-bolder text-center">Registered At </th>
                    <th scope="col" class="text-nowrap w-20 fs-4 fw-bolder text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $key => $user)
                <tr>
                    <td class="text-nowrap fs-5 fw-bolder w-10 text-center">
                        {{ ++$key + ($users->currentPage() - 1) * $users->perPage() }}</td>
                    <td class="text-nowrap w-20 text-center">
                        {{ $user->name  }}
                    </td>
                    <td class="text-nowrap w-20 text-center">
                        {{ $user->email }}
                    </td>
                    <td class="text-nowrap w-30 text-center">
                        {{ $user->created_at->format('Y-m-d') }}
                    </td>
                        <td class="text-nowrap w-20 text-center">
                                <x-Button.edit route="{{ route('dashboard.users.edit', $user->id) }}" />
                                <x-Button.delete route="{{ route('dashboard.users.delete', $user->id) }}" />
                        </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center fs-4 fw-bolder"> No Data </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="px-1">
    {{ $users->links('components.Pagination.ajax') }}
</div>
