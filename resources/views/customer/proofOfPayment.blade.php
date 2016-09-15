@extends('customer.homepage')

@section('content')
	<div style="margin: 100px 0 0 0" class="ui container segment">
      @include('customer.sidenav')
		<h1 class="ui centered header">Proof of Payment</h1>
			<a class="ui basic blue button" id="addBtn">
           		<i class="send icon"></i>
            	Send proof of payment
			</a>
          <br><br>

          <h2 class="ui centered header">Previous Proof of payments</h2>
			<table class="ui celled table">
			  <thead>
			    <tr>
			    	<th>Header</th>
			    	<th>Header</th>
			    	<th>Header</th>
			  	</tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>Cell</td>
			      <td>Cell</td>
			      <td>Cell</td>
			    </tr>
			  </tbody>
			</table>
		

		 <!-- add modal -->
        <div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Send proof of payment
            </div>
            <div class="content">
              <div class="five wide field">
				<div class="ui sub header">Dropdown ni ghed</div>
					<select name="skills" class="ui fluid search dropdown">
						<option value="">Skills</option>
						<option value="angular">Angular</option>
						<option value="css">CSS</option>
					</select>		
				</div>

				<table class="ui celled table">
				  <thead>
				    <tr><th>Header</th>
				    <th>Header</th>
				    <th>Header</th>
				  </tr></thead>
				  <tbody>
				    <tr>
				      <td>Cell</td>
				      <td>Cell</td>
				      <td>Cell</td>
				    </tr>
				  </tbody>
				</table>

				<div class="field">
	                <label>Image</label>
	                <i class="file icon"></i>
	                <input type="file" name="ids" multiple REQUIRED>
				</div>
            </div>
            <div class="actions">
              <button class="ui green button" name="add" type="submit">Submit</button>

            </div>
        </div>
          <!-- END add modal -->
	</div>


<script>
	$('.ui.dropdown').dropdown();
	//add modal
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('#addModal').modal('show');    
       });
  });
</script>
@endsection