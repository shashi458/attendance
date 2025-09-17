@extends('includes.layout')

@section('content')
<div class="container">
    <h2>Employee Registration</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Tab Navigation --}}
        <ul class="nav nav-tabs" id="empTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#basic" role="tab">Basic Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#contact" role="tab">ID & Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#job" role="tab">Job Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#docs" role="tab">Documents</a>
            </li>
        </ul>

        {{-- Tab Contents --}}
        <div class="tab-content border p-4 mt-2" id="empTabContent">

            {{-- Basic Info --}}
            <div class="tab-pane fade show active tab-step" id="basic" role="tabpanel">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="">Select</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label>Marital Status</label>
                    <select name="marital_status" class="form-control" required>
                        <option value="">Select</option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Divorced</option>
                        <option>Widowed</option>
                    </select>
                </div>
                <div class="text-end mt-3">
                    <button type="button" class="btn btn-primary next-tab">Next</button>
                </div>
            </div>

            {{-- ID & Contact --}}
            <div class="tab-pane fade tab-step" id="contact" role="tabpanel">
                <div class="form-group">
                    <label>Aadhaar Number</label>
                    <input type="text" name="aadhaar_number" class="form-control" maxlength="12">
                </div>
                <div class="form-group mt-2">
                    <label>Mobile</label>
                    <input type="text" name="mobile" class="form-control" maxlength="10" required>
                </div>
                <div class="form-group mt-2">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label>Address</label>
                    <textarea name="address" class="form-control" rows="3" required></textarea>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-secondary prev-tab">Previous</button>
                    <button type="button" class="btn btn-primary next-tab">Next</button>
                </div>
            </div>

            {{-- Job Info --}}
            <div class="tab-pane fade tab-step" id="job" role="tabpanel">
                <div class="form-group">
                    <label>Designation</label>
                    <input type="text" name="designation" class="form-control" required>
                </div>
                <div class="form-group mt-2">
                    <label>Date of Joining</label>
                    <input type="date" name="date_of_joining" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-secondary prev-tab">Previous</button>
                    <button type="button" class="btn btn-primary next-tab">Next</button>
                </div>
            </div>

            {{-- Documents --}}
            <div class="tab-pane fade tab-step" id="docs" role="tabpanel">
                <div class="form-group">
                    <label>Profile Photo</label>
                    <input type="file" name="profile_photo" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <label>ID Proof (Aadhaar / PAN)</label>
                    <input type="file" name="id_proof" class="form-control">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-secondary prev-tab">Previous</button>
                    <button type="submit" class="btn btn-primary">Register Employee</button>
                </div>
            </div>

        </div>
    </form>
</div>

@endsection


@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabLinks = Array.from(document.querySelectorAll('.nav-link'));
        const nextBtns = document.querySelectorAll('.next-tab');
        const prevBtns = document.querySelectorAll('.prev-tab');

        nextBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const active = document.querySelector('.nav-link.active');
                const index = tabLinks.indexOf(active);
                if (tabLinks[index + 1]) tabLinks[index + 1].click();
            });
        });

        prevBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const active = document.querySelector('.nav-link.active');
                const index = tabLinks.indexOf(active);
                if (tabLinks[index - 1]) tabLinks[index - 1].click();
            });
        });
    });
</script>
@endsection
