<!DOCTYPE html>
  <html>
    <head>
    <title>Registration</title>
      <!--CSS-->
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/materialize.css')!!}" media="screen,projection" />
      <link type="text/css" rel="stylesheet" href="{!!URL::asset('css/maintenance.css')!!}" media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--JAVASCRIPT -->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </head>

<body style="background-color: #212121">


<div class="row">
</div>
  
  <div class="container white">
               <div class="divider"></div>
    <div class="container white">
      <h1 class="center">Registration</h1>
          <div class="divider"></div>
      <div class="row">
        <form class="col s12">
          <div class="row">
                <div class="col s1 pull-s2">
                  <i class="medium material-icons">face</i>
                 </div>

            <div class="input-field col s4">
              <input id="icon_prefix2" class="validate">
              <label for="icon_prefix2">First Name</label>
            </div>

            <div class="input-field col s3">
              <input id="middle_name" type="text" class="validate">
              <label for="middle_name">Middle Name</label>
            </div>

            <div class="input-field col s4">
              <input id="last_name" type="text" class="validate">
              <label for="last_name">Last Name</label>
            </div>
          </div>

          <div class="row">
            <div class="col s1 pull-s2">
                    <i class="medium material-icons">home</i>
                   </div>
              <div class="input-field col s5">
                <select>
                  <option value="" disabled selected>Choose Province/MetroManila</option>
                  <option value="1">Laguna</option>
                  <option value="2">Muntinlupa</option>
                </select>
                <label>Address</label>
              </div>

              <div class="input-field col s4">
                <select>
                  <option value="" disabled selected>Choose Municipality/City</option>
                  <option value="1">Sta. Rosa</option>
                  <option value="2">San Pedro</option>
                </select>
                <label>Address</label>
              </div>

              <div class="row">
                <div class="input-field col s11 push-s1">
                  <input id="address" type="text" class="validate">
                  <label for="address">Barangay, Block, Lot, Street, House number</label>
                </div>
              </div>
            </div>

            
          
            <div class="row">
              <div class="col s1 pull-s2">
                    <i class="medium material-icons">work</i>
                   </div>
              <div class="input-field col s8">
                <input id="occupation" type="text" class="validate">
                <label for="occupation">Occupation</label>
              </div>
            </div>

            <div class="row">
               <div class="col s1 pull-s2">
                      <i class="medium material-icons">cake</i>
                     </div>
              <div class="input-field col s5">
                <input id="Birthdate" type="date" class="datepicker">
                <label for="Birthdate">Birthdate</label>
              </div>
            </div>

          <div class="row">
            <div class="col s1 pull-s2">
                      <i class="medium material-icons">email</i>
                     </div>
            <div class="input-field col s8">
              <input id="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>

          <div class="row">
              <div class="col s1 pull-s2">
                <i class="medium material-icons">lock</i>
              </div>

              <div class="input-field col s5">
                <input id="password" type="password" class="validate">
                <label for="password">Password</label>
              </div>
          </div>

          <div class="row">
            <div class="col s1 pull-s2">
                      <i class="medium material-icons">contact_phone</i>
                     </div>
            <div class="input-field col s8">
              <input id="phone" type="text" class="validate">
              <label for="phone">Phone</label>
            </div>
          </div>

          <div class="row">
            <div class="col s1 pull-s2">
                        <i class="medium material-icons">accessibility</i>
                       </div>
              <label for="gender" class="black-text">Gender</label>
              <p>
                <input name="group1" type="radio" id="test1" class="black-text" />
                <label for="test1">Male</label>
                <input name="group1" type="radio" id="test2" class="black-text" />
                <label for="test2">Female</label>
              </p>
          </div>

          <div class="row">
            <div class="col s1 pull-s2">
              <i class="medium material-icons">folder</i>
            </div>
              <p>
                <input type="checkbox" id="test5" />
                <label for="test5">Documents shit</label>
              </p>
              <p>
                <input type="checkbox" id="test6" checked="checked" />
                <label for="test6">Business documents shit</label>
              </p>
          </div>
          <br>
          <br>
          <div class="row center">
            <button class="btn waves-effect waves-light center" type="submit" name="action">Register
              <i class="material-icons left">done_all</i>
            </button>
          </div>

        </form>
      </div>


    </div>
  </div>


  <script>
  //DROPDOWN SELECT
  $(document).ready(function() {
    $('select').material_select();
  });

  //DATEPICKER
   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100 // Creates a dropdown of 15 years to control year
  });
  </script>
</body>
</html>
