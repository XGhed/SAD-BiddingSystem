@extends('customer.homepage')

@section('content')
<div ng-app="myApp" ng-controller="myController">
	<div style="margin: 100px 0 0 0" class="ui container segment">
	@include('customer.topnav')
		<div class="ui segment">
			<h1 class="ui centered header">Inbox</h1>

			<form class="ui form">
				<div class="fields">
        <div class="field">
        </div>
					<div class="three wide field ui compact segment">
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
                  @{{thread.Subject}}
                  </div>
                </div>
              </div>
						</div>
					</div>	

					<div class="field"></div>

					<div class="twelve wide field">
						<div class="ui segment" id="inbox">
							<div class="ui sub header">SUBJECT:</div>
								<div class="ui inverted segment">
									<p>@{{selectedThread.Subject}}</p>
								</div>

							<div class="ui sub header">MESSAGE:</div>
              <div class="ui inverted segment">
                <div ng-repeat="message in selectedThread.messages">
                	<p class="ui right aligned  basic segment" ng-if="message.Sender != 'Admin'">
                		<span class="ui segment">@{{message.Message}}</span>
	                </p>
	                <p class="ui left aligned basic segment" ng-if="message.Sender == 'Admin'">
	                	<span class="ui segment">@{{message.Message}}</span>
	                </p>
                </div>
              </div>

							<div class="field">
								<div class="ui sub header">REPLY:</div>
								<textarea cols="3" rows="2" ng-model="replyArea"></textarea>
								<p></p>
								<button type="submit" class="ui green button" ng-click="reply()"><i class="send icon"></i>REPLY</button>
							</div>
						</div>
					</div>

				</div>
			</form>
		</div>
</div>

		<div class="ui small modal" id="addModal">
          <i class="close icon"></i>
            <div class="header">
              Create Message
            </div>
            <div class="content">
              <form class="ui form" action="sendMessageCustomer" method="POST">
             		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="ui inverted segment">
                	<div class="field">
			              <div class="ui subheader">SUBJECT:</div>
			              <input type="text" name="subject">
			            </div>

                  <div class="field">
                    <div class="ui subheader">TYPE OF REPORT:</div>
				            <select class="ui fluid search normal selection dropdown" name="subject">
				            <option value="">Select Problem</option>
				            	<option ng-repeat="problemType in problemTypes" value="@{{problemType.ProblemTypeID}}">@{{problemType.Problem}}</option>
				            </select>                        
                  </div>
                  <div class="field">
                    <div class="ui subheader">MESSAGE:</div>
                    <textarea name="content"> </textarea>
                  </div>
                  <button type="submit" class="ui green button"><i class="send icon"></i>Send Message</button>
                </div>
              </form>
            </div>
        </div>
</div>

<script>
$('.menu .item').tab();

$('.ui.normal.dropdown').dropdown();

//add modal
  $(document).ready(function(){
       $('#addBtn').click(function(){
          $('#addModal').modal('show');    
       });
  });

var app = angular.module('myApp', ['datatables']);
  app.controller('myController', function($scope, $http, $timeout){
    $http.get('mainte_ProblemTypesList')
    .then(function(response){
      $scope.problemTypes = response.data;
    });

    $http.get('customerThreadList')
    .then(function(response){
      $scope.threads = response.data;
    });

    $scope.openThread = function(thread){
      $scope.selectedThread = thread;
      $http.get('customerThreadList')
      .then(function(response){
        $scope.threads = response.data;
      });
    }

    $scope.reply = function(){
      $http.get('replyMessageCustomer?threadID=' + $scope.selectedThread.ThreadID + '&message=' + $scope.replyArea)
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