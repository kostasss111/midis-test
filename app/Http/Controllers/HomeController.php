<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class HomeController extends Controller
{
    public function index(Request $request)
    {		
		if ($request->query('sortBy') == "username") {
		    $messages = Message::orderBy(
			    'username', 
				$request->query('direction')
				)->paginate(10);
		}
		elseif ($request->query('sortBy') == "created_at") {
		    $messages = Message::orderBy(
			    'created_at', 
				$request->query('direction')
				)->paginate(10);
		}
		else {
		    $messages = Message::latest()->paginate(10);
		}
		
		$data = [
			'messages' => $messages,
			'page' => $request->query('page'),
			'sortBy' => $request->query('sortBy'),
			'direction' => 'desc',
			'request' => $request,
		];

        return view('pages.messages.index', $data);
    }
	
	public function createNewMessage()
    {
	    $data = request()->validate([
		    'name' => 'required|min:2',
		    'email' => 'required|email',
		    'message' => 'required|min:1',
			'g-recaptcha-response' => 'required|captcha',
		]);
		
		$newMessage = new Message();
		$newMessage->username = request('name');
		$newMessage->userEmail = request('email');
		$newMessage->urlLink = request('url-link');
		$newMessage->message = request('message');
		$newMessage->userIp = request()->server('REMOTE_ADDR');
		$newMessage->userBrowser = 
		    $this->getUserBrowser(
			    request()->server('HTTP_USER_AGENT')
				);
		$newMessage->save();
		
		return back();
    }
	
	private static function getUserBrowser($userAgent)
	{		
		if (strpos($userAgent, 'MSIE') !== false) {
			$browserName = "Internet Explorer";
		} elseif (strpos($userAgent, 'Trident') !== false) {
			$browserName = "Internet explorer";
		} elseif (strpos($userAgent, 'Firefox') !== false) {
			$browserName = "Mozilla Firefox";
		} elseif (strpos($userAgent, 'Chrome') !== false) {
			$browserName = "Google Chrome";
		} elseif (strpos($userAgent, 'Opera Mini') !== false) {
			$browserName = "Opera Mini";
		} elseif (strpos($userAgent, 'Opera') !== false) {
			$browserName = "Opera";
		} elseif (strpos($userAgent, 'Safari') !== false) {
			$browserName = "Safari";
		} else {
			$browserName = "Impossible determined";
		}
		
		return $browserName;
	}
}
