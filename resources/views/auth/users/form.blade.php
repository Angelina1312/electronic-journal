@extends('auth.layouts.master')

@isset($user)
    @section('title', 'Редактировать пользователя ')
@else
    @section('title', 'Создать пользователя')
@endisset

@section('content')
    <div class="col-md-12 mt-5">
        @isset($user)
            <h1>Редактировать пользователя</h1>
        @else
            <h1>Добавить пользователя</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($user)
              action="{{ route('users.update', $user) }}"
              @else
              action="{{ route('users.store') }}"
            @endisset
        >
            <div>
                @isset($user)
                    @method('PUT')
                @endisset
                @csrf


                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Имя пользователя </label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($user){{ $user->name }}@endisset">
                    </div>
                </div>


                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Email </label>
                    <div class="col-sm-6">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="email" id="email"
                               value="@isset($user){{ $user->email }}@endisset">
                    </div>
                </div>
                        <div class="form-group row">
                            <label for="code" class="col-sm-2 col-form-label">Дать права на редактирование</label>
                            <div class="col-sm-6">
                                <input type="checkbox" name="is_admin" id="is_admin"

                                       checked="checked"
                                   >
                            </div>
                        </div>
                <br>
                    <button class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
