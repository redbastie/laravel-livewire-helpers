# Laravel Livewire Helpers

A few useful helpers for Laravel Livewire.

## Installation

Install via composer:

    composer require redbastie/laravel-livewire-helpers

## WithData

This trait allows you to use a `$data` array property inside your component so that you don't need to create a separate property for every single form input.

Modeling data:

    <input type="email" wire:model.defer="data.email">
    @error('email')<p class="text-red-600">{{ $message }}</p>@enderror

Validating data:

    $this->validateData([
        'email' => ['required', 'email'],
    ]);

Getting data (null safe, uses dot notation for nested arrays):

    $this->data('email');
