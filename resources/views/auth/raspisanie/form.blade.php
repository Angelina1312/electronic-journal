@extends('auth.layouts.master')

@isset($raspisanie)
    @section('title', 'Редактировать занятие ')
@else
    @section('title', 'Создать занятие')
@endisset

@section('content')
    <div class="col-md-12 mt-5">
        @isset($raspisanie)
            <h1>Редактировать занятие</h1>
        @else
            <h1>Добавить занятие</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($raspisanie)
              action="{{ route('raspisanie.update', $raspisanie) }}"
              @else
              action="{{ route('raspisanie.store') }}"
            @endisset
        >
            <div>
                @isset($raspisanie)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Номер пары </label>
                    <div class="col-sm-6">
                        @error('num_para')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="num_para" id="num_para"
                               value="@isset($raspisanie){{ $raspisanie->num_para }}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Начало занятия </label>
                    <div class="col-sm-6">
                        @error('start')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="datetime-local" class="form-control" name="start" id="start"
                               value="@isset($raspisanie){{ $raspisanie->start }}@endisset">
                    </div>
                </div>


                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Конец занятия </label>
                    <div class="col-sm-6">
                        @error('end')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="datetime-local" class="form-control" name="end" id="end"
                               value="@isset($raspisanie){{ $raspisanie->end }}@endisset">
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
                                   value="@isset($raspisanie){{ $raspisanie->name_group }}@endisset">
                        </div>
                    </div>

                    <br>

                    <div class="input-group row">
                        <label for="description" class="col-sm-2 col-form-label">Предмет </label>
                        <div class="col-sm-6">
                            @error('predmet')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" name="predmet" id="predmet"
                                   value="@isset($raspisanie){{ $raspisanie->predmet }}@endisset">
                        </div>
                    </div>

                    <br>

                    <div class="input-group row">
                        <label for="description" class="col-sm-2 col-form-label">Аудитория </label>
                        <div class="col-sm-6">
                            @error('auditor')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" name="auditor" id="auditor"
                                   value="@isset($raspisanie){{ $raspisanie->auditor }}@endisset">
                        </div>
                    </div>
                    <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
