<?php namespace App\Controllers;

use App\Models\{Router};
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class RoutersController extends BaseController 
{
    public function index()
    {
        $routers = Router::all();

        return $this->renderHTML('routers/index.html', [
            'routers' => $routers
        ]);
    }



    public function nuevoForm()
    {
        return $this->renderHTML('routers/nuevo.html');
    }

    public function updateForm(ServerRequest $request)
    {
        $routerId = $request->getAttribute('id');
        
        $router = Router::find($routerId);


        return $this->renderHTML('routers/update.html', [
            'router' => $router
        ]);
    }

    public function postSave(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            
            $router = new Router;
            $router->router_nombre = $postData['router_nombre'];
            $router->router_ip = $postData['router_ip'];
            $router->router_user = $postData['router_user'];
            $router->router_pass = $postData['router_pass'];
            
            $router->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/routers');
    }

    public function postUpdate(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            $idRouter = $request->getAttribute('id');
            
            $router = Router::find($idRouter);
            $router->router_nombre = $postData['router_nombre'];
            $router->router_ip = $postData['router_ip'];
            $router->router_user = $postData['router_user'];
            $router->router_pass = $postData['router_pass'];
            
            $router->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/routers');
    }

    public function postDelete(ServerRequest $request)
    {
        $routerId = $request->getAttribute('id');

        $router = Router::find($routerId);
        $router->delete();

        return new redirectResponse('/fastnet/routers');
    }
}