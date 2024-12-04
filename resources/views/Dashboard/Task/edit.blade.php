@extends('Dashboard.Layouts.adminLayout')
@use('App\Enums\TaskStatus');
@section('title')
    {{ ('Edit Task') }}
@endsection

@section('content')
    <x-Content.normal>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-2 text-bold">{{ ('Edit Task') }}</h4>
                    </div>
                    <div class="card-body">
                        <form id="createForm" class="form form-horizontal" method="POST"
                            action="{{ route('dashboard.tasks.update', $task->id) }} ">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <x-inputs.h-input isRequired="true" inputName="title" inputId="title" lable="Title"
                                    placeholder="Task Title" value="{{ $task->title }}" description="Enter Task Title" />
                                <x-inputs.h-input isRequired="true" inputName="description" inputId="description"
                                    description="Enter Task Description" lable="Description"
                                    placeholder="{{ ('Task Description') }}"
                                    value="{{$task->description }}" />

                            <x-inputs.h-select title="Status" name="status" selectId="status" lable="Status"
                                isHidden='true' description="Select Status">
                                @foreach (TaskStatus::cases() as $status)
                                    <x-inputs.option lable2="{{ $status->value }}" value="{{ $status->value }}" />
                                @endforeach
                            </x-inputs.h-select>

                            {{-- <x-inputs.h-select title="Select Assignee" name="user_id" selectId="user_id" lable="Assignee"
                                description="Select Assignee">
                                @foreach ($users as $user)

                                @endforeach
                            </x-inputs.h-select> --}}

                                <div class="col-sm-9 offset-sm-3">
                                    <x-Button.submit label="edit" type="button" onclick="validateInputs()" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-Content.normal>
@endsection


@push('layout-scripts')


    <script>
        function validateInputs() {
            var form = $('#createForm')[0];

            var rules = {
                _token: Joi.string().required(),

                _method: Joi.string().required(),

                title: Joi.string().required().messages({
                    '*': '{{ ('Title is required') }}',
                }),

                description: Joi.string().required().messages({
                    '*': '{{ ('Description is required') }}',
                }),
            };

            var data = new FormData(form);
            var formDataObject = Object.fromEntries(data.entries());

            var formDataObject = Object.fromEntries(
                Object.entries(formDataObject).map(([key, value]) => [key, typeof value === 'string' ? value.trim() :
                    value
                ])
            );
            const schema = Joi.object(rules);


            const result = schema.validate(formDataObject);
            if (result.error) {
                errorToast(result.error.message);
                var label = result.error.details[0].context.label;

                var targetElement = $(`[name="${label}"]`);
                if (!result.error.details[0].context.label.includes('imageId') && targetElement) {
                    $('html, body').animate({
                        scrollTop: targetElement.height(),
                        behavior: 'smooth'
                    }, 1500);

                    $('html, body').promise().done(function() {
                        targetElement.focus();
                    });
                }

            } else {
                $(form).submit();
            }
        }
    </script>
@endpush
