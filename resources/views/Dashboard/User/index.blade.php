@extends('Dashboard.Layouts.adminLayout')

@section('title')
    Users
@endsection
@section('content')
    <x-Content.normal>
        <div class="card">
            <div class="card-header">
                    <x-Button.add name="Add User" route="{{ route('dashboard.users.create') }}" />
            </div>
   
            <div class="card-body">
                <div id="page-data">
                    @include('Dashboard.User.Sections.indexTable', ['users' => $users])
                </div>
            </div>
        </div>
    </x-Content.normal>
@endsection

@section('modal')
    <x-Modals.delete message="Are you sure to delete this user ?"></x-Modals.delete>
@endsection

@push('layout-scripts')
    <script>
        function openDeleteModal(elment) {
            $("#deleteFormModal").attr("action", $(elment).attr('deleteUrl'));
        }
    </script>
@endpush
