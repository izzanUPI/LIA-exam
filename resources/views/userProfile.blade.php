@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
             
                <h5 class="card-title">Profile Details</h5>
                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Program</div>
                    <div class="col-lg-9 col-md-8">{{ $user->program->program_name }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kelas</div>
                    <div class="col-lg-9 col-md-8">{{ $user->kelas->kelas_name }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                </div>
            
            </div>
        </div>
        <a class="btn btn-primary mb-4 px-5" data-bs-toggle="modal" data-bs-target="#changePassModal">Change Password</a>
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        @endif
    </div>
    <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <table class="table">
                <h5 class="card-title">User Scores</h5>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Quiz Name</th>
                  <th scope="col">Score</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($scores as $score)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $score->quiz->title }}</td>
                    <td>{{ $score->score_value }}</td>
                    <td>{{ $score->created_at }}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
            <!-- End Default Table Example -->
          </div>
        </div>
      </div>
</div>
<div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/profile/{{ $user->id }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit">Save changes</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  @endsection