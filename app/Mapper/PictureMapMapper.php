<?php

namespace App\Mapper;

use Illuminate\Support\Collection;

class PictureMapMapper
{
    protected $items;

    public function __construct(Collection $collection)
    {
        $this->items = $collection;

        $this->items = $this->items->map(function ($item, $key) {

            return [
                'id' => $item->id,
                'lat' => (float) $item->lat,
                'lng' => (float) $item->lng,
                'thumbnail' => $item->getThumbnail('thumb-50-x')->getUrl(),
                'url' => $item->getThumbnail('thumb-550-x')->getUrl(),
                'caption' => $item->id,
            ];
        });
    }

    public function getItems()
    {
        return $this->items;
    }

    public function __toString()
    {
        return $this->getItems()->toJson();
    }

    public function __toArray()
    {
        return $this->getItems();
    }
}
