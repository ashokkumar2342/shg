@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>VO Meeting</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary"> 
                            <form action="{{ route('admin.vomeeting.store') }}" method="post" class="add_form"  no-reset="true" reset-input-text="for_month,for_year,meeting_date_1,meeting_date_2" select-triger="vo_name">
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <div class="col-lg-12 form-group">
                                    <label for="exampleInputEmail1">VO Name</label>
                                    <span class="fa fa-asterisk"></span>
                                    <select name="vo_name" class="form-control" id="vo_name" data-table="vo_meeting_list_datatable" onchange="callAjax(this,'{{route('admin.vomeeting.list')}}','vo_meeting_list')">    
                                        <option selected disabled>Select VO Name</option>                                      
                                        @foreach ($voProfileLists as $voProfileList)
                                        <option value="{{ $voProfileList->id }}">{{ $voProfileList->vo_name }}</option>  
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">For Month</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="for_month" id="for_month" class="form-control" maxlength="4">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">For Year</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="text" name="for_year" id="for_year" class="form-control" maxlength="6">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Meeting Date 1</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="date" name="meeting_date_1" id="meeting_date_1" class="form-control">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label for="exampleInputEmail1">Meeting Date 2</label>
                                        <span class="fa fa-asterisk"></span>
                                        <input type="date" name="meeting_date_2" id="meeting_date_2" class="form-control">
                                    </div>
                                    
                                </div> 
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div> 
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-primary" id="vo_meeting_list"> 
                             <table id="district_datatable" class="table table-striped table-hover control-label">
                                 <thead>
                                     <tr>
                                         <th>VO Name</th>
                                         <th>For Month</th>
                                         <th>For Year</th>
                                         <th>Meeting Date 1</th>
                                         <th>Meeting Date 2</th>
                                         <th>Action</th>
                                          
                                     </tr>
                                 </thead>
                                 <tbody>
                                    
                                 </tbody>
                             </table>
                        </div> 
                        
                    </div> 
                </div>
            </div> 
        </div> 
    </section>
    @endsection
    @push('scripts')
    <script type="text/javascript"> 
        $('#district_datatable').DataTable();
    </script>
    @endpush 

