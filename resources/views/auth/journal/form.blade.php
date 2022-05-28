@extends('auth.layouts.master')

@isset($journal)
    @section('title', 'Редактировать запись ')
@else
    @section('title', 'Создать запись')
@endisset

@section('content')
    <div class="col-md-12 mt-5">
        @isset($journal)
            <h1>Редактировать запись</h1>
        @else
            <h1>Добавить запись</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($journal)
              action="{{ route('journal.update', $journal) }}"
              @else
              action="{{ route('journal.store') }}"
            @endisset
        >
            <div>
                @isset($journal)
                    @method('PUT')
                @endisset
                @csrf


                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">ФИО </label>
                    <div class="col-sm-6">
                        @error('name_student')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name_student" id="name_student"
                               value="@isset($journal){{ $journal->name_student }}@endisset">
                    </div>
                </div>


                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Оценка </label>
                    <div class="col-sm-6">
                        @error('presence')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="presence" id="presence"
                               value="@isset($journal){{ $journal->presence }}@endisset">
                    </div>
                </div>

                <br>
                    <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
