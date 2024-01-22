@extends('layouts.journal')
@section('content')
    <style>
        .wrapper {
            width: 99%;
            margin: 0 auto;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table {
            width: 100%;
        }

        .table_content th,
        .table_content td {
            width: 15px;
            padding: 3px;
        }

        thead {
            background-color: rgba(0, 0, 0, 0.212);
        }

        .number__cell {
            width: 10px;
            padding: 0%;
        }

        .bg-green {
            font-size: 16px;
            font-weight: 800;
            text-align: center;
            background-color: green;
        }

        .table_row th,
        .table_row td {
            padding: 10px 0;
        }

        .name__student {
            font-size: 16px;
            font-weight: 700;
        }

        .table_row td {
            cursor: pointer;
        }

        .input_wrapper {
            margin-top: 50px;
            display: flex;
            font-size: 16px;
            font-weight: 700;
        }

        .number_student {
            text-align: center;
            width: 10px;
        }
    </style>
     <div class="wrapper">
        <h2 class="text-center">Table students</h2>

        <table class="table_content">
            <thead>
                <tr class="table_row">
                    <th rowspan="2" class="number__cell">No</th>
                    <th rowspan="2" class="name__cell">Ism va familiyalar</th>
                    <th colspan="32">Yanvar</th>
                </tr>
                <tr class="table_row">
                    <th class="day__cell">1</th>
                    <th class="day__cell">2</th>
                    <th class="day__cell">3</th>
                    <th class="day__cell">4</th>
                    <th class="day__cell">5</th>
                    <th class="day__cell">6</th>
                    <th class="day__cell">7</th>
                    <th class="day__cell">8</th>
                    <th class="day__cell">9</th>
                    <th class="day__cell">10</th>
                    <th class="day__cell">11</th>
                    <th class="day__cell">12</th>
                    <th class="day__cell">13</th>
                    <th class="day__cell">14</th>
                    <th class="day__cell">15</th>
                    <th class="day__cell">16</th>
                    <th class="day__cell">17</th>
                    <th class="day__cell">18</th>
                    <th class="day__cell">19</th>
                    <th class="day__cell">20</th>
                    <th class="day__cell">21</th>
                    <th class="day__cell">22</th>
                    <th class="day__cell">23</th>
                    <th class="day__cell">24</th>
                    <th class="day__cell">25</th>
                    <th class="day__cell">26</th>
                    <th class="day__cell">27</th>
                    <th class="day__cell">28</th>
                    <th class="day__cell">29</th>
                    <th class="day__cell">30</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($students as $student)
                    <tr class="table_row">
                        <td class="number_student">{{ $student->id }}</td>
                        <td class="name__student">{{ $student->name }}</td>
                        @foreach ($student->scores as $score)
                            <td class="bg-green" onclick="updateScore('{{ $score->score }}', '{{ $student->id }}')">
                                {{ $score->score }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <form action="{{ route('journal.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Имя ученика:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Добавить ученика</button>
    </form>
@endsection


@section('scripts')
    <script>
        function updateScore(score, scoreId) {
            window.location.href = '{{ url('/edit/') }}' + '/' + scoreId;
        }
    </script>
@endsection
