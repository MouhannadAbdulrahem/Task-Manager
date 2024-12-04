@extends('Dashboard.Layouts.adminLayout')

@section('title')
    {{ ('Add Task') }}
@endsection

@section('content')
    <x-Content.normal>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title fs-2 fw-bolder text-bold">{{ ('Add Task') }}</h4>
                    </div>
                    <div class="card-body">
                        <form id="createForm" class="form form-horizontal" method="POST"
                            action="{{ route('dashboard.tasks.store') }}">
                            @csrf
                            <div class="row">
                                <x-inputs.h-input inputName="title" inputId="title" lable="Title" isRequired="true"
                                    placeholder="{{ ('Task Title') }}" description="Enter Task Title" />
                                <x-inputs.h-input inputName="description" inputId="description" lable="Description"
                                    isRequired="true" placeholder="{{ ('Task Description') }}"
                                    description="Enter Task Description" />
                                    <div class="col-sm-9 offset-sm-3">
                                    <x-Button.submit onclick="validateInputs()" type="button" />
                                    <x-Button.rest />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <x-Files.single inputFormId="imageId" showTagId="showImage" /> --}}
    </x-Content.normal>
@endsection


@push('layout-scripts')
    <script>
        function validateInputs() {
            var form = $('#createForm')[0];

            var rules = {
                _token: Joi.string().required(),

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
