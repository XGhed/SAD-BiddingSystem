@extends('admin1.mainteParent')

@section('content')
<div class="ui grid" ng-app="myApp" ng-controller="myController">
@include('admin1.Transaction.sideNav')


  <div class="twelve wide stretched column">
    <div class="ui segment">
        <h2 class="ui centered header">Account Approval</h2>

      <div class="ui top attached tabular menu">
        <a class="active item" data-tab="first">Account Approval</a>
        <a class="item" data-tab="second">Account list</a>
      </div>
      <div class="ui bottom attached active tab segment" data-tab="first">
       <table class="ui definition celled selectable table" datatable="ng">
              <thead>
                <tr>
                <th></th>
                <th>Account</th>
                <th>Account Type</th>
                <th>Date Registered</th>
              </tr></thead>
              <tbody>
                <tr ng-repeat="account in accounts">
                  <td class="collapsing">           
                    <button class="ui basic green button" ng-click="showInfo(account)"><i class="unhide icon"></i>View Info</button> 
                  </td>
                  <td class="tableRow" >@{{account.Username}}</td>
                  <td class="tableRow" >@{{account.membership[0].accounttype.AccountTypeName}}</td>
                  <td class="tableRow" >@{{account.membership[0].DateOfRegistration}}</td>
                </tr>
              </tbody>
            </table>
      </div>
      <div class="ui bottom attached tab segment" data-tab="second">
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
      </div>

      <!-- account info modal -->
      <div class="ui small modal" id="infoModal">
        <i class="close icon"></i>
        <div class="header">
          Account Information
        </div>
        <div class="content">
          <div class="description">
            <p>Full Name: <span ng-bind="info_name"></span> </p>
            <p>Address: <span ng-bind="info_address"></span> </p>
            <p>Gender: <span ng-bind="info_gender"></span> </p>
            <p>Birthdate: <span ng-bind="info_birthday"></span> </p>
            <p>Contact Number: <span ng-bind="info_contact"></span> </p>
            <p>Email Address: <span ng-bind="info_email"></span> </p>
            <p>Documents: 
              <p ng-if="info_id != ''">Valid ID: <a ng-bind="info_id" ng-click="gotoUrl(info_id)"></a> </p>
              <p ng-if="info_dti != ''">Valid ID: <a ng-bind="info_dti"></a> </p>
            </p>
          </div>
        </div>
        <div class="actions">
          <button class="ui basic green button" ng-click="approveAccount(selectedAccountID, $index)"><i class="checkmark icon"></i>Approve</button>
        </div>
      </div>
      <!-- END account info modal -->

    </div><!-- segment -->
  </div><!-- twelve wide column -->
</div><!-- ui grid -->

<script>
  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $window){
    $http.get('/unactivatedAccounts')
    .then(function(response){
      $scope.accounts = response.data;
    });

    $scope.showInfo = function(account){
      $scope.info_name = account.membership[0].FirstName + ' ' + account.membership[0].MiddleName + ' ' + account.membership[0].LastName;
      $scope.info_address = account.membership[0].Barangay_Street_Address + ', ' + account.membership[0].city.CityName + ', ' + account.membership[0].city.province.ProvinceName;
      $scope.info_gender = account.membership[0].Gender;
      $scope.info_birthday = account.membership[0].Birthdate;
      $scope.info_contact = 'Cell: ' + account.membership[0].CellphoneNo + ' | Landline: ' + account.membership[0].Landline;
      $scope.info_email = account.membership[0].EmailAdd;
      $scope.info_id = account.membership[0].valid_id;
      $scope.info_dti = account.membership[0].File_DTI;

      $scope.selectedAccountID = account.AccountID;
      $('#infoModal').modal('show');
    }

    $scope.gotoUrl = function(url){
      $window.open(url);
    }

    $scope.approveAccount = function(selectedAccountID, index){
      $http.get('/approveAccount?accountID=' + selectedAccountID)
      .then(function(response){
        if(response.data == 'success'){
          alert('success');
          $scope.accounts.splice(index, 1);
        }
        else {
          alert('error');
        }
        $('#infoModal').modal('hide');
      });
    }
  });

$('.menu .item').tab();
  

</script>
@endsection