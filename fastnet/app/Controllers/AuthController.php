<?php
namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator as v;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Diactoros\ServerRequest;

class AuthController extends BaseController {
    public function loginForm() {
        $userIdSession = $_SESSION['userId'] ?? null;
        if (empty($userIdSession)) {
            return $this->renderHTML('/auth/index.html');
        }else {
            return new RedirectResponse('/fastnet/clientes');
        }
    }
    public function estilo() {
        return $this->renderHTML('/layout3.html');
    }

    public function postLogin(ServerRequest $request) {
        $postData = $request->getParsedBody();
        $responseMessage = null;
        $usuario = $postData['usuario'];
        $password = $postData['password'];

        $user = User::where('user', $usuario)->first();
        if($user) {
            if (password_verify($password, $user->pass)) {
                $_SESSION['userId'] = $user->usuario_id;
                return new RedirectResponse('/fastnet/clientes');
            } else {
                $responseMessage = 'Credenciales Incorrectos';
            }
        } else {
            $responseMessage = 'Cledenciales Incorrectos';
        }

        return $this->renderHTML('/auth/index.html', [
            'responseMessage' => $responseMessage,
            'user' => $user
        ]);
    }

    public function getLogout() {
        unset($_SESSION['userId']);
        return new RedirectResponse('/fastnet/login');
    }
}