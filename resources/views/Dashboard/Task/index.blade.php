@extends('Dashboard.Layouts.adminLayout')

@section('title')
    Tasks
@endsection
@use('App\Enums\Permission')
@section('content')
    <x-Content.normal>
        <div class="card">
            <div class="card-header">
                    <x-Button.add name="Add Task" route="{{ route('dashboard.tasks.create') }}" />
            </div>
                 <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <x-inputs.Multi-Vertical.input onkeyup="onSearch(event)"
                                    inputId="title" label="Title or Status" placeholder="Search By Title or Status"
                                    size="col-12" />
                            </div>
                        </div>
                    </div>
            <div class="card-body">
                <div id="page-data">
                    @include('Dashboard.Task.Sections.indexTable', ['tasks' => $tasks])
                </div>
            </div>
        </div>
    </x-Content.normal>
@endsection

@section('modal')
    <x-Modals.delete message="Are you sure to delete this task ?"></x-Modals.delete>
@endsection

@push('layout-scripts')
    <script>
         function onSearch(event) {
            event.preventDefault();
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('filter[search]', event.target.value);
            urlParams.set('page', 1);
            const url = window.location.href.split('?')[0];
            const fullurl = `${url}?${urlParams}`;
            $.ajax({
                type: "GET",
                url: `${fullurl}`,
                dataType: "html",
                success: function(response) {
                    $('#page-data').html(response);
                    history.pushState({}, document.title, fullurl);
                },
                error: function(res) {
                    errorToast('{{  ('Something went wrong') }}');
                }
            });
        }

        function openDeleteModal(elment) {
            $("#deleteFormModal").attr("action", $(elment).attr('deleteUrl'));
        }
    </script>
@endpush
