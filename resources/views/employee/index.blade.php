@extends('includes.layout')
@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border d-flex justify-content-between align-items-center">
                    <h3 class="box-title">Employee</h3>
                    <div class="d-flex align-items-center">

                        <a href="{{ route('employee.add') }}" class="btn btn-sm"
                            style="background-color: #2b1a6a; color: white; border: none;">
                            <i class="fas fa-plus"></i> Add Employee
                        </a>

                    </div>
                </div>

                <!-- Box Body -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example"
                            class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Mobile</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee )
                                <tr>
                                    <td>{{ $employee->full_name }}</td>
                                    <td>
                                        @if($employee->profile_photo)
                                        <img src="{{ asset($employee->profile_photo) }}"  width="50"
                                            height="50">
                                        @else
                                        <span>No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $employee->mobile }}</td>
                                    <td>{{ $employee->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('employee.edit', $employee->id) }}"
                                            style="background: none; border: none;">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>

                                        <!-- Uncomment and adjust for delete functionality -->
                                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $employee->id }}">
                                            <button type="submit" style="background: none; border: none;"><i
                                                    class="fas fa-trash text-danger"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
