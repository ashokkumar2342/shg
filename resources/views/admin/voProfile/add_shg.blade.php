<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Add SHG</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('admin.vo.profile.shgstore',[Crypt::encrypt($vo_profile_id),Crypt::encrypt($village_id1)]) }}" method="post" class="add_form" select-triger="village_select_box" button-click="btn_close">
      {{ csrf_field() }}
      
      <div class="card-body"> 
        <div class="row"> 
          <div class="col-lg-6 form-group">
              <label for="exampleInputEmail1">SHG Name</label>
              <span class="fa fa-asterisk"></span>
              <select name="shg_name_id" id="shg_name" class="form-control" onchange="callAjax(this,'{{route('admin.vo.profile.shgWiseMember')}}','shg_member_div')">
                <option selected disabled>Select SHG Name</option>
                @foreach ($selfHelpGroupList as $values)       
                  <option value="{{$values->id}}">{{$values->group_name}}-{{$values->shg_code}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Joining Date</label>
              <span class="fa fa-asterisk"></span>
              <input type="date" name="joining_date" class="form-control">
          </div> 
        </div>
        <div id="shg_member_div">
            
        </div>
          
          
      </form>
    </div>
  </div>
</div>

