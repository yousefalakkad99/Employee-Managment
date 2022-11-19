<?php

namespace App\Trait;




trait imageTrait
{
protected function save_image($photo,$folder)
{
    $file_extension=$photo->getClientOriginalExtension();
    $file_name=$photo->getClientOriginalName();
    //$file_name  = time() .'-'.$photo->getClientOriginalName().'.' . $photo->getClientOriginalExtension();
    $path=$folder;
    $photo->move($path,$file_name);
    return $file_name;
}





}
