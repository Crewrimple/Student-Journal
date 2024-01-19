@extends('layouts.journal')
@section('content')
    <div class="container">
        <h1>Редактировать ученика: {{ $student->name }}</h1>
        <p>{{ session('success') }}</p>

     
        <form action="{{ route('journal.update', $student->id) }}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="score">Баллы:</label>
                <input type="number" name="score" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date">Дата:</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Добавить баллы</button>
        </form>

      
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Баллы</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scores as $score)
                    <tr>
                        <td>{{ $score->id }}</td>
                        <td>{{ $score->score }}</td>
                        <td>{{ $score->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection