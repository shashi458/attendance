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

                        <a href="{{ route('attendance.create') }}" class="btn btn-sm"
                            style="background-color: #2b1a6a; color: white; border: none;">
                            <i class="fas fa-plus"></i> Add Attendance
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
                                    <th>Employee</th>
                                    <th>Date</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Working Hours</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($attendance as $att)
                                <tr>
                                    <td>{{ $att->employee->full_name }}</td>
                                    <td>{{ $att->date }}</td>
                                    <td>{{ $att->check_in ?? '-' }}</td>
                                    <td>{{ $att->check_out ?? '-' }}</td>
                                    <td>{{ $att->working_hours ?? '-' }}</td>
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
