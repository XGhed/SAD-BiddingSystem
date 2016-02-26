@extends('adminParent')


@section('title')
Manage Items
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 45px">Manage Items</h2>
@endsection


@section('items')
<br>
<br>

<div class="row">
<!--*************************************************** ADDCATEGORY **************************************-->
  <div class="col s4">
     <!-- Modal Trigger -->
        <a class="modal-trigger waves-effect waves-light btn" href="#modal1"><i class="material-icons left">add</i>Add Category</a>

        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4><i class="medium material-icons left">dns</i>Add Category</h4>
                  <div class="divider"></div>
              <div class="row">
              <form class="col s12">
                <div class="row">
                    <div class="input-field col s5">
                      <input id="category" type="text" class="validate">
                      <label for="category">Category</label>
                    </div>
                </div>
              </form>
          </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn "><i class="material-icons left">done</i>Confirm</a>
          </div>
        </div>
  </div>
<!--***************************************************END ADDCATEGORY **************************************-->

<!--***************************************************ADD SUBCATEGORY **************************************-->
  <div class="col s4">
     <!-- Modal Trigger -->
        <a class="modal-trigger waves-effect waves-light btn" href="#modal2"><i class="material-icons left">add</i>Add Subcategory</a>

        <!-- Modal Structure -->
        <div id="modal2" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4><i class="medium material-icons left">dns</i>Add Subcategory</h4>
                  <div class="divider"></div>
              <div class="row">
              <form class="col s12">    
                  <div class="row">
                    <div class="input-field col s7">
                    <select>
                      <option value="" disabled selected>Choose your Category</option>
                      <option value="1">Category1</option>
                      <option value="2">Category2</option>
                      <option value="3">Category3</option>
                    </select>
                  </div>
               </div>

              <div class="row">
                  <div class="input-field col s6">
                      <input id="category" type="text" class="validate">
                      <label for="category">Name of Subcategory</label>
                  </div>
              </div> 
             </form>
          </div>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn"><i class="material-icons left">done</i>Confirm</a>
          </div>
        </div>
  </div>

  <!--***************************************************END SUBCATEGORY **************************************-->
</div>


  <!--***************************************************DATA TABLE **************************************-->
<div class="row">
  <table class="responsive-table">
        <thead>
          <tr>
              <th></th>
              <th data-field="id">Category</th>
              <th data-field="name">Subcategory</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
              <input name="group1" type="radio" id="test1" value="" onclick=""/>
                 <label for="test1" class="left">Edit</label>
            </td>
            <td>Cat</td>
            <td>Subcat1,Subcat2,Subcat3</td>
          </tr>
          <tr>
            <td>
              <input name="group1" type="radio" id="test2" value="" onclick=""/>
                 <label for="test2" class="left">Edit</label>
            </td>
            <td>Dog</td>
            <td>
              <p>Subcat1</p>
              <p>Subcat2</p>
              <p>Subcat3</p>
            </td>
          </tr>
          <tr>
            <td>
              <input name="group1" type="radio" id="test3" value="" onclick=""/>
                 <label for="test3" class="left">Edit</label>
            </td>
            <td>Mouse</td>
            <td>Subcat1</td>
          </tr>
        </tbody>
      </table>
</div>
  <!--***************************************************END DATA TABLE **************************************-->

  <!--*************************************************** PAGINATION **************************************-->
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
    <!--*************************************************** END PAGINATION **************************************--> 
    
    <!--*************************************************** EDIT ************************************************-->
      
    <a class="modal-trigger waves-effect waves-light btn" href="#modal3">EDIT MODAL //LIPAT MO NA LANG SA RADIO</a>
      
      <div id="modal3" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4><i class="medium material-icons left">edit</i>Edit</h4>
                        <div class="divider"></div>
            <div class="row">
              <form class="col s12">
                <div class="row">
                    <div class="input-field col s5">
                      <input id="category" type="text" class="validate">
                      <label for="category">Category</label>
                    </div>
                </div>
                      <div class="divider"></div>
                <h5 class="center"><i class="material-icons">dns</i>Subcategory</h5>
                  <div class="row">
                  <!--LOOP MO NA LANG KUNG ILAN UNG SUB CAT NIYA-->
                      <div class="input-field col s5">
                        <input id="category" type="text" class="validate">
                        <label for="category">Subcategory</label>
                      </div>
                  </div>
              </form>
          </div>
        </div>


        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn"><i class="medium material-icons left">done</i>Edit</a>
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn"><i class="medium material-icons left">delete</i>Delete</a>
        </div>
      </div>
    <!--*************************************************** END EDIT ************************************************-->    
      <script>

      //MODAL
      $(document).ready(function(){
          // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
          $('.modal-trigger').leanModal();
        });
      //SELECT
      $(document).ready(function() {
          $('select').material_select();
        });
      </script>
@endsection