<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.vomeeting.update',$voProfileLists[0]->id) }}" method="post" class="add_form" select-triger="vo_name" button-click="btn_close">
      {{ csrf_field() }}
        <div class="card-body row"> 
            <div class="col-lg-6 form-group">
                <label for="exampleInputEmail1">For Month</label>
                <span class="fa fa-asterisk"></span>
                <input type="text" name="for_month" id="for_month" class="form-control" maxlength="4" value="{{$voProfileLists[0]->for_month}}">
            </div>
            <div class="col-lg-6 form-group">
                <label for="exampleInputEmail1">For Year</label>
                <span class="fa fa-asterisk"></span>
                <input type="text" name="for_year" id="for_year" class="form-control" maxlength="6" value="{{$voProfileLists[0]->for_year}}">
            </div>
            <div class="col-lg-6 form-group">
                <label for="exampleInputEmail1">Meeting Date 1</label>
                <span class="fa fa-asterisk"></span>
                <input type="date" name="meeting_date_1" id="meeting_date_1" class="form-control" value="{{$voProfileLists[0]->meeting_date_1}}">
            </div>
            <div class="col-lg-6 form-group">
                <label for="exampleInputEmail1">Meeting Date 2</label>
                <span class="fa fa-asterisk"></span>
                <input type="date" name="meeting_date_2" id="meeting_date_2" class="form-control" value="{{$voProfileLists[0]->meeting_date_2}}">
            </div>
            
        </div> 
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
  </div>
</div>

