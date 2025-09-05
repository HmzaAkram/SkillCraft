@extends('layouts.app')

@section('content')
    <h1>Progress</h1>
    @foreach($progressData as $data)
        <div class="card">
            <h2>{{ $data['course']->name }}</h2>
            <p>Progress: {{ $data['percentage'] }}%</p>
            <p>Completed: {{ $data['completed'] }}</p>
            <p>Pending: {{ $data['pending'] }}</p>
            <!-- Chart.js example -->
            <canvas id="chart-{{ $data['course']->id }}"></canvas>
            <script>
                var ctx = document.getElementById('chart-{{ $data['course']->id }}').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Completed', 'Pending'],
                        datasets: [{
                            data: [{{ $data['completed'] }}, {{ $data['pending'] }}],
                            backgroundColor: ['#36a2eb', '#ff6384']
                        }]
                    }
                });
            </script>
        </div>
    @endforeach
@endsection