<?php

namespace app\controller;

use app\entity\UserEntity;
use Respect\Validation\Factory;
use support\Request;

class AuthController
{
    public function index(Request $request)
    {
        Factory::setDefaultInstance(
            (new Factory())->withTranslator('gettext')
        );

        $validation = (new UserEntity(
            name: $request->input('name'),
            password: $request->input('password'),
            email: $request->input('email')
        ))->validateName()
            ->validatePassword()
            ->validateEmail()
            ->check();

        return json(['code' => 0, 'msg' => 'ok', 'data' => $validation]);
    }
}
