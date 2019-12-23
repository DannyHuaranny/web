<?php namespace App\Controllers;

use App\Models\{InstalacionTipo};
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class InstalacionesTipoController extends BaseController 
{
    public function index()
    {
        $instalaciones_tipo = InstalacionTipo::all();

        return $this->renderHTML('instalaciones_tipo/index.html', [
            'instalaciones_tipo' => $instalaciones_tipo
        ]);
    }



    public function nuevoForm()
    {
        return $this->renderHTML('instalaciones_tipo/nuevo.html');
    }

    public function updateForm(ServerRequest $request)
    {
        $instalacion_tipoId = $request->getAttribute('id');
        
        $instalacion_tipo = InstalacionTipo::find($instalacion_tipoId);


        return $this->renderHTML('instalaciones_tipo/update.html', [
            'instalacion_tipo' => $instalacion_tipo
        ]);
    }

    public function postSave(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            
            $instalacion_tipo = new InstalacionTipo;
            $instalacion_tipo->instalacion_nombre = $postData['instalacion_nombre'];
 

            
            $instalacion_tipo->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/instalaciones_tipo');
    }

    public function postUpdate(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            $idInstalacionTipo = $request->getAttribute('id');
            
            $instalacion_tipo = InstalacionTipo::find($idInstalacionTipo);
            $instalacion_tipo->instalacion_nombre = $postData['instalacion_nombre'];
            $instalacion_tipo->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/instalaciones_tipo');
    }

    public function postDelete(ServerRequest $request)
    {
        $instalacion_tipoId = $request->getAttribute('id');

        $instalacion_tipo = InstalacionTipo::find($instalacion_tipoId);
        $instalacion_tipo->delete();

        return new redirectResponse('/fastnet/instalaciones_tipo');
    }
}