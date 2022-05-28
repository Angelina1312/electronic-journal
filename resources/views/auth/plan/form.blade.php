@extends('auth.layouts.master')

@isset($plan)
    @section('title', 'Редактировать занятие ')
@else
    @section('title', 'Создать занятие')
@endisset

@section('content')
    <div class="col-md-12 mt-5">
        @isset($plan)
            <h1>Редактировать занятие</h1>
        @else
            <h1>Добавить занятие</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($plan)
              action="{{ route('plan.update', $plan) }}"
              @else
              action="{{ route('plan.store') }}"
            @endisset
        >
            <div>
                @isset($plan)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Тема </label>
                    <div class="col-sm-6">
                        @error('subject')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="subject" id="subject"
                               value="@isset($plan){{ $plan->subject }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">План работы </label>
                    <div class="col-sm-6">
                        @error('work_plan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <textarea name="work_plan" id="work_plan" cols="72"
                                  rows="7">@isset($plan){{ $plan->work_plan }}@endisset</textarea>
                    </div>
                </div>
                    <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
