@extends('adminParent')


@section('title')
Manage keyword
@endsection

@section('title1')
<h1 class="left col s6 push-s1 white-text" style="font-size: 45px">Manage keyword</h2>
@endsection


@section('keyword')
<br>
<br>

<div class="row">
<!--*************************************************** ADDCOMPANY **************************************-->
  <div class="col s8">

        <a class="modal-trigger waves-effect waves-light btn z-depth-5 left" href="#modal1"><i class="material-icons left">add</i>Add Keyword</a>

        <div id="modal1" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4><i class="medium material-icons left">label</i>Add Keyword</h4>
                  <div class="divider"></div>
              <div class="row">
              <form class="col s12" action="/confirmKeyword" method="POST">
               <div class="input-field col s6">
                  <input id="keyword" type="text" class="validate" name="add_name">
                  <label for="keyword">Keyword</label>
                </div>

          </div>
          </div>
          <div class="modal-footer">
            <button class="modal-action modal-close white-text waves-effect waves-green btn-flat green" type="submit" name="add">
                  <i class="material-icons left">done</i>Add Keyword</button></form>
          </div>
        </div>
  </div>
<!--*************************************************** END ADDCOMPANY **************************************-->


</div>


  <!--***************************************************DATA TABLE **************************************-->
<div class="row">
  <table class="responsive-table">
        <thead>
          <tr>
              <th></th>
              <th data-field="id">Keyword</th>
          </tr>
        </thead>

        <tbody>
          @foreach($results as $key => $result)
            <tr>
              <td>
                <input name="group1" type="radio" id="addID{{$key}}" value="{{$key}}" onclick="myJavascriptFunction(this.value);"/>
                   <label for="addID{{$key}}" class="left">Edit</label>
              </td>
            <td>{{$result->KeywordName}}</td>
             </tr>
          @endforeach
        </tbody>
      </table>
</div>
  <!--********************** END DATA TABLE  *******-->

  <!--********************** PAGINATION **************-->
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
    <!--********************* END PAGINATION *************************--> 
    
    <!--*************************************************** EDIT ************************************************-->
      
    <a class="modal-trigger waves-effect waves-light btn" href="#modal3">EDIT KEYWORD//LIPAT MO NA LANG SA RADIO</a>
      
      <div id="modal3" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4><i class="medium material-icons left">edit</i>Edit</h4>
                        <div class="divider"></div>
            <form>
                <input type="hidden" name="edit_ID" value="{{isset($_GET['keyID']) ? $results[$_GET['keyID']]->KeywordID : 'None'}}">
                <div class="input-field col s6">
                  <input id="Place" type="text" class="validate" name="edit_name" value="{{isset($_GET['keyID']) ? $results[$_GET['keyID']]->KeywordName : 'None'}}">
                  <label for="Place">Edit Keyword</label>
                </div>
        </div>


        <div class="modal-footer">
          <button class="btn-flat green waves-effect waves-light white-text col s2" type="submit" name="edit">
                <i class="material-icons left">edit</i>Change</button>

                <button class="btn-flat red waves-effect waves-light white-text col s2" type="submit" name="delete">Delete
            <i class="material-icons left">delete</i></button></form> 
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
      <script>
        function myJavascriptFunction(keyVal) { 
          //var keyVal = document.querySelector('input[name="group1"]:checked').value;
          var javascriptVariable = keyVal;
          window.location.href = "keyword?keyID=" + javascriptVariable; 
        }
      </script>
      <?php if (isset($_GET['keyID'])) echo "<script>$('#modal3').openModal();</script>";?>
@endsection