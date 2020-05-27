<?php
namespace Bageur\Artikel\Processors;

class AvatarProcessor {

    public static function get( $name, $image = null, $folder = "bageur", $type = "initials") {
        if (empty($image)) {
            if (!empty($name)) {
                return 'https://avatars.dicebear.com/v2/'.$type.'/' . preg_replace('/[^a-z0-9 _.-]+/i', '', $name) . '.svg?options[radius]=50';
            }
            return null;
        }
        return url('artikel/'.$image);
    }
}
