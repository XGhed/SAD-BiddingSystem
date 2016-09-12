

				<div class="ui basic modal" id="announcement" ng-app="myApp" ng-controller="announcementController">
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
;

app.controller('announcementController', function($scope, $http){
	$http.get('/latestAnnouncement')
	.then(function(response){
		if(response.data != 'No Announcement'){
			$scope.latestAnnouncement = response.data;
			$('#announcement').modal('show');
		}
		else {
			$scope.latestAnnouncement = null;
		}
	});
});
</script>