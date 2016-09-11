@extends('customer.homepage')

@section('content')
<div style="margin: 100px 0 0 0" class="ui container segment">
	@include('customer.sidenav')
		<div class="ui segment">
			<h1 class="ui centered header">Inbox</h1>

			<form class="ui form">
				<div class="fields">
					<div class="five wide field ui compact segment">
						<a class="ui fluid green button" id="inboxBtn"><i class="mail icon"></i> Inbox</a><br>
						<a class="ui fluid blue button" id="sendBtn">Send Message</a>
					</div>	

					<div class="field"></div>

					<div class="ten wide field ui segment" id="inbox">
						<div class="ui accordion">
						  <div class="title">
						    <i class="dropdown icon"></i>
						    TITLE
						  </div>
						  <div class="content ui inverted segment">
						    <p>A dog is a type of domesticated animal. Known for its loyalty and faithfulness, it can be found as a welcome guest in many households across the world.</p>
						  </div>
						</div>
					</div>

					<div class="ten wide field ui segment" id="sendMessage" style="display:none">
						<div class="ui subheader">MESSAGE:</div>
						<textarea></textarea>
						<button class="ui green button">SEND</button>
					</div>
				</div>
			</form>
		</div>
</div>

<script>
$('.menu .item').tab();

$('.ui.accordion').accordion();

$('#sendBtn').click(function (){
	$('#sendMessage').show();
	$('#inbox').hide();
})
$('#inboxBtn').click(function (){
	$('#sendMessage').hide();
	$('#inbox').show();

})

</script>
@endsection