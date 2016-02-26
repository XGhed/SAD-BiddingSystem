@extends('adminParent')


@section('title')
Manage Account
@endsection

@section('title1')
<h1 class="center">Manage Account</h1>
@endsection


@section('accounts')


<br>
<br>

<div class="row">
    <div class="col s8">
      <form>
        <div class="input-field col s3">
          <select>
            <option disabled selected>Filter</option>
            <option value="1">First Name</option>
            <option value="3">Last Name</option>
            <option value="4">Address</option>
            <option value="5">Contact Number</option>
            <option value="6">Email Address</option>
          </select>
            <label>Filter By</label>
        </div>
      </form>
    </div>

<!--***************************ADD BUTTON***************************-->
<div class="col s4">
<!-- MODAL TRIGGER-->
  <a class="modal-trigger waves-effect waves-light btn z-depth-5 left" href="#addBtn"><i class="material-icons left">add</i>Add Account</a>

  <!-- Modal Structure -->
  <div id="addBtn" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4><i class="medium material-icons left">face</i>Add Account</h4>

   <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->

    
        <div class="row">
    <form class="col s12" action="/insertAccount" method="POST">
            <div class="row">
                    <div class="input-field col s4">
                      <input id="first_name" type="text" class="validate" name="add_name">
                      <label for="first_name">First Name</label>
                    </div>
                
                    <div class="input-field col s4">
                      <input id="middle_name" type="text" class="validate" name="add_name">
                      <label for="middle_name">Middle Name</label>
                    </div>

                    <div class="input-field col s4">
                      <input id="last_name" type="text" class="validate" name="add_name">
                      <label for="last_name">Last Name</label>
                    </div>
                </div>
            

            <div class="row">
                <div class="input-field col s3">
                  <select name="add_province">
                    <option value="" disabled selected>Province</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                  <label>Province</label>
                </div>

                <div class="input-field col s3">
                  <select name="add_city">
                    <option value="" disabled selected>City</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                  <label>City/Municipality</label>
                </div>

                <div class="input-field col s3">
                  <select name="add_barangay">
                    <option value="" disabled selected>Barangay</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                  <label>Barangay</label>
                </div>

                <div class="input-field col s3">
                  <select name="add_street">
                    <option value="" disabled selected>Street</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                  <label>Street</label>
                </div>
            </div>

             <div class="row">
                <div class="input-field col s8">
                  <input id="birthdate" type="date" class="datepicker" name="">
                  <label for="birthdate">Birthdate</label>
                </div>
            </div> 

            <div class="row">
                <div class="input-field col s8">
                  <input id="contact_num" type="text" class="validate" name="add_contactNo">
                  <label for="contact_num">Contact Number</label>
                </div>
            </div>

            <div class="row">
              <div class="input-field col s8">
                  <input id="eAddress" type="email" class="validate" name="add_email">
                  <label for="eAddress">Email Address</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s8">
                  <input id="Occupation" type="text" class="validate" name="">
                  <label for="Occupation">Occupation</label>
              </div>
            </div>

            <div class="row">
              <div class="col s6">
                <label for="" class="black-text" style="font-size: 18px">Gender:</label>
                <input name="group1" type="radio" id="test1" />
                  <label for="test1">Male</label>
                <input name="group1" type="radio" id="test2" />
                  <label for="test2">Female</label>
              </div>
              <div class="input-field col s6">
                  <select name="ACCOUNTTYPE">
                    <option value="" disabled selected>Account type</option>
                    <option value="1">AccountType1</option>
                    <option value="2">AccountType2</option>
                  </select>
                  <label>Account Type</label>
            </div>
            </div>
          </div><!--*************************** ROW ***************************-->
        </div> <!--*************************** MODAL CONTENT ***************************-->

        <div class="modal-footer">
              <button class="btn waves-effect waves-light green darken-2 white-text" type="submit" name="action">
              <i class="material-icons left">add</i>Add Account</button>
        </div>
    </form>  
        </div> <!--MODAL BODY-->
