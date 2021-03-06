<?php

namespace Redbastie\LaravelLivewireHelpers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

trait WithData
{
    public $data = [];

    protected function data($key)
    {
        return Arr::get($this->data, $key);
    }

    protected function validateData($rules = null, $messages = [], $attributes = [])
    {
        [$rules, $messages, $attributes] = $this->providedOrGlobalRulesMessagesAndAttributes($rules, $messages, $attributes);
        $validator = Validator::make($this->data, $rules, $messages, $attributes);
        $validatedData = $validator->validate();

        $this->resetErrorBag();

        return $validatedData;
    }
}
