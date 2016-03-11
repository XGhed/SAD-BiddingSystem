@extends('adminParent')


@section('title')
Maintenance
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 28px">Manage Shipment</h1>
@endsection


@section('content')
<div class="row"></div>
      <div class="right">
        <a class="modal-trigger waves-effect waves-light green darken-3 btn z-depth-5" href="#addBtn"><i class="material-icons left">add</i>Add Delivery Company</a>
      </div>
        <!-- DATA TABLE -->
      <table class="highlight responsive-table centered" id="tableOutput">
        <thead>
          <tr>
              <th style="cursor: default;">Manage</th>
              <th>Name</th>
              <th>Place</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>
        <div id="formOutput" value="">
            <tr>
              <td>
                    <div class="row col push-s2" >
                      <div class="col">
                         <button id="" value="" name="edit" class="edit btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Edit" ><i class="material-icons" >edit</i></button>
                          <form action="confirmSupplier" method="POST"><input type="hidden" name="_token" value="">
                         <input type="hidden" name="edit_ID" id="" value="">
                        </div>
                      
                      <div class="col">
                        <input type="hidden" id="" name="del_ID" value="">
                        <button id="delete" name="delete" class="btn-flat btn-large waves-effect waves-light transparent tooltipped" data-position="top" data-delay="50" data-tooltip="Delete" ><i class="material-icons" onclick="">delete</i></button>
                      </div>
                      </form>
                    </div>
              </td>
              <td id="tdname">FedEx</td>
              <td id="tdplaces">Bataa, Laguna, Pasig</td>
              <input type="hidden" id="" value="" >
              <input type="hidden" id="" value="" >
              <input type="hidden" id="" value="" >
              <td>
                  <div class="switch">
                    <label>
                      Off
                      <input type="checkbox">
                      <span class="lever"></span>
                      On
                    </label>
                  </div>
              </td>
            </tr>
            </div>
        </tbody>
      </table>



 
<!--***************************ADD BUTTON***************************-->
      <div id="addBtn" class="modal modal-fixed-footer">
        <div class="modal-content" >
          <h4><i class="medium material-icons left">business</i>Courier Company</h4>

       <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->

        
            
        <form class="col s12" action="" method="POST">
          <input type="hidden" name="" value="">
                <div class="row">
                    <div class="input-field col s8">
                      <input id="company_name" type="text" class="validate" name="add_name" length="30" maxlength="30" REQUIRED>
                      <label for="company_name">Company Name</label>
                    </div>
                </div>
                
                <div class="row">
                  <div class="col s3">
                    <table style="position:relative; top: -20px;" class="centered">
                      <thead>
                        <tr>
                            <th>Region</th>
                        </tr>
                      </thead>
                      <tbody style="overflow: auto;">
                        <tr>
                          <td>
                            <div class="center">
                              <input type="checkbox" class="filled-in" id="checkbox1" checked="checked"/>
                              <label for="checkbox1">RegionName</label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col s6 push-s2">
                    <table style="width: 150px; position:relative; top: -20px;" class="centered">
                      <thead>
                        <tr>
                            <th>Province</th>
                        </tr>
                      </thead>
                      <tbody style="overflow: auto;">
                        <tr>
                          <td>
                            <div class="center">
                              <input type="checkbox" class="filled-in" id="proBox" checked="checked"/>
                              <label for="proBox">ProvinceName</label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>               
             
            </div> <!--*************************** MODAL CONTENT ***************************-->

            <div class="modal-footer">
                  <button class="btn waves-effect waves-light green darken-2 white-text" type="submit" name="add">
                  <i class="material-icons left">add</i>Add Supplier</button>
            </div>
        </form>  
            </div> <!--MODAL BODY-->
      </div>


<!-- ***************************************************EDIT**************************************-->


    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4><i class="medium material-icons left">edit</i>Edit</h4>
     <!-- LINYA LANG--><div class="divider"></div><!-- LINYA LANG-->
         
          <form class="col s12" action="" method="POST">
          <input type="hidden" name="" value="">
                <div class="row">
                    <div class="input-field col s8">
                      <input id="company_name" value=" " type="text" class="validate" name="add_name" length="30" maxlength="30" REQUIRED>
                      <label for="company_name" class="active">Company Name</label>
                    </div>
                </div>
                
                <div class="row">
                  <div class="col s3">
                    <table style="position:relative; top: -20px;" class="centered">
                      <thead>
                        <tr>
                            <th>Region</th>
                        </tr>
                      </thead>
                      <tbody style="overflow: auto;">
                        <tr>
                          <td>
                            <div class="center">
                              <input type="checkbox" class="filled-in" id="checkbox1" checked="checked"/>
                              <label for="checkbox1">RegionName</label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col s6 push-s2">
                    <table style="width: 150px; position:relative; top: -20px;" class="centered">
                      <thead>
                        <tr>
                            <th>Province</th>
                        </tr>
                      </thead>
                      <tbody style="overflow: auto;">
                        <tr>
                          <td>
                            <div class="center">
                              <input type="checkbox" class="filled-in" id="proBox" checked="checked"/>
                              <label for="proBox">ProvinceName</label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div> 
          </div> <!--*************************** MODAL CONTENT ***************************-->

          <div class="modal-footer">
                <button class="btn-flat green waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button>
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

            </script>
          </div> <!--MODAL BODY-->
      </div>
@endsection