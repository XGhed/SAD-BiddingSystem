@extends('admin.adminParent')


@section('title')
Manage Account Type
@endsection

@section('jqueryscript')
<script>
  $(function(){   
        $('#tableOutput').on('click', '.edit', function(){
            var selected = this.id;
            var keyID = $("#tdID"+selected).val();
            var keyType = $("#tdtype"+selected).val();
            var keyPoints = $("#tdpoints"+selected).text();
            var keyDiscount = $("#tddisc"+selected).val();

            $("#editID").val(keyID);
            $("#edit_discount").val(keyDiscount);
            $("#edit_points").val(keyPoints);
            $("#edit_name").val(keyType);
            $("#edit_name").material_select();
        });
    });   
</script>
@endsection

@section('title1')
<h2>
  <a class="left col s6 push-s1 white-text" style="font-size: 28px" href="/supplier">Maintenance /</a>
  <a class="col pull-s3 white-text" style="font-size: 28px" href="/discount">Discount</a>
</h2>
@endsection


@section('content')
	<div class="row"></div>

  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#discount" class="black-text">Discounts</a></li>
        <li class="tab col s3"><a href="#reward" class="black-text">Rewards</a></li>
      </ul>
    </div>

    <div id="discount" class="col s12">
      <div class="row"></div>
      <div class="col s4 right">
        <a class="modal-trigger waves-effect waves-light btn blue darken-2" href="#addBtn"><i class="material-icons left">add</i>Add Discount</a>
      </div>
      <table id="tableOutput" class="centered">
        <thead>
          <tr>
          	<th>Manage</th>
  				  <th>Account Type</th>
            <th>Discount</th>
            <th>Required Points</th>
          </tr>
  		  </thead>
  		  <tbody>
          @foreach($results as $key => $result)
          <tr>
          	<td>
              <form action="/confirmDiscount" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
  	         		<div class="center">
  						    <input type="hidden" class="items" id="" name="deleteID" value="{{$result->DiscountID}}">
                  <button type="button" id="{{$key}}" value="" class="edit btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped modal-trigger" data-target="modal3" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons">edit</i></button>

                  <button type="submit" name="delete" class="btn btn-flat btn-large waves-effect waves-light transparent z-depth-5 tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons">delete</i></button>
  				      </div>
  				    </form>
            </td>
  				  <td>{{$result->accountType->AccountTypeName}}</td>
  				  <td>{{$result->Discount}}%</td>
            <td id="tdpoints{{$key}}">{{$result->RequiredPoints}}</td>
              <input type="hidden" id="tddisc{{$key}}" value="{{$result->Discount}}">
              <input type="hidden" id="tdID{{$key}}" value="{{$result->DiscountID}}">
              <input type="hidden" id="tdtype{{$key}}" value="{{$result->AccountTypeID}}">
          </tr>
          @endforeach
  		  </tbody>
      </table>


      <!-- add -->
      <div class="row">
        <div id="addBtn" class="modal modal-fixed-footer" style="width: 700px; height:300px;">
          <div class="modal-content">
            <h4><i class="medium material-icons left">add</i>Discount</h4>
            <div class="divider"></div>
            <div class="row">
      		    <form class="col s12" action="/confirmDiscount" method="POST">
      		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                  <div class="input-field col s6">
        					  <select name="add_Type">
        					    @foreach($accountTypes as $key => $accountType)
                      <option value="" disabled selected>Choose Account Type</option>
                      <option value="{{$accountType->AccountTypeID}}">{{$accountType->AccountTypeName}}</option>
                      @endforeach
        					  </select>
        					  <label>Account Type</label>
                  </div>

                  <div class="input-field col s3">
        				    <input id="" type="number" name="add_discount" class="validate">
        				    <label for="">Discount</label>
        				  </div>

                  <div class="input-field col s3">
                    <input id="" type="number" name="add_points" class="validate">
                    <label for="">Required Points</label>
                  </div>
      			    </div>	
        		</div>
          </div><!--modal content -->
          <div class="modal-footer">
            <button class="modal-action modal-close white-text waves-effect waves-blue btn-flat blue" type="submit" name="add">
              <i class="material-icons left">done</i>Add</button>
              </form>
          </div>
        </div>
      </div>
      <!-- edit -->
      <div class="row">
        <div id="modal3" class="modal modal-fixed-footer" style="width: 700px; height:300px;">
          <div class="modal-content">
            <h4><i class="medium material-icons left">add</i>Discount</h4>
            			<div class="divider"></div>
            	<div class="row">
      		    <form class="col s12" action="/confirmDiscount" method="POST">
      		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="editID" name="editID">

                  <div class="row">
                    <div class="input-field col s6">
                      <select id="edit_name" name="edit_Type">
                        @foreach($accountTypes as $key => $accountType)
                          <option value="" disabled selected>Choose Account Type</option>
                          <option value="{{$accountType->AccountTypeID}}">{{$accountType->AccountTypeName}}</option>
                        @endforeach
                      </select>
                      <label>Account Type</label>
                    </div>

                    <div class="input-field col s3">
                        <input type="number" id="edit_discount" name="edit_discount" class="validate">
                        <label for="edit_discount">Discount</label>
                     </div>

                     <div class="input-field col s3">
                        <input type="number" id="edit_points" name="edit_points" class="validate">
                        <label for="edit_points">Required Points</label>
                     </div>
                   </div> 
        		</div>
          </div><!--modal content -->
          <div class="modal-footer">
            <button class="modal-action modal-close white-text waves-effect waves-blue btn-flat blue" type="submit" name="edit">
                    <i class="material-icons left">done</i>Confirm</button></form>
          </div>
        </div>
        </div>
      </div>
    </div>

    <div id="reward" class="col s12">
      <div class="row"></div>
      <div class="col s4 right">
        <a class="modal-trigger waves-effect waves-light btn blue darken-2" href="#rwrdBtn">
          <i class="material-icons left">add</i>Update Reward
        </a>
      </div>

      <table class="centered">
        <thead>
          <tr>
            <th>Reward Percentage</th>
            <th>Starting Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($rewards as $key => $reward)
            <tr>
              <td>{{$reward->RewardPercentage}}</td>
              <td>{{$reward->RewardDate}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <!-- add Reward -->
      <div class="row">
        <div id="rwrdBtn" class="modal modal-fixed-footer" style="width: 700px; height:300px;">
          <div class="modal-content">
            <h4><i class="medium material-icons left">add</i>Add Rewards</h4>
            <div class="divider"></div>
            <div class="row">
              <form class="col s12" action="/updateReward" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row">
                    <div class="input-field col s4">
                      <input id="" type="number" name="add_reward" class="validate">
                      <label for="">Reward Percentage %</label>
                    </div>

                    <div class="input-field col s4">
                      <input id="" type="date" name="add_date" class="validate">
                      <label for="" class="active">Reward Date</label>
                    </div>
                  </div> 
            </div>
          </div><!--modal content -->
          <div class="modal-footer">
            <button class="modal-action modal-close white-text waves-effect waves-blue btn-flat blue" type="submit" name="add">
                <i class="material-icons left">done</i>Add</button>
              </form>
          </div>
        </div>
      </div>
<script>
	//MODAL
  	$('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      }
    );
  	//ACCOUNT TYPE
  	 $(document).ready(function() {
    $('select').material_select();
  });
      $(document).ready(function(){
    $('ul.tabs').tabs();
  });
</script>
@endsection



