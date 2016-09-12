@extends('admin1.mainteParent')

@section('content')
<div ng-app="myApp" ng-controller="myController">
  <div class="ui grid">
    @include('admin1.Utilities.sideNav')
    <div class="twelve wide stretched column">
      <div class="ui segment">
      <h1 class="ui centered header"><i class="mail icon"></i>Reply to messages</h1>
        <p id="curDate" style="font-size:20px" class="ui basic right aligned segment"></p>
        <form class="ui form">
          <div class="fields">
            <div class="five wide field ui compact segment">
              <!-- <a class="ui fluid green button" id="inboxBtn"><i class="mail icon"></i> Inbox</a><br>
              <a class="ui fluid blue button" id="sendBtn">Send Message</a> -->
              <div class="ui middle aligned selection list">
                <div class="item">
                  <a class="ui basic blue button" id="addBtn">
                    <i class="mail icon"></i>
                    Create message
                  </a>
                </div>
                <div class="item" ng-repeat="thread in threads" ng-click="openThread(thread)">
                  <div class="content">
                    <div class="header">
                    @{{thread.account.AccountID}} - 
                    @{{thread.account.membership[0].LastName}}, 
                    @{{thread.account.membership[0].FirstName}} 
                    @{{thread.account.membership[0].MiddleName}}
                    </div>
                  </div>
                </div>
              </div>
            </div>  

            <div class="field"></div>

            <div class="ten wide field">
              <div class="ui segment" id="inbox">
                <div class="ui sub header">SUBJECT:</div>
                  <div class="ui inverted segment">
                    <p>@{{selectedThread.Subject}}</p>
                  </div>

                <div class="ui sub header">MESSAGE:</div>
                  <div class="ui inverted segment">
                    <p class="ui right aligned  basic segment" ng-repeat="message in selectedThread.messages" ng-if="message.Sender == 'Admin'">
                      <span class="ui segment">@{{message.Message}}</span>
                    </p>
                    <p class="ui left aligned basic segment" ng-repeat="message in selectedThread.messages" ng-if="message.Sender != 'Admin'">
                      <span class="ui segment">@{{message.Message}}</span>
                    </p>
                  </div>
                <div class="field">
                  <div class="ui sub header">REPLY:</div>
                  <textarea cols="3" rows="2" ng-model="replyArea"></textarea>
                  <p></p>
                  <button class="ui green button" ng-click="reply()"><i class="send icon"></i>REPLY</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="ui small modal" id="addModal">
    <i class="close icon"></i>
      <div class="header">
        Create Message
      </div>
      <div class="content">
        <form class="ui form" action="/sendMessageAdmin" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="ui inverted segment">
            <div class="field">
              <div class="ui subheader">SUBJECT:</div>
              <input type="text" name="subject">
            </div>
            <div class="field">
              <div class="ui subheader">MESSAGE:</div>
              <textarea name="content"> </textarea>
            </div>
            <div class="field">
              <div class="ui subheader">TO:</div>
              <select class="ui fluid multiple search normal selection dropdown" name="receivers[]">
                <option value="" selected disabled>Select Customer</option>
                <option ng-repeat="customer in customers" value="@{{customer.AccountID}}">@{{customer.AccountID}} @{{customer.membership[0].LastName}}, @{{customer.membership[0].FirstName}} @{{customer.membership[0].MiddleName}}</option>
              </select>
            </div>

            <button class="ui green button"><i class="send icon"></i>Send Message</button>
          </div>
        </form>
      </div>
  </div>
</div>

<script>
  var d = new Date();
  document.getElementById("curDate").innerHTML = d.toDateString();

  $('.ui.normal.dropdown').dropdown();

  //add modal
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('#addModal').modal('show');    
       });
  });

  var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $timeout){
    $http.get('accountsList')
    .then(function(response){
      $scope.customers = response.data;
    });

    $http.get('threadList')
    .then(function(response){
      $scope.threads = response.data;
    });

    $scope.openThread = function(thread){
      $scope.selectedThread = thread;
      $http.get('threadList')
      .then(function(response){
        $scope.threads = response.data;
      });
    }

    $scope.reply = function(){
      $http.get('replyMessageAdmin?threadID=' + $scope.selectedThread.ThreadID + '&message=' + $scope.replyArea)
      .then(function(response){
        if(response.data == "error"){
          alert('error');
        }
        else {
          alert('success');
          $scope.selectedThread = response.data;
          $scope.replyArea = "";
        }
      });
    }
  });

</script>
@endsection