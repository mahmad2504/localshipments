<?php

namespace App\Http\Controllers;
use App\Database;
use \MongoDB\Client;
use \MongoDB\BSON\UTCDateTime;

use Auth;
use Illuminate\Http\Request;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
	
    }
	public function Index(Request $request)
	{
		$db = new Database();
		$tickets = $db->ReadActive()->toArray();
		for($i=0;$i<count($tickets);$i++)
		{
			$tickets[$i] = $tickets[$i]->jsonSerialize();
			unset($tickets[$i]->_id);
			unset($tickets[$i]->id);
		}
		return view('home',compact('tickets'));
	}
}