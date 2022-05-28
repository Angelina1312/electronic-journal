@extends('auth.layouts.master')

@section('title', 'Календарь')

@section('content')

        <div class="col-md-12 mt-5">
            <h1>Календарь занятий</h1>
            <form method="GET" action="{{ route('raspisanie.index') }}">
                <div class="filters row">
                    <div class="col-sm-6 col-md-7 mt-2">
                        <label for="type_week"> Выберите неделю
                            <select name="type_week" id="type_week">
                                <option value="" selected>Все</option>
                                @foreach($raspisanies as $raspisanie)
                                    <option {{ request()->query('type_week') === $raspisanie->type_week ? "selected" : "" }}  value="{{ $raspisanie->type_week}}">{{$raspisanie->type_week}}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="den_ned" class="ml-3">Выберите день
                            <select name="den_ned" id="den_ned">
                                <option value="" selected>Все</option>
                                @foreach($days as $den)
                                    <option {{ request()->query('den_ned') === $den->den_ned ? "selected" : "" }}  value="{{ $den->den_ned}}">{{$den->den_ned}}</option>
                                @endforeach
                            </select>
                         </label>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button type="submit" class="btn btn-success">Применить</button>
                        <a href="{{ route('raspisanie.index') }}" class="btn btn-warning">Сбросить</a>
                    </div>
                </div>
            </form>
            <table class="table">
                <tbody>
                <tr>
                    <th>№ пары</th>
                    <th>Начало занатия</th>
                    <th>Конец занятия</th>
                    <th>Группа</th>
                    <th>Предмет</th>
                    <th>Аудитория</th>
                </tr>

                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->num_para }}</td>
                        <td>{{ $item->start }}</td>
                        <td>{{ $item->end }}</td>
                        <td>{{ $item->name_group }}</td>
                        <td>{{ $item->predmet }}</td>
                        <td>{{ $item->auditor }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-success" type="button" href="{{ route('raspisanie.show', $item->id) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('raspisanie.edit', $item->id) }}">Редактировать</a>
                                <button onclick="document.getElementById('form-destroy').submit()" class="btn btn-danger destroy" type="button">Удалить</button>
                                <form id="form-destroy" action="{{ route('raspisanie.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>

                </tbody>
                @endforeach
            </table>

            <a class="btn btn-success" type="button" href="{{ route('raspisanie.create') }}">Добавить занятие</a>
        </div>


@endsection
