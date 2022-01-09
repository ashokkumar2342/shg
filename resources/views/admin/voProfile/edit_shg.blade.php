<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit SHG</h4>
      <button type="button" id="btn_close1" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.vo.profile.shgUpdate',Crypt::encrypt($vo_shg_details[0]->id)) }}" method="post" class="add_form" select-triger="village_select_box" button-click="btn_close1,view_shg_button">
      {{ csrf_field() }}
      
      <div class="card-body"> 
        <div class="row">  
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">SHG Member Detail 1 </label>
              <span class="fa fa-asterisk"></span>
              <select name="shg_member_1" id="shg_member_1" class="form-control">
                <option selected disabled>Select Member Detail 1</option>
                @foreach ($ShgMemberLists as $ShgMemberList)       
                  <option value="{{$ShgMemberList->id}}"{{$ShgMemberList->id==$vo_shg_details[0]->shg_member_detail_id_1?'selected':''}}>{{$ShgMemberList->member_name}}-{{$ShgMemberList->mobile_no}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">SHG Member Detail 2 </label>
              <span class="fa fa-asterisk"></span>
              <select name="shg_member_2" id="shg_member_2" class="form-control">
                <option selected disabled>Select Member Detail 2</option>
                @foreach ($ShgMemberLists as $ShgMemberList)       
                  <option value="{{$ShgMemberList->id}}"{{$ShgMemberList->id==$vo_shg_details[0]->shg_member_detail_id_2?'selected':''}}>{{$ShgMemberList->member_name}}-{{$ShgMemberList->mobile_no}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Designation Memeber 1</label>
              <span class="fa fa-asterisk"></span>
              <select name="designation_memeber_1" id="designation_memeber_1" class="form-control">
                <option selected disabled>Select Insurance Type</option>
                @foreach ($designation_ec as $designation)       
                  <option value="{{$designation->id}}"{{$designation->id==$vo_shg_details[0]->designation_memeber_1?'selected':''}}>{{$designation->designation_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Designation Memeber 2</label>
              <span class="fa fa-asterisk"></span>
              <select name="designation_memeber_2" id="designation_memeber_2" class="form-control">
                <option selected disabled>Select Insurance Type</option>
                @foreach ($designation_ec as $designation)       
                  <option value="{{$designation->id}}"{{$designation->id==$vo_shg_details[0]->designation_memeber_2?'selected':''}}>{{$designation->designation_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-12 text-center">
            <button type="submit" class="btn btn-primary form-control">Update</button> 
          </div>
        </div> 
      </form>
    </div>
  </div>
</div>

