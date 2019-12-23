<?php namespace App\Controllers;

use App\Models\{Contrato, Persona as Cliente, Ip, Plan, DocTipo};
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class ContratosController extends BaseController 
{
    public function index()
    {
        $contratos = Contrato::join('personas','personas.persona_id','=','contratos.cliente_id')
                    ->join('planes','planes.plan_id','=','contratos.plan_id')
                    ->join('ips_cliente','ips_cliente.ip_cliente_id','=','contratos.ip_cliente_id')
                    ->get();

        return $this->renderHTML('contratos/index.html', [
            'contratos' => $contratos
        ]);
    }

    public function nuevoForm()
    {
        $clientes = Cliente::all();
        $docTipos = DocTipo::all();
        $planes = Plan::all();

        return $this->renderHTML('contratos/nuevo.html',[
            'clientes' => $clientes,
            'docTipos' => $docTipos,
            'planes' => $planes
        ]);
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