<?php
/**
* 
*/
class Chat
{
    public $ser;
    public function __construct()
    {
        $this->ser = new swoole_websocket_server('0.0.0.0', 9501);
        $this->ser->set([
            'daemonize' => 1,
        ]);
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
        $this->ser->on('open', function($ser, $request) use ($redis) {
            echo 'link success';
        });
        $this->ser->on('message', function ($ser, $request) use ($redis) {
            $data = json_decode($request->data, true);
            $users = json_decode($redis->get('user_list'), true);
            if ($data['type'] == 1) {
                $users[$request->fd]['type'] = 'head';
                $users[$request->fd]['name'] = $data['name'];
                $users[$request->fd]['avatar'] = rand(1,10);
                $users[$request->fd]['fd'] = $request->fd;
                $this->ser->push($request->fd,json_encode($users[$request->fd]), true);
                //存入user_list
                $redis->set('user_list',json_encode($users));

                foreach ($this->ser->connections as $fd) {
                    $info['type'] = 1;
                    $info['list'] = json_decode($redis->get('user_list'), true);
                    $this->ser->push($fd, json_encode($info));
                }
            }
            //单独发消息
            if ($data['type'] == 2) {
                $this->ser->push($fd, json_encode($two_person));
            }
            //群组消息
            if ($data['type'] == 3) {
                foreach ($this->ser->connections as $fd) {
                    $info['type'] = 2;
                    $info['name'] = $users[$request->fd]['name'];
                    $info['avatar'] = $users[$request->fd]['avatar'];
                    $info['msg'] = $data['msg'];
                    $info['date'] = date('Y-m-d H:i:s', time());
                    $this->ser->push($fd, json_encode($info));
                }
            }
        });
        $this->ser->on('close', function($ser, $fd) use ($redis) {
            $users = json_decode($redis->get('user_list'), true);
            unset($users[$fd]);
            $redis->del('user_list');
            $redis->set('user_list', json_encode($users));
            $this->ser->push($fd,json_encode($fd));
        });
        $this->ser->start();
    }
}
        
new Chat();