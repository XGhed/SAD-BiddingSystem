@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
 @include('admin1.Transaction.sideNav')

  <div class="twelve wide stretched column">
    <div class="ui segment">
       <div class="ui centered header">Item Checking</div>
       <!-- info -->
          <div class="ui icon  info message">
            <i class="info icon"></i>
            <div class="content">
              <div class="header">
                Info
              </div>
              <p>Click the item to add Image and Defect.</p>
            </div>
          </div>

      <div class="ui top attached tabular menu">
        <a class="active item" data-tab="first">Unchecked items</a>
        <a class="item" data-tab="second">Checked items</a>
      </div>

      <div class="ui bottom attached active tab segment" data-tab="first">
        <table datatable="ng" class="ui compact definition celled table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Item ID</th>
              <th>Item Name</th>
              <th>Container</th>
            </tr>
          </thead>
          <tbody>
             <tr ng-repeat="uncheck in itemsChecking">
                    <td class="collapsing">
                      <button ng-click="uncheckModal(uncheck.ItemID)" class="ui basic green button" name="tdID" value="@{{uncheck.ItemID}}">View Item</button>
                    </td>
                    <td style="cursor: pointer;" ng-click="uncheckModal(uncheck.ItemID)">@{{uncheck.ItemID}}</td>
                    <td style="cursor: pointer;" ng-click="uncheckModal(uncheck.ItemID)">@{{uncheck.item_model.ItemName}}</td>
                    <td style="cursor: pointer;" ng-click="uncheckModal(uncheck.ItemID)">@{{uncheck.container.ContainerName}}</td>
                  </tr>
          </tbody>
        </table>
        <div class="ui small modal" id="uncheck">
          <i class="close icon"></i>
          <h1 class="ui centered header">Add Image and/or Defect to the item</h1>
          <div class="content">
            <form class="ui form" action="/itemCheck" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="itemID" id="itemID">
              <div class="field">
                <div class="four wide field">
                  <div class="field">
                    <div class="ui sub header">Attach image for item.</div>
                    <input type="file" id="add_photo" name="add_photo" REQUIRED>
                  </div>
                </div>

                <div class="ui divider"></div>        

                <div class="fields">
                  <div class="nine wide field">
                    <div class="ui sub header">Defect</div>
                    <select name="defect" class="ui search selection dropdown" ng-model="dropDown" REQUIRED style="height:45px">
                        <option value="" disabled selected>Choose Option</option>
                        @foreach($defects as $key => $defect)
                          <option value="{{$defect->ItemDefectID}}">{{$defect->DefectName}}</option>
                        @endforeach
                        <option value="null">Others/None (Pls specify)</option>
                      </select>
                  </div>
                </div>

                <div class="fields">
                  <div class="seven wide field" id="defectDesc" ng-show="dropDown=='null'">
                    <div class="ui sub header">OTHERS:</div>
                    <input id="defectDesc" type="text" name="defectDesc" placeholder="Put description of defect here..." />
                  </div>
                </div>
              </div>
          </div>
          <div class="actions">
            <button class="ui blue button" name="Uncheck" type="submit"><i class="checkmark icon"></i> Confirm</button>
          </div>
            </form>
        </div>
      </div><!-- tab 1-->

      <div class="ui bottom attached tab segment" data-tab="second">
        <table datatable="ng" class="ui compact definition celled table" id="tableOutput">
          <thead>
            <tr>
              <th></th>
              <th>Item ID</th>
              <th>Item Name</th>
              <th>Defect</th>
              <th>Warehouse</th>
            </tr>
          </thead>
          <tbody>
             <tr ng-repeat="check in itemsChecked">
                    <td class="collapsing">
                      <button ng-click="checkModal(check.ItemID, check.image_path)" class="ui basic green button">View Item</button>
                    </td>
                    <td style="cursor: pointer;" ng-click="checkModal(check.ItemID, check.image_path)">@{{check.ItemID}}</td>
                    <td style="cursor: pointer;" ng-click="checkModal(check.ItemID, check.image_path)">@{{check.item_model.ItemName}}</td>
                    <td style="cursor: pointer;" ng-click="checkModal(check.ItemID, check.image_path)">@{{check.DefectDescription}}</td>
                    <td style="cursor: pointer;" ng-click="checkModal(check.ItemID, check.image_path)">@{{check.container.warehouse.Barangay_Street_Address}},
                      @{{check.container.warehouse.city.CityName}}, @{{
                      check.container.warehouse.city.province.ProvinceName
                    }}</td>
              </tr>
          </tbody>
        </table>
      </div>

      <div class="ui small modal" id="check">
          <i class="close icon"></i>
          <h1 class="ui centered header">Change Image and/or Defect to the item</h1>
          <div class="content">
            <form class="ui form" action="/itemCheck" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="itemID2" id="itemID2">

                <img class="ui centered image" id="checkimage" style="width: 300px; height: 300px;">
                <br><br>

                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" ng-model="checkImg" name="img" />
                      <label>Change Image</label>
                    </div>
                  </div>

                  <div class="five wide field" ng-show="checkImg">
                    <input type="file" id="add_photo" name="add_photo">
                  </div>

                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" ng-model="checkDef" name="defect" />
                      <label>Change Defect</label>
                    </div>
                  </div>

                  <div class="nine wide field">
                    <select id="checkselect" name="defect" class="ui search selection dropdown" ng-model="dropDown" ng-show="checkDef" style="height:45px">
                      <option value="" disabled selected>Choose Defect</option>
                      @foreach($defects as $key => $defect)
                      <option value="{{$defect->ItemDefectID}}">{{$defect->DefectName}}</option>
                      @endforeach
                      <option value="null">Others</option>
                    </select>
                  </div>

                  <div class="seven wide field" ng-show="dropDown=='null'">
                    <input id="defectDesc" type="text" name="defectDesc" placeholder="Description" />
                  </div>
          </div>
          <div class="actions">
            <button class="ui blue button" name="Check" type="submit"><i class="checkmark icon"></i> Confirm</button>
          </div>
            </form>
        </div>
      </div><!-- tab 2-->

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->


<script>
var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http){
    $http.get('itemsChecking')
    .then(function(response){
      $scope.itemsChecking = response.data;
    });

    $http.get('itemsChecked')
    .then(function(response){
      $scope.itemsChecked = response.data;
    });


    $scope.uncheckModal = function(keyID){
      $("#itemID").val(keyID);
      $('#uncheck').modal('show');
    }

    $scope.checkModal = function(keyID, imgPath){
      $("#itemID2").val(keyID);
      document.getElementById('checkimage').src = imgPath;
      $('#check').modal('show');
    }
  });

$('.menu .item').tab();


 //uncheck defect description
    $(document).ready(function () {
      $('#uncheckDef').click(function () {
          var $this = $(this);
          if ($this.is(':checked')) {
              document.getElementById('uncheckdefectDesc').style.display = 'block';
          } else {
              document.getElementById('uncheckdefectDesc').style.display = 'none';
          }
     });
    });

  //check defect description
    $(document).ready(function () {
      $('#checkDef').click(function () {
          var $this = $(this);
          if ($this.is(':checked')) {
              document.getElementById('checkselect').style.display = 'block';
          } else {
              document.getElementById('checkselect').style.display = 'none';
          }
     });
    });

    $(document).ready(function () {
      $('#checkselect').change(function(){
        var checkbox = document.getElementById('checkselect');
        //alert(checkbox.options[checkbox.selectedIndex].text);
        if(checkbox.options[checkbox.selectedIndex].text=='Others'){
          document.getElementById('checkdefectDesc').style.display = 'block';
        } else{
          document.getElementById('checkdefectDesc').style.display = 'none';
        }
      });
    });

  //check img
    $(document).ready(function () {
      $('#checkImg').click(function () {
          var $this = $(this);
          if ($this.is(':checked')) {
              document.getElementById('imgcheck').style.display = 'block';
          } else {
              document.getElementById('imgcheck').style.display = 'none';
          }
     });
    });
</script>
@endsection