<?php namespace App\Helpers;
use Str;

class Slug {
    public function setSlugAttribute ($value, $model) {
        $slug  = Str::slug ( $value );
        $slugs = $model->whereRaw ( "slug REGEXP '^{$slug}(-[0-9]*)?$'" );
        if ($slugs->count () === 0)
        {
            return $slug;
        }
        // get reverse order and get first
        $lastSlugNumber = intval ( str_replace ( $slug . '-',
            '',
            $slugs->orderBy ( 'slug', 'desc' )->first ()->slug ) );

        return $slug . '-' . ( $lastSlugNumber + 1 );
    }
}
