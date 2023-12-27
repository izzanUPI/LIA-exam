@extends('layouts.main')

@section('container')

    <div class="pagetitle">
    <h3 class="mt-3 mb-2 " style="font-family: poppins;">Your Quizzes</h3>
    </div><!-- End Page Title -->


    <section class="section">
    <div class="row">
        <div class="col">
        @foreach ($quizzes as $quiz)
            <div class="card">
                <div class="card-body">
                    <h2>{{ $quiz->title }}</h2>
                    @if ($quiz->program)
                        <p>Program: {{ $quiz->program->program_name }}</p>
                    @endif
                
                    @if ($quiz->kelas)
                        <p>Kelas    : {{ $quiz->kelas->kelas_name }}</p>
                    @endif   
                </div>
                <button type="button" class="btn btn-primary  mx-auto my-1">Start</button>
            </div>
        </div>
    </div>
    @endforeach
@endsection