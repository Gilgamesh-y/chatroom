<?php
/**
* 
*/
class Chat
{
    public $ser;
    public $data;
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
            $this->data = json_decode($request->data, true);
            $users = json_decode($redis->get('user_list'), true);
            if ($this->data['type'] == 1) {
                $this->login($request, $users, $redis);
            }
            //单独发消息
            if ($this->data['type'] == 2) {
                $this->two_person_chat($request, $users);
            }
            //群组消息
            if ($this->data['type'] == 3) {
                $this->many_person_chat($request, $users);
            }
        });
        $this->ser->on('close', function($ser, $fd) use ($redis) {
            $this->unset_login($fd, $redis);
        });
        $this->ser->start();
    }
    public function login($request, $users = [], $redis)
    {
        $users[$request->fd]['type'] = 'head';
        $users[$request->fd]['name'] = $this->data['name'];
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
    public function unset_login($fd, $redis)
    {
        $users = json_decode($redis->get('user_list'), true);
        unset($users[$fd]);
        $redis->del('user_list');
        $redis->set('user_list', json_encode($users));
        $this->ser->push($fd,json_encode($fd));
    }
    public function two_person_chat($request, $users = [])
    {
        $send_two_person['date'] = date('Y-m-d H:i:s', time());
        $send_two_person['name'] = $users[$request->fd]['name'];
        $send_two_person['avatar'] = $users[$request->fd]['avatar'];
        $send_two_person['type'] = 2;
        $send_two_person['msg'] = $this->data['msg'];
        $send_two_person['fd'] = $request->fd;
        foreach ($this->ser->connections as $fd) {
            $this->ser->push($fd, json_encode($send_two_person));
        }
    }
    public function many_person_chat($request, $users = [])
    {
        foreach ($this->ser->connections as $fd) {
            $send_many_person['type'] = 2;
            $send_many_person['name'] = $users[$request->fd]['name'];
            $send_many_person['fd'] = $request->fd;
            $send_many_person['avatar'] = $users[$request->fd]['avatar'];
            $send_many_person['msg'] = $this->data['msg'];
            $send_many_person['date'] = date('Y-m-d H:i:s', time());
            $this->ser->push($fd, json_encode($send_many_person));
        }
    }
}
        
new Chat();