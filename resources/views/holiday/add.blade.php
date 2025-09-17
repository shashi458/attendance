@extends('includes.layout')

@section('content')
<div class="container">
    <h2>Employee Registration</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   <form action="{{ route('holidays.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <input type="text" name="description" class="form-control">
    </div>
    <button class="btn btn-primary">Save Holiday</button>
</form>
</div>

@endsection



