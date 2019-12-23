<?php namespace App\Controllers;

use App\Models\{Plan};
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\Response\RedirectResponse;

class PlanesController extends BaseController 
{
    public function index()
    {
        $planes = Plan::all();

        return $this->renderHTML('planes/index.html', [
            'planes' => $planes
        ]);
    }

    public function postDelete(ServerRequest $request)
    {
        $planId = $request->getAttribute('id');

        $plan = Plan::find($planId);
        $plan->delete();

        return new redirectResponse('/fastnet/planes');
    }

    public function nuevoForm()
    {
        return $this->renderHTML('planes/nuevo.html');
    }

    public function updateForm(ServerRequest $request)
    {
        $planId = $request->getAttribute('id');
        
        $plan = Plan::find($planId);


        return $this->renderHTML('planes/update.html', [
            'plan' => $plan
        ]);
    }

    public function postSave(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            
            $plan = new Plan;
            $plan->plan_nombre = $postData['plan_nombre'];
            $plan->subida = $postData['subida'];
            $plan->bajada = $postData['bajada'];
            $plan->precio = $postData['precio'];
            
            $plan->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/planes');
    }

    public function postUpdate(ServerRequest $request)
    {
        try {
            $postData = $request->getParsedBody();
            $idPlan = $request->getAttribute('id');
            
            $plan = Plan::find($idPlan);
            $plan->plan_nombre = $postData['plan_nombre'];
            $plan->subida = $postData['subida'];
            $plan->bajada = $postData['bajada'];
            $plan->precio = $postData['precio'];
            $plan->save();
        } catch (\Throwable $e) {
            throw $e;
        }

        return new redirectResponse('/fastnet/planes');
    }
}