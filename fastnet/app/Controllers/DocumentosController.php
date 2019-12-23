<?php namespace App\Controllers;

use App\Models\{DocTipo};
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class DocumentosController extends BaseController 
{
    public function index()
    {
        $documentos = DocTipo::all();

        return $this->renderHTML('documentos/index.html', [
            'documentos' => $documentos
        ]);
    }

    public function nuevoForm()
    {
        return $this->renderHTML('documentos/nuevo.html');
    }
    
    public function updateForm(ServerRequest $request)
    {
        $idDocumento = $request->getAttribute('id');
        
        $documento = DocTipo::find($idDocumento);


        return $this->renderHTML('documentos/update.html', [
            'documento' => $documento
        ]);
    }

    public function postSave(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            
            $documento = new DocTipo;
            $documento->doc_nombre = $postData['doc_nombre'];
            $documento->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/documentos');
    }

    public function postUpdate(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            $idDocumento = $request->getAttribute('id');
            
            $documento = Doctipo::find($idDocumento);
            $documento->doc_nombre = $postData['doc_nombre'];
            $documento->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/documentos');
    }
    public function postDelete(ServerRequest $request)
    {
        try {
            $idDocumento = $request->getAttribute('id');

            $documento = DocTipo::find($idDocumento);
            $documento->delete();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/documentos');
    }
}