@extends('includes.layout')
@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border d-flex justify-content-between align-items-center">
                    <h3 class="box-title">Reports</h3>

                </div>

                <!-- Box Body -->
                <form action="{{ route('reports.filter') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-4">
                        <label>From Date</label>
                        <input type="date" name="from" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>To Date</label>
                        <input type="date" name="to" class="form-control" required>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Generate Report</button>
                    </div>
                </form>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
