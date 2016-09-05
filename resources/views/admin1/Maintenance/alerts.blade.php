	
	<?php
        if (Session::get('message') != null){
          if(Session::get('message') == '1')
            echo "<div class='ui success message'>
		          	<i class='close icon'></i>
		          	<div class='ui centered header'>
		            Added successfully!!
		          	</div>
		          </div>";
          elseif(Session::get('message') == '2')
            echo "<div class='ui success message'>
		          	<i class='close icon'></i>
		          	<div class='ui centered header'>
		            Updated successfully!!
		          	</div>
		          </div>";
          elseif(Session::get('message') == '3')
            echo "<div class='ui success message'>
		          	<i class='close icon'></i>
		          	<div class='ui centered header'>
		            Removed successfully!!
		          	</div>
		          </div>";
          elseif(Session::get('message') == '-1')
            echo "<div class='ui error message'>
		          	<i class='close icon'></i>
		          	<div class='ui centered header'>
		            	ERROR
		          	</div>
		          </div>";
          Session::forget('message');
        }
        ?>      
      