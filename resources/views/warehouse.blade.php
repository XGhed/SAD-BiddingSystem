@extends('adminParent')


@section('title')
Maintenance
@endsection

@section('jqueryscript')
<script type="text/javascript">
</script>
@endsection




@section('title1')
<h2 class="left col s6 push-s1 white-text" style="font-size: 28px">Manage Warehouses</h2>
@endsection





@section('content')
<div class="row"></div>
<a class="modal-trigger waves-effect waves-light right green darken-3 btn z-depth-3" href="#addBtn"><i class="material-icons left">add</i>Add Warehouse</a>


<table class="centered">
        <thead>
          <tr>
              <th>Manage</th>
              <th>Warehouse Number</th>
              <th>Address</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td></td>
          </tr>
        </tbody>
      </table>

<!--***************************ADD BUTTON***************************-->
      <div id="addBtn" class="modal modal-fixed-footer" style="width:800px; height:700px;">
        <div class="modal-content" >
          <h4><i class="medium material-icons left">business</i>Courier Company</h4>

       <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->

        
            
        <form class="col s12" action="/confirm" method="POST"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-field col s4">
				    <select>
				      <option value="" disabled selected>Choose your Province</option>
				      <option value="1">Option 1</option>
				    </select>
				    <label>Choose Province</label>
				</div>

				<div class="input-field col s4">
				    <select>
				      <option value="" disabled selected>Choose your City</option>
				      <option value="1">Option 1</option>
				    </select>
				    <label>Choose City</label>
				</div>

				<div class="row">
                    <div class="input-field col s8">
                      <input id="" type="text" class="validate" name="add_name" length="30" maxlength="30" REQUIRED>
                      <label for="">Warehouse Address</label>
                    </div>
                </div>           
             
            </div> <!--MODAL CONTENT -->

            <div class="modal-footer">
                  <button class="btn waves-effect waves-light green darken-2 white-text" type="submit" name="add">
                  <i class="material-icons left">add</i>Add Warehouse</button>
            </div>
        </form>  
            </div> <!--MODAL BODY-->
      </div>



<script>
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });

$(document).ready(function() {
    $('select').material_select();
  });
</script>



@endsection

