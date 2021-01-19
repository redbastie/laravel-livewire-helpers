# Laravel Livewire Helpers

A few useful helpers for Laravel & Livewire.

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

## WithInfiniteScroll

This trait implements infinite scrolling in your component. Useful for allowing the user to endlessly scroll through a list of queried models. This trait requires some setup.

First, require `infinite-scroll` in your `resources/app.js` file (and make sure to `npm run` it if not already `watch`ing):

    require('./bootstrap');
    require('../../vendor/redbastie/laravel-livewire-helpers/resources/js/infinite-scroll');

In your component, use `$this->query()->paginate($this->perPage)` for the model results and pass the `infiniteScroll` boolean to the view:

    public function render()
    {
        return view('livewire.vehicles', [
            'vehicles' => $this->query()->paginate($this->perPage),
            'infiniteScroll' => $this->infiniteScroll(),
        ]);
    }

Your component needs to implement a `query()` method, which returns a model builder query:

    public function query()
    {
        return Vehicle::query()->orderBy('id');
    }

Finally, include `infinite-scroll` at the bottom of your view:

    @include('laravel-livewire-helpers::infinite-scroll')
