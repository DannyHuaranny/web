<?php namespace App\Controllers;

use App\Models\{Servidor,Ip};
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class ServidoresController extends BaseController 
{
    public function index()
    {
        $servidores = Servidor::all();

        return $this->renderHTML('servidores/index.html', [
            'servidores' => $servidores
        ]);
    }



    public function nuevoForm()
    {
        return $this->renderHTML('servidores/nuevo.html');
    }

    public function updateForm(ServerRequest $request)
    {
        $servidorId = $request->getAttribute('id');
        
        $servidor = Servidor::find($servidorId);


        return $this->renderHTML('servidores/update.html', [
            'servidor' => $servidor
        ]);
    }

    public function postSave(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            
            $servidor = new Servidor;
            $servidor->servidor_nombre = $postData['servidor_nombre'];
            $servidor->rango_inicial = $postData['ri1']. '.' .$postData['ri2'] . '.' . $postData['ri3']. '.' .$postData['ri4'];
            $servidor->rango_final=  $postData['rf1']. '.' .$postData['rf2']. '.' .$postData['rf3']. '.' .$postData['rf4'];
     
            $r_ini=$postData['ri4'];
            $r_fin=$postData['rf4'];
            $servidor->save();
            for ($i=$r_ini; $i <= $r_fin; $i++) { 
               $ip= new Ip;
               $ip->ip_address=$postData['ri1']. '.' .$postData['ri2'] . '.' . $postData['ri3']. '.' .$i;
               $ip->asignada=false;
               $ip->servidor_id=$servidor->servidor_id;
               $ip->save();
            }
            
            
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/servidores');
    }

    public function postUpdate(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            $idServidor = $request->getAttribute('id');
            
            $servidor = Servidor::find($idServidor);
            $servidor->servidor_nombre = $postData['servidor_nombre'];
            $servidor->precio = $postData['precio'];
            $servidor->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/servidores');
    }

    public function postDelete(ServerRequest $request)
    {
        $servidorId = $request->getAttribute('id');

        $servidor = Servidor::find($servidorId);
        $servidor->delete();

        return new redirectResponse('/fastnet/servidores');
    }
}