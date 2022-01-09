        <div class="row">
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">SHG Member Detail 1 </label>
              <span class="fa fa-asterisk"></span>
              <select name="shg_member_1" id="shg_member_1" class="form-control">
                <option selected disabled>Select Member Detail 1</option>
                @foreach ($ShgMemberLists as $ShgMemberList)       
                  <option value="{{$ShgMemberList->id}}">{{$ShgMemberList->member_name}}-{{$ShgMemberList->mobile_no}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">SHG Member Detail 2 </label>
              <span class="fa fa-asterisk"></span>
              <select name="shg_member_2" id="shg_member_2" class="form-control">
                <option selected disabled>Select Member Detail 2</option>
                @foreach ($ShgMemberLists as $ShgMemberList)       
                  <option value="{{$ShgMemberList->id}}">{{$ShgMemberList->member_name}}-{{$ShgMemberList->mobile_no}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Designation Memeber 1</label>
              <span class="fa fa-asterisk"></span>
              <select name="designation_memeber_1" id="designation_memeber_1" class="form-control">
                <option selected disabled>Select Insurance Type</option>
                @foreach ($designation_ec as $designation)       
                  <option value="{{$designation->id}}">{{$designation->designation_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-6 form-group">
              <label for="exampleInputPassword1">Designation Memeber 2</label>
              <span class="fa fa-asterisk"></span>
              <select name="designation_memeber_2" id="designation_memeber_2" class="form-control">
                <option selected disabled>Select Insurance Type</option>
                @foreach ($designation_ec as $designation)       
                  <option value="{{$designation->id}}">{{$designation->designation_name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-lg-12 text-center">
            <button type="submit" class="btn btn-primary form-control">Submit</button> 
          </div>
        </div>
          