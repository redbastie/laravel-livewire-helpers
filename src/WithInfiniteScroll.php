<?php

namespace Redbastie\LaravelLivewireHelpers;

trait WithInfiniteScroll
{
    public $perPage = 15;

    public function getListeners()
    {
        return ['$refresh', 'infiniteScrolling'];
    }

    public function infiniteScroll()
    {
        return $this->query()->count() > $this->perPage;
    }

    public function infiniteScrolling()
    {
        $this->perPage += 15;
        $this->emit('infiniteScrolled');
    }
}
