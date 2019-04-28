<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JPush\Client as JPush;

class JpushsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $push = $client->push();
        // dd($push);
        // $pusher = $client->push();
        // $pusher->setPlatform('all');
        // $pusher->addAllAudience();
        // $pusher->setNotificationAlert('Hello, JPush');
        // try {
        //     $pusher->send();
        // } catch (\JPush\Exceptions\JPushException $e) {
        //     // try something else here
        //     print $e;
        // }
        //初始化
        $client = new \JPush\Client('dcaa6c9777de8aa4756ba44c','1f9163f177a480dd38b06100');
        
        //异常处理
        $push = $client->push();
        $push->setPlatform('all');
        $push->addAllAudience();
        $push->setNotificationAlert('推送消息弹框提示信息');

        try {
            dd($push->send());
        } catch (\JPush\Exceptions\JPushException $e) {
            dd($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
