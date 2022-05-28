@extends('auth.layouts.master')

@section('title', 'Отчет')

@section('content')

    <div class="col-md-12 mt-5">
        <h1>Отчет</h1>
        <form method="GET" action="#">
            <div class="filters row">
                <div class="col-sm-6col-md-15 mt-2">
                    <label for="name_group"> Выберите группу
                        <select name="name_group" id="name_group">
                            @foreach($name_group as $group)
                                <option value="{{$group->name_group}}">{{$group->name_group}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="predmet"> Выберите предмет
                        <select name="predmet" id="predmet">
                            @foreach($predmet as $item)
                                <option value="{{$item->predmet}}">{{$item->predmet}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label for="date_start"> Дата начала выгрузки
                        <input type="date" name="date_start" id="date_start" value="{{ request()->date_start}}">
                    </label>
                    <label for="date_end"> Дата конца выгрузки
                        <input type="date" name="date_end" id="date_end" value="{{ request()->date_end}}">
                    </label>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success">Применить</button>
                    <a href="{{ route('report.index') }}" class="btn btn-warning">Сбросить</a>
                </div>
            </div>
        </form>
        <table class="table">
            <tbody>
            <tr>
                <th>№</th>
                <th>Группа</th>
                <th>Предмет</th>
            </tr>

            @foreach($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->name_student }}</td>
                    <td>{{ $report->presence }}</td>
                </tr>

            </tbody>
            @endforeach
        </table>


            {{ $reports->links(('pagination::bootstrap-4')) }}

        <a class="btn btn-success" type="button" href="{{ route('export',request()->query()) }}">Выгрузить</a>
    </div>


@endsection
