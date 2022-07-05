<?php

namespace Modules\Menu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'menu_item_id' => $this->id,
        'menu_item_menu_id' => $this->menu_id,
        'menu_item_title_ru' => $this->title,
        'menu_item_title_uk' => $this->title_uk,
        'menu_item_path' => $this->path,
        'menu_item_icon' => $this->icon,
        'menu_item_parent_id' => $this->parent_id,
        'menu_item_status' => $this->status,
      ];
    }
}
