@extends('auth.layouts.master')

@section('title', 'Журнал')

@section('content')

    <div class="col-md-12 mt-5">
        <h1>Журнал посещаемости</h1>
        <form method="GET" action="#">
            <div class="filters row">
                <div class="col-sm-6col-md-15 mt-2">
                    <label for="group"> Укажите группу
                        <select name="name_group" id="name_group">
                            <option value="" selected>Все</option>
                            @foreach($groups as $group)
                                <option {{ request()->query('name_group') === $group->name_group ? "selected" : "" }}  value="{{ $group->name_group}}">{{$group->name_group}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="predmet" class="ml-3">Укажите предмет
                        <select name="predmet" id="predmet">
                            <option value="" selected>Все</option>
                            @foreach($predmets as $predmet)
                                <option {{ request()->query('predmet') === $predmet->predmet ? "selected" : "" }}  value="{{ $predmet->predmet}}">{{$predmet->predmet}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="date" class="ml-3">Выберите дату
                        <input type="date" name="date" id="date" value="{{ request()->date}}">
                    </label>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success">Применить</button>
                    <a href="{{ route('journal.index') }}" class="btn btn-warning">Сбросить</a>
                </div>
            </div>
        </form>
        <table class="table">
            <tbody>
            <tr>
                <th>№</th>
                <th>ФИО студента</th>
                <th>Оценка</th>
            </tr>

            @foreach($journals as $journal)
                <tr>
                    <td>{{ $journal->id }}</td>
                    <td>{{ $journal->name_student }}</td>
                    <td>{{ $journal->presence }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('journal.destroy', $journal) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('journal.show', $journal) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('journal.edit', $journal) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>

            </tbody>
            @endforeach
        </table>

        <a class="btn btn-success" type="button"
           href="{{ route('journal.create', $journal ) }}">Добавить запись</a>
    </div>


@endsection
