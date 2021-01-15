<?php


namespace Modules\Banco\Service;


use App\Presenters\ContaPresenter;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Modules\Banco\Repositories\ContaRepository;
use App\Traits\ResponseActions;
use Prettus\Repository\Exceptions\RepositoryException;

class ContaService extends BaseService
{
    use ResponseActions;

    private $contaRepository;

    public function __construct(ContaRepository $contaRepository)
    {
        $this->contaRepository = $contaRepository;
    }

    public function getDefaultRepository()
    {
        return $this->contaRepository;
    }


    public function index($request){
        try{
            return $this->getDefaultRepository()
                ->all();
        }catch (ModelNotFoundException $e){
            return self::responseError(self::$HTTP_CODE_NOT_FOUND, trans('errors.registre_not_found', ['status_code'=>$e->getCode(),'message'=>$e->getMessage(),
                'arquivo'=>$e->getFile(),
                'linha'=>$e->getLine()]));
        }
        catch (RepositoryException $e){
            return self::responseError(self::$HTTP_CODE_NOT_FOUND, trans('errors.registre_not_found', ['status_code'=>$e->getCode(),'message'=>$e->getMessage(),
                'arquivo'=>$e->getFile(),
                'linha'=>$e->getLine()]));
        }
        catch (\Exception $e){
            return self::responseError(self::$HTTP_CODE_BAD_REQUEST, trans('errors.undefined', ['status_code'=>$e->getCode(),'message'=>$e->getMessage(),
                'arquivo'=>$e->getFile(),
                'linha'=>$e->getLine()]));
        }
    }

    public function saque($contaId, $valor){
        try{
            DB::beginTransaction();

            $conta = $this->getDefaultRepository()->skipPresenter(true)->find($contaId);

            $conta->saldo -= (double)$valor;;
            if($conta->saldo < 0 )
                throw new \Exception('Esse valor não pode ser sacado');

            $conta->movimentacoes()->create([
                'valor'=>$valor,
                'tipo' => 1
            ]);
            $conta->save();
            DB::commit();
            return $conta;
        }catch (ModelNotFoundException | RepositoryException | \Exception $e){
            DB::rollBack();
            return self::responseError(self::$HTTP_CODE_NOT_FOUND, trans('errors.registre_not_found', ['status_code'=>$e->getCode(),'message'=>$e->getMessage(),
                'arquivo'=>$e->getFile(),
                'linha'=>$e->getLine()]));
        }
    }

    public function deposito($contaId, $valor){
        try{
            DB::beginTransaction();
            $conta = $this->getDefaultRepository()->skipPresenter(true)->find($contaId);
            $conta->saldo += (double)$valor;
            $conta->movimentacoes()->create([
                'valor'=>$valor,
                'tipo' => 0
            ]);
            $conta->save();
            DB::commit();
            return $conta;
        }catch (ModelNotFoundException | RepositoryException | \Exception $e){
            DB::rollBack();
            return self::responseError(self::$HTTP_CODE_NOT_FOUND, trans('errors.registre_not_found', ['status_code'=>$e->getCode(),'message'=>$e->getMessage(),
                'arquivo'=>$e->getFile(),
                'linha'=>$e->getLine()]));
        }
    }


}
