@extends('layouts.journal')

@section('content')
    <div class="container">
        <h1>Журнал учеников</h1>
        <p>{{ session('success') }}</p>

     
        <form action="{{ route('journal.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Имя ученика:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Добавить ученика</button>
        </form>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя ученика</th>
                    <th>Баллы</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>
                            @foreach ($student->scores as $score)
                                {{ $score->score }} ({{ $score->date }})<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('journal.edit', $student->id) }}" class="btn btn-primary">Добавить балл</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
