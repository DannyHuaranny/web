<?php namespace App\Controllers;

use App\Models\{Servicio};
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class ServiciosController extends BaseController 
{
    public function index()
    {
        $servicios = Servicio::all();

        return $this->renderHTML('servicios/index.html', [
            'servicios' => $servicios
        ]);
    }



    public function nuevoForm()
    {
        return $this->renderHTML('servicios/nuevo.html');
    }

    public function updateForm(ServerRequest $request)
    {
        $servicioId = $request->getAttribute('id');
        
        $servicio = Servicio::find($servicioId);


        return $this->renderHTML('servicios/update.html', [
            'servicio' => $servicio
        ]);
    }

    public function postSave(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            
            $servicio = new Servicio;
            $servicio->servicio_nombre = $postData['servicio_nombre'];
            $servicio->precio = $postData['precio'];

            
            $servicio->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/servicios');
    }

    public function postUpdate(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            $idServicio = $request->getAttribute('id');
            
            $servicio = Servicio::find($idServicio);
            $servicio->servicio_nombre = $postData['servicio_nombre'];
            $servicio->precio = $postData['precio'];
            $servicio->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/servicios');
    }

    public function postDelete(ServerRequest $request)
    {
        $servicioId = $request->getAttribute('id');

        $servicio = Servicio::find($servicioId);
        $servicio->delete();

        return new redirectResponse('/fastnet/servicios');
    }
}