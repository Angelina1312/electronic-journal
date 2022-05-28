@extends('auth.layouts.master')

@section('title', 'Методический план')

@section('content')

    <div class="col-md-12 mt-5">
        <h1>Методический план</h1>
        <form method="GET" action="#">
            <div class="filters row">
                <div class="col-sm-6 col-md-3 mt-2">
                    <label for="date"> Выберите дату
                        <input type="date" name="date" id="date" value="{{ request()->date }}">
                    </label>
                </div>
                <div class="col-sm-6 col-md-6">
                    <button type="submit" class="btn btn-success">Применить</button>
                    <a href="{{ route('plan.index') }}" class="btn btn-warning">Сбросить</a>
                </div>
            </div>
        </form>
        <table class="table">
            <tbody>
            <tr>
                <th>№</th>
                <th>Тема</th>
                <th>План работы</th>
            </tr>

            @foreach($plans as $plan)
                <tr>
                    <td>{{ $plan->id }}</td>
                    <td>{{ $plan->subject }}</td>
                    <td>{{ $plan->work_plan }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('plan.destroy', $plan) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('plan.show', $plan) }}">Открыть</a>
                                <a class="btn btn-warning" type="button" href="{{ route('plan.edit', $plan) }}">Редактировать</a>
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
           href="{{ route('plan.create', $plan) }}">Добавить занятие</a>
    </div>


@endsection
