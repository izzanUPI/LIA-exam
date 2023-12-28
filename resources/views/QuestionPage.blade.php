@extends('layouts.main')

@section('container')


<h3 class="mt-3 mb-2 " style="font-family: poppins;">{{ $quiz->title }} Quiz Details</h3>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

@if ($quiz->available == 0)

<h3 class="mt-3 mb-2 " style="font-family: poppins;">Quiz Status : Close</h3>
<form action="/dashboard/quiz/{{ $quiz->id }}/question/open" method="post" class="d-inline">
  @csrf
  <button class="btn btn-primary my-3" role="button">Open Quiz</button>
</form>
    
@else
<h3 class="mt-3 mb-2 " style="font-family: poppins;">Quiz Status : Open</h3>
<form action="/dashboard/quiz/{{ $quiz->id }}/question/close" method="post" class="d-inline">
  @csrf
  <button class="btn btn-primary my-3" role="button">Close Quiz</button>
</form>
    
@endif
<a class="btn btn-primary my-3" href="/dashboard/quiz/{{ $quiz->id }}/question/create" role="button">Add Question</a>

<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <h5 class="card-title">List of Questions</h5>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Question</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($questions as $question)
            <tr> 
              <td>{{ $loop->iteration }}</td>
              <td>{{ $question->question_text }}</td>
              <td><a class="badge bg-warning bi-vector-pen" href='/dashboard/quiz/{{ $quiz->id }}/question/{{ $question->id }}/edit'> Edit Question</a>
                <a class="badge bg-success bi-vector-pen" href='/dashboard/quiz/{{ $quiz->id }}/question/{{ $question->id }}/option/{{ $question->id }}/edit'> Edit Option</a>
                    <form action="/dashboard/quiz/{{ $quiz->id }}/question/{{ $question->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class ="badge bg-danger border-0" onclick="return confirm('Anda Yakin?')"> Delete</button>
                    </form>
                </td>
              
              </tr>
              @endforeach
              
          </tbody>
        </table>
        <!-- End Default Table Example -->
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Program</th>
              <th scope="col">Kelas</th>
              <th scope="col">Score</th>
            </tr>
          </thead>
          <h5 class="card-title">User Scores</h5>
          <tbody>
              @foreach($scores as $score)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $score->user->name }}</td>
                <td>{{ $score->user->program->program_name }}</td>
                <td>{{ $score->user->kelas->kelas_name }}</td>
                <td>{{ $score->score_value }}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
        <!-- End Default Table Example -->
      </div>
    </div>
  </div>
</div>
<form action="/dashboard/quiz/{{ $quiz->id }}" method="post" class="d-inline">
  @csrf
  @method('DELETE')
  <button class ="btn btn-danger border-0" onclick="return confirm('Are You Sure?')"> Delete Quiz</button>
</form>
@endsection