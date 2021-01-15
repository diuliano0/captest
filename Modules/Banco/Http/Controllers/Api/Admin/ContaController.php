<?php

namespace Modules\Banco\Http\Controllers\Api\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Banco\Http\Requests\ContaRequest;
use Modules\Banco\Http\Requests\ContaSaqueRequest;
use Modules\Banco\Service\ContaService;

class ContaController extends Controller
{

    /**
     * @var ContaService
     */
    private $contaService;

    public function __construct(ContaService $contaService)
    {

        $this->contaService = $contaService;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(ContaRequest $request)
    {
        return $this->contaService->index($request);
    }

    public function saque(ContaSaqueRequest $request, $contaId){
        return $this->contaService->saque($contaId, $request->get('valor'));
    }

    public function deposito(ContaSaqueRequest $request, $contaId){
        return $this->contaService->deposito($contaId, $request->get('valor'));
    }
}
