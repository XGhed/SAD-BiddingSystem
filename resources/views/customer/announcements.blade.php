

				<div class="ui basic modal" ng-app="announcementApp" ng-controller="announcementController">
				  <i class="close icon"></i>
				  <div class="ui centered header">
				    @{{latestAnnouncement.Subject}}
				  </div>
				  <div class="content">
				  	<div class="ui inverted segment">
				  		@{{latestAnnouncement.Content}}
				  	</div>
				  </div>
				  <div class="actions">
				  	<button class="ui approve fluid blue button"><i class="thumbs up icon"></i> Okay, Got it.</button>
				  </div>
				</div>

<script>
$('.ui.basic.modal').modal({
    closable  : false
  })
  .modal('show')
;

var app = angular.module('announcementApp', []);
app.controller('announcementController', function($scope, $http){
	$http.get('/latestAnnouncement')
	.then(function(response){
		$scope.latestAnnouncement = response.data;
	});
});
</script>