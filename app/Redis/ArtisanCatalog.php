<?php

namespace App\Redis;

class ArtisanCatalog implements Catalog
{
  public function __construct(array $artisan) {
    dd($artisan);
    $this->id = $artisan['id'], 
    $this->category = $artisan['category'],
    $this->artisan_name = $artisan['artisan_name'],
    $this->sculpt_name = $artisan['sculpt_name'],
    $this->colorway_name = $artisan['colorway_name'],
    $this->keycap_archivist_id = $artisan['keycap_archivist_id'],
    $this->keycap_archivist_img = $artisan['keycap_archivist_img'],
    $this->keycap_archivist_is_cover = $artisan['keycap_archivist_is_cover'],
    $this->artisan_instagram = $artisan['artisan_instagram'],
    $this->instagram = $artisan['instagram'],
    $this->website = $artisan['website'],
    $this->discord = $artisan['discord'],
    $this->search_string = $artisan['search_string'],
    $this->title = $artisan['title']
  }
}
