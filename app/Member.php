<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Business\MemberBusiness;
use App\Dal\MemberDao;
use App\Member;

	class Member{
		
		public $firstName;
		public $lastName;
		public $middleName;
		public $address;
	}