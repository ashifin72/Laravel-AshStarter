<?php

namespace Modules\Menu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
        'menu_id' => $this->id,
        'menu_name' => $this->name,
        'menu_status' => $this->status,
      ];
    }

  // (Optional) Additional code is attached to the response
  public function with($request)
  {
    return [
      'version' => "1.0.0",
      'author_url' => "https://ashifin.com"
    ];
  }
}
