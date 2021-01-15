<?php

namespace Modules\Banco\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Banco\Service\ContaService;

class CheckTemSaldo implements Rule
{
    /**
     * @var ContaService
     */
    private $contaService;
    private $contaId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($contaId)
    {
        $this->contaService = App(ContaService::class);
        $this->contaId = $contaId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Saldo não é suficiente para o saque.';
    }
}
