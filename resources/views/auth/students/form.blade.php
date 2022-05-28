@extends('auth.layouts.master')

@isset($student)
    @section('title', 'Редактировать студента ')
@else
    @section('title', 'Создать студента')
@endisset

@section('content')
    <div class="col-md-12 mt-5">
        @isset($student)
            <h1>Редактировать студента</h1>
        @else
            <h1>Добавить студента</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($student)
              action="{{ route('student.update', $student) }}"
              @else
              action="{{ route('student.store') }}"
            @endisset
        >
            <div>
                @isset($student)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Фамилия </label>
                    <div class="col-sm-6">
                        @error('name1')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name1" id="name1"
                               value="@isset($student){{ $student->name1 }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Имя </label>
                    <div class="col-sm-6">
                        @error('name2')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name2" id="name2"
                               value="@isset($student){{ $student->name2 }}@endisset">
                    </div>
                </div>


                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Отчество </label>
                    <div class="col-sm-6">
                        @error('name3')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="datetime" class="form-control" name="name3" id="name3"
                               value="@isset($student){{ $student->name3 }}@endisset">
                    </div>
                </div>

                <br>

                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Группа </label>
                    <div class="col-sm-6">
                        @error('name_group')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name_group" id="name_group"
                               value="@isset($student){{ $student->name_group }}@endisset">
                    </div>
                </div>
                    <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
