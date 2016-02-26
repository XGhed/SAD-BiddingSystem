@extends('adminParent')


@section('title')
Manage Schedule
@endsection


@section('supplier')
<script>
  
  $(document).ready(function() {
    $('select').material_select();
  })

  $('.datepicker').pickadate()
       
        ;
</script>
<center><h1><i class="medium material-icons">event</i>Schedule</h1></center>
<br>
<br>
<br>


<div class="col s4">
<form action="#">
    <p>
      <input name="group1" type="radio" id="test1" />
      <label for="test1">Edit bidding schedule</label>
    </p>
    <p>
      <input name="group1" type="radio" id="test2" />
      <label for="test2">Add bidding schedule</label>
    </p>   
</form>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!--  -->

<div class="section">
    <center><h3>Schedule</h3></center>
  </div>
<div class="divider"></div>
<br>
<br>


<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
        <input type="date" class="picker">
          <label for="Supplier_name">Date</label>
          </div>
        </div>
         <div class="row">
        <div class="input-field col s6">
          <input placeholder="Method Discription" id="first_name" type="text" class="validate">
          <label for="first_name">Description</label>
        </div>
      </div>
    </form>

    <button class="btn blue waves-effect waves-light right" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
  </div>

<!-- -->


<div class="section">
    <center><h3>List of Method</h3></center>
  </div>
<div class="divider"></div>
<table>
        <thead>
          <tr>
              <th data-field="id">Method</th>
              <th data-field="name">Description</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Deposit</td>
            <td>Deposit money into company's bank account.</td>
          </tr>
          <tr>
            <td>Credit/Debit</td>
            <td>basta yon</td>
          </tr>
          <tr>
            <td>Cash On Delivery</td>
            <td>hindi ko to alam. hihihi.</td>
          </tr>
        </tbody>
      </table>

@endsection