<?php namespace App\Controllers;

use App\Models\{Persona as Cliente, DocTipo};
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class ClientesController extends BaseController 
{
    public function index()
    {
        $clientes = Cliente::all();

        return $this->renderHTML('clientes/index.html', [
            'clientes' => $clientes
        ]);
    }

    public function perfil(ServerRequest $request)
    {
        $idCliente = $request->getAttribute('id');

        $cliente = Cliente::find($idCliente);

        return $this->renderHTML('clientes/perfil.html', [
            'cliente' => $cliente
        ]);
    }

    public function nuevoForm()
    {
        return $this->renderHTML('clientes/nuevo.html');
    }
    
    public function updateForm(ServerRequest $request)
    {
        $idCliente = $request->getAttribute('id');
        
        $cliente = Cliente::find($idCliente);


        return $this->renderHTML('clientes/update.html', [
            'cliente' => $cliente
        ]);
    }

    public function postSave(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            
            $cliente = new Cliente;
            $cliente->nombre = $postData['nombre'];
            $cliente->doc_tipo_id = 1 /*$postData['doc_tipo']*/;
            // $cliente->ciudad_id = 1;
            $cliente->doc_num = $postData['doc_num'];
            $cliente->direccion = $postData['direccion'];
            $cliente->referencia = $postData['referencia'];
            $cliente->movil = $postData['movil'];
            $cliente->cliente = true;
            $cliente->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/clientes');
    }

    public function postUpdate(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            $idCliente = $request->getAttribute('id');
            
            $cliente = Cliente::find($idCliente);
            $cliente->nombre = $postData['nombre'];
            $cliente->doc_tipo_id = 1 /*$postData['doc_tipo']*/;
            // $cliente->ciudad_id = 1;
            $cliente->doc_num = $postData['doc_num'];
            $cliente->direccion = $postData['direccion'];
            $cliente->referencia = $postData['referencia'];
            $cliente->movil = $postData['movil'];
            $cliente->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/clientes');
    }
    public function postDelete(ServerRequest $request)
    {
        try {
            $idCliente = $request->getAttribute('id');

            $cliente = Cliente::find($idCliente);
            $cliente->delete();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/clientes');
    }
}