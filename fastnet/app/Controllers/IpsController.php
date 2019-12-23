<?php namespace App\Controllers;

use App\Models\{Ip, Servidor};
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class IpsController extends BaseController 
{
    public function index()
    {
        $ips = Ip::all();
        $servidores = Servidor::all();

        return $this->renderHTML('ips/index.html', [
            'ips' => $ips,
            'servidores' => $servidores
        ]);
    }



    public function nuevoForm()
    {
        return $this->renderHTML('ips/nuevo.html');
    }

    public function updateForm(ServerRequest $request)
    {
        $ipId = $request->getAttribute('id');
        
        $ip = Ip::find($ipId);


        return $this->renderHTML('ips/update.html', [
            'ip' => $ip
        ]);
    }

    public function postSave(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            
            $ip = new Ip;
            $ip->ip_address = $postData['ip_address'];
         

            
            $ip->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/ips');
    }

    public function postUpdate(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            $idIp = $request->getAttribute('id');
            
            $ip = Ip::find($idIp);
            $ip->ip_address = $postData['ip_address'];
            $ip->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/ips');
    }

    public function postDelete(ServerRequest $request)
    {
        $ipId = $request->getAttribute('id');

        $ip = Ip::find($ipId);
        $ip->delete();

        return new redirectResponse('/fastnet/ips');
    }
}