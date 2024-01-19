

@extends('layouts.journal')

@section('content')
    <h2>Добавить ученика</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('journal.store') }}" class="mt-3">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Имя ученика:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
