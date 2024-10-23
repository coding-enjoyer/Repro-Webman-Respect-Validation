<?php

namespace app\rule;

class UserRule
{
    public function index()
    {
        return json(['code' => 0, 'msg' => 'ok']);
    }
}
