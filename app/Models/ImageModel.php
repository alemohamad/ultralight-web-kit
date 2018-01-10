<?php namespace Models;

use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class ImageModel extends BaseModel {

  public function imageUrl($field_name) {
    return getUploadUrl() . $this->{$field_name};
  }

  public function clearImage($field_name) {
    if (!empty($this->{$field_name})) {
      $image_route = getUploadFolder() . $this->{$field_name};
      if (file_exists($image_route)) {
        unlink($image_route);
      }
    }
  }

  public function processFile($file_field, $temp_file, $data = []) {
    $image_name = $this->{$file_field};
    if ($temp_file['size'] > 0) {
      $this->clearImage($file_field);
      $image_name = $this->getNewImageNameBy($temp_file['name']);
      $image = Image::make($temp_file['tmp_name']);
      $image->fit($data['width'], $data['height']);
      $image->save(getUploadFolder() . $image_name);
    }

    return $image_name;
  }

  public function getNewImageNameBy($name) {
    $name = str_replace(' ', '-', $name);
    return Carbon::now('America/Argentina/Buenos_Aires')->format('YmdHis') . '-' . $name;
  }

}