</div>
    
        <!-- DATA TABLE -->
        <table class="highlight responsive-table">
        <thead>
          <tr>
              <th></th>
              <th data-field="Name">Name</th>
              <th data-field="Address">Address</th>
              <th data-field="Contact number">Contact number</th>
              <th data-field="Email Address">Email Address</th>
          </tr>
        </thead>

        <tbody>
        <form action="#">
          <input type="hidden" name="hid_key">
         
            <tr>
              <td>
                  <input type="radio" id="" value="" onclick="myJavascriptFunction(this.value);"/>
                  <label for="" class="left">Edit</label>
              </td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
        
            </form>
        </tbody>
      </table>
<!-- ***************************************************EDIT**************************************-->

    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4><i class="medium material-icons left">edit</i>Edit</h4>
     <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->
          <div class="row">
          <form class="col s12" action="/updateAccount" method="POST">
              <input type="hidden" name="edit_ID" value="{{isset($_GET['keyID']) ? $results[$_GET['keyID']]->AccountID : 'None'}}">
              <div class="row">
                  <div class="input-field col s8">
                    <input id="Account_name" type="text" class="validate" name="edit_name" value="{{isset($_GET['keyID']) ? $results[$_GET['keyID']]->AccountName : 'None'}}">
                    <label for="Account_name">Account's Name</label>
                  </div>
              </div>

              <div class="row">
                  <div class="input-field col s3">
                    <select name="edit_province">
                      <option value=""></option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>
                    <label>Province</label>
                  </div>

                  <div class="input-field col s3">
                    <select name="edit_city">
                      <option value></option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>
                    <label>City/Municipality</label>
                  </div>

                  <div class="input-field col s3">
                    <select name="edit_barangay">
                      <option ></option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>
                    <label>Barangay</label>
                  </div>

                  <div class="input-field col s3">
                    <select name="edit_street">
                      <option ></option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>
                    <label>Street</label>
                  </div>
              </div>

              <div class="row">
                  <div class="input-field col s8">
                    <input id="contact_num" type="text" class="validate" name="edit_contactNo" value="{{isset($_GET['keyID']) ? $results[$_GET['keyID']]->AccountContactNo : 'None'}}">
                    <label for="contact_num">Contact Number</label>
                  </div>
              </div>

              <div class="row">
                <div class="input-field col s8">
                    <input id="eAddress" type="email" class="validate" name="edit_email" value="{{isset($_GET['keyID']) ? $results[$_GET['keyID']]->AccountEmail : 'None'}}">
                    <label for="eAddress">Email Address</label>
                </div>
              </div>
            </div><!--*************************** ROW ***************************-->
          </div> <!--*************************** MODAL CONTENT ***************************-->

          <div class="modal-footer">
                <button class="btn waves-effect waves-light green darken-2 white-text col s2" type="submit" name="action">
                <i class="material-icons left">edit</i>Change</button>

                <button class="btn waves-effect waves-light z-depth-5 col s2" type="submit" name="action">Delete
            <i class="material-icons left">delete</i>
          </button>
          </div>
      </form>
            <script>
                //MODAL
                $(document).ready(function(){
                $('.modal-trigger').leanModal();
              });  
                //SELECT FORM
                $(document).ready(function() {
                  $('select').material_select();
                });
                //DATEPICKER
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15 // Creates a dropdown of 15 years to control year
                  });
            </script>
          </div> <!--MODAL BODY-->
      </div>


    <!-- hindi pa functtioning wala pang database-->
        <div class="center">
          <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
          </ul>
        </div> 

      </div>

      <script>
        function myJavascriptFunction(keyVal) { 
          //var keyVal = document.querySelector('input[name="group1"]:checked').value;
          var javascriptVariable = keyVal;
          window.location.href = "Account?keyID=" + javascriptVariable; 
        }
      </script>
      <?php if (isset($_GET['keyID'])) echo "<script>$('#modal1').openModal();</script>";?>
@endsection