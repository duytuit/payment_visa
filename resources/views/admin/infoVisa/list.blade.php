@extends('admin.layouts.app') 

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Info Visa
        <small>Manager Info Visa</small>
      </h1>
      <ol class="breadcrumb">
      @can('permission-write')
      <li><a href="{{ route('info_visa.list') }}"><i class="fa fa-users"></i>Info Visa</a></li>
      @endcan

      <li class="active">Manager Info Visa</li>  
      </ol>
    </section> 

    <!-- Main content -->
    <section class="content container-fluid">    

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="box">
                <div class="box-header">
                  <h3 class="box-title" style="display:block">Manager Info Visa</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-responsive table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Full name</th> 
                      <th>Email</th> 
                      <th>Date of birth</th> 
                      <th>Sex</th> 
                      <th>Current nationality</th> 
                      <th>City/Province</th>
                      <th>Purpose of entry</th> 
                      <th>Expiry date</th> 
                      <th>Create At</th> 
                      <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($infovisas as $infovisa) 
                      <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $infovisa->full_name }}</td>  
                          <td>{{ $infovisa->email }}</td>  
                          <td>{{ $infovisa->birthday }}</td>  
                          <td>{{ $infovisa->sex }}</td>  
                          <td>{{ $infovisa->nationality }}</td>  
                          <td>{{ $infovisa->city_province }}</td>  
                          <td>{{ $infovisa->purpose_of_entry }}</td>  
                          <td>{{ $infovisa->expiry_date }}</td>  
                          <td>{{ $infovisa->created_at }}</td> 
                          <td></td>
                      </tr>
                    @endforeach
                   </tbody>
                  </table>
                  <div class="row mbm">
                    <div class="col-sm-3">
                        <span class="record-total" style="text-align: right;">Tổng: {{ $infovisas->total() }} bản
                            ghi</span>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="pagination-panel">
                            {{ $infovisas->appends(Request::all())->onEachSide(1)->links() }}
                        </div>
                    </div>
                    <div class="col-sm-3 text-right">
                        <span class="form-inline">
                            Hiển thị
                            <select name="per_page" class="form-control" data-target="#form-service-apartment">
                                @php $list = [10, 20, 50, 100, 200]; @endphp
                                @foreach ($list as $num)
                                    <option value="{{ $num }}" {{ $num == @$per_page ? 'selected' : '' }}>
                                        {{ $num }}</option>
                                @endforeach
                            </select>
                        </span>
                    </div>
                </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
@endsection 

@section('title', 'Manager Info Visa')     

@section('scripts') 
<script> 
	// $(document).on('click', '.delete', function(e) { 
          
  //         var form = $(this).parents('form:first'); 

  //        var confirmed = false;

  //          e.preventDefault();
          
  //          swal({
  //              title : 'Are you sure want to delete?',
  //              text : "Onec Delete, This will be permanently delete!",
  //              icon : "warning",
  //              buttons: true,
  //              dangerMode : true
  //          }).then((willDelete) => { 
  //              if (willDelete) {
  //                  // window.location.href = link;
  //                  confirmed = true;

  //              form.submit();         

  //              } else {
  //                  swal("Safe Data!");   
  //              }
  //          });
  //      });
</script> 
@endsection 
