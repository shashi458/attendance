@extends('includes.layout')
@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border d-flex justify-content-between align-items-center">
                    <h3 class="box-title">Employee</h3>

                </div>

                <!-- Box Body -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example"
                            class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Total Hours</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $rec)
                                <tr>
                                    <td>{{ $rec->employee->full_name }}</td>
                                    <td>{{ number_format($rec->total_hours,2) }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2">No records found</td>
                                </tr>
                                @endforelse
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
