<?php
namespace App\Controllers;

use App\Models\{User,Persona};
// use Respect\Validation\Validator as v;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class UsersController extends BaseController {
    public function index() {
        $personas = Persona::join('usuarios','personas.persona_id', '=', 'usuarios.persona_id')->get();

        return $this->renderHTML('/usuarios/index.html',[
            'usuarios' => $personas,
        ]);
    }

    public function nuevoForm() {
        $personas = Persona::where('usuario','=','false')->get();

        return $this->renderHTML('/usuarios/nuevo.html',[
            'personas' => $personas,
        ]);
    }

    public function postSave(ServerRequest $request) {
        $postData = $request->getParsedBody();
        $idUsuario = $postData['persona_id'];
        $personas = Persona::where('usuario','=','false')->get();

        // Validation aqui
        $users = User::select('user')->get();
        $nombreDeUsuario = $users;
        $mensaje = null;
        $user = null;

        foreach ($nombreDeUsuario as $user) {
            if ($user['user'] == $postData['user']) {
                $mensaje = "el usuario ya existe";
                return $this->renderHTML('/usuarios/nuevo.html',[
                    'mensaje' => $mensaje,
                    'personas' => $personas
                ]);
            }
        }

        $persona = Persona::find($idUsuario);
        $persona->usuario = true;
        $persona->save();

        $user = new User();
        $user->persona_id = $idUsuario;
        $user->user = $postData['user'];
        $user->pass = password_hash($postData['password'], PASSWORD_DEFAULT);
        $user->usuario_tipo = $postData['usuario_tipo'];
        $user->save();

        return new RedirectResponse('/fastnet/users');
    }

    public function postDelete(ServerRequest $request) {
        $idUsuario = $request->getAttribute('idUser');
        $idPersona = $request->getAttribute('idPersona');
        
        $persona = Persona::find($idPersona);
        $persona->usuario = false;
        $persona->save();

        $user = User::find($idUsuario);
        $user->delete();

        return new RedirectResponse('/fastnet/users');
    }
}