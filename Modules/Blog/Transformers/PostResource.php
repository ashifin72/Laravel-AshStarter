<?php

namespace Modules\Blog\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
        'item_id' => $this->id,
        'item_cat_id' => $this->category_id,
        'item_title_ru' => $this->title_ru,
        'item_title_uk' => $this->title_uk,
        'item_category_ru' => $this->category_ru,
        'item_category_uk' => $this->category_uk,
        'item_slug' => $this->slug,
        'item_img' => $this->img,
        'item_desc_ru' => $this->description_ru,
        'item_desc_uk' => $this->description_uk,
        'item_status' => $this->status,
        'item_content_uk' => $this->content_uk,
        'item_content_ru' => $this->content_ru,
        'item_meta_desc' => $this->meta_desc,
        'item_youtube' => $this->youtube,
        'item_github' => $this->github,
        'item_video' => $this->video,
        'item_file_sharing' => $this->file_sharing,
        'item_title_soc' => $this->title_soc,
        'item_created_at' => $this->created_at,
        'item_updated_at' => $this->updated_at,
      ];
    }
}
