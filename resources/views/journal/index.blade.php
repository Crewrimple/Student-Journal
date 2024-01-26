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
        @if ($errors->any())
            @foreach ($errors->all() as $item)
                <h4 class="text-danger">{{ $item }}</h4>
            @endforeach
        @endif
        <table class="table_content">
            <thead>
                <tr class="table_row">
                    <th class="text-center" rowspan="2" class="number__cell">No</th>
                    <th rowspan="2" class="name__cell">Ism va familiyalar</th>
                    <th class="text-center" colspan="32">Yanvar</th>
                </tr>
                <tr class="table_row ">
                    @for ($day = 1; $day <= 31; $day++)
                        <th class="text-center">{{ $day }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="table_row">
                        <td class="number_student">{{ $student->id }}</td>
                        <td class="name__student">{{ $student->name }}</td>

                        @foreach (range(1, 31) as $day)
                            @php
                                $scoreForDay = $student->scores->where('date', date('Y-m-d', strtotime("2024-01-$day")))->first();
                            @endphp

                            @if ($scoreForDay)
                                <form>
                                    <td class="p-0">
                                        <input type="text" class="border-0 outline-0 text-center" style="width: 100%;"
                                            name="score" value="{{ $scoreForDay->score }}"
                                            onkeyup="updateScore('{{ $scoreForDay->id }}', this.value, '{{ date('Y-m-d', strtotime('2024-01-' . $day)) }}')">
                                    </td>
                                </form>
                            @else
                                <form>
                                    <td class="p-0">
                                        <input class="border-0 outline-0 text-center" type="text" value=""
                                            style="width: 100%;" name="score"
                                            onkeyup="storeScore('{{ date('Y-m-d', strtotime('2024-01-' . $day)) }}', this.value, '{{ $student->id }}')">
                                    </td>
                                </form>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection

@section('scripts')
    <script>
        function storeScore(date, score, studentId) {
            let route = "{{ route('journal.store') }}";
            // console.log('success: ', date, score, studentId)
            $.ajax({
                type: "POST",
                url: route,
                data: {
                    _token: "{{ csrf_token() }}",
                    student_id: studentId,
                    score: score,
                    date: date,
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(err) {
                    console.log(err)
                }
            })
        }

        function updateScore(scoreId, score, date) {
            let route = "{{ route('journal.update', [':id']) }}",
                url = route.replace(':id', scoreId);
            // console.log(date, score, scoreId)
            $.ajax({
                type: "PUT",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                    id: scoreId,
                    score: score,
                    date: date,
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(err) {
                    console.log(err)
                }
            })
        }
    </script>
@endsection
