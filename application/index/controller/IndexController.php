<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

class IndexController extends Controller
{
	// function __construct() {
 //    		parent::__construct();
 //    		$chat = new Chat();
 //    		$chat->chat();
 //    }
    public function index()
    {
    	$request = Request::instance();
    	if ($request->get('type') == 'group') {
    		return view('chat_group',[
    			'fd' => $request->get('fd'),
    		]);
    	}
    	return view();
    }
}
