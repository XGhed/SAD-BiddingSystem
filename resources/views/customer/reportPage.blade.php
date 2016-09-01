<!DOCTYPE html>
<html>
	<head>
		<title>Report</title>
		<link rel="icon" href="icons/icon.png">
		<link type="text/css" rel="stylesheet" href="{!!URL::asset('css/Semantic-UI-CSS-master/semantic.css')!!}"/>
      <script type="text/javascript" src="{!!URL::asset('js/jquery-2.1.1.min.js')!!}"></script>
		<script type="text/javascript" src="{!!URL::asset('js/semantic.min.js')!!}"></script>
	</head>

	<body style="background-image: url('/icons/bg3.png');  background-repeat: no-repeat;
	    background-attachment: fixed;" class="ui container">

	    <div class="ui piled segment" style="margin: 50px 0 0 0;">
	    	<h2 class="ui centered header" ><i class="warning sign icon"></i>Report a Problem</h2>

	    	<form class="ui form">
	    		<div class="ui inverted segment">
		    		<div class="ten wide field">
	                    <div class="ui sub header inverted">What is your problem?</div>
	                    <div class="ui fluid search selection dropdown" id="problem">
	                      <input name="add_problem" type="hidden">
	                      <i class="dropdown icon"></i>
	                      <div class="default text inverted">type your problem here...</div>
	                      <div class="menu" id="add_color">
	                          <div class="item" data-value="2">hello</div>
	                      </div>
	                    </div>
	                </div>
	                <div class="twelve wide field">
	                	<div class="ui sub header">Explain here</div>
	                	<textarea rows="3" placeholder="explain here..."></textarea>
	                </div>
                </div>
            <div class="ui divider"></div>
                <div class="ui inverted segment">
                	ghed1
                </div>
            <div class="ui divider"></div>
            	<div class="ui inverted segment">
            		ghed2
                </div>
                <button type="submit" class="ui green button"><i class="checkmark icon"></i>Submit</button>
            </form>
	    </div>

		
		<script>
			$('#problem')
			  .dropdown({
			    allowAdditions: true
 			 });
		</script>
	</body>
</html>
