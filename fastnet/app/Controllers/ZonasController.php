<?php namespace App\Controllers;

use App\Models\{Zona};
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class ZonasController extends BaseController 
{
    public function index()
    {
        $zonas = Zona::all();

        return $this->renderHTML('zonas/index.html', [
            'zonas' => $zonas
        ]);
    }



    public function nuevoForm()
    {
        return $this->renderHTML('zonas/nuevo.html');
    }

    public function updateForm(ServerRequest $request)
    {
        $zonaId = $request->getAttribute('id');
        
        $zona = Zona::find($zonaId);


        return $this->renderHTML('zonas/update.html', [
            'zona' => $zona
        ]);
    }

    public function postSave(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            
            $zona = new Zona;
            $zona->zona_nombre = $postData['zona_nombre'];
            $zona->zona_caja = $postData['zona_caja'];

            
            $zona->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/zonas');
    }

    public function postUpdate(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            $idZona = $request->getAttribute('id');
            
            $zona = Zona::find($idZona);
            $zona->zona_nombre = $postData['zona_nombre'];
            $zona->zona_caja = $postData['zona_caja'];
            $zona->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/zonas');
    }

    public function postDelete(ServerRequest $request)
    {
        $zonaId = $request->getAttribute('id');

        $zona = Zona::find($zonaId);
        $zona->delete();

        return new redirectResponse('/fastnet/zonas');
    }
}