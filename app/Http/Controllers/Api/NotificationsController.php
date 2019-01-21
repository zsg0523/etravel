<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Transformers\NotificationTransformer;

class NotificationsController extends Controller
{
	/** [index 消息通知列表] */
    public function index()
    {
    	$notifications = $this->user->notifications()->paginate(20);

    	return $this->response->paginator($notifications, new NotificationTransformer());
    }

    /** [stats 通知统计数] */
    public function stats()
	{
	    return $this->response->array([
	        'unread_count' => $this->user()->notification_count,
	    ]);
	}



	
}
