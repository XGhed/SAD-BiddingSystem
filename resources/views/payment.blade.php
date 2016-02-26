@extends('adminParent')


@section('title')
Manage Payment
@endsection


@section('supplier')
<script>
  
  $(document).ready(function() {
    $('select').material_select();
  })
        ;
</script>
<center><h1><i class="medium material-icons">payment</i>Payment</h1></center>
<br>
<br>
<br>


<div class="col s4">
<form action="#">
    <p>
      <input name="group1" type="radio" id="test1" />
      <label for="test1">Edit Payment method</label>
    </p>
    <p>
      <input name="group1" type="radio" id="test2" />
      <label for="test2">Add a payment method</label>
    </p>   
</form>
</div>

<div class="col s4 push-s2">
 <div class="input-field col s12">
    <select>
      <option value="" disabled selected>Choose Method</option>
      <option value="1">Bank Deposit</option>
      <option value="2">Credit</option>
      <option value="3">Debit</option>
    </select>
    <label>Select Method</label>
  </div>
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
    <center><h3>Payment Method Info</h3></center>
  </div>
<div class="divider"></div>
<br>
<br>


<div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Payment Method" id="first_name" type="text" class="validate">
          <label for="Supplier_name">Method</label>
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