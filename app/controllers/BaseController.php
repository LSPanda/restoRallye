<?php

class BaseController extends Controller {

    public $perPage;

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout () {
        if (!is_null ( $this->layout ))
        {
            $this->layout = View::make ( $this->layout );
        }
    }

    public function getImages ($type, $id) {
        $imgDir = opendir ( public_path () . '/uploads/' . $type . '/' . $id . '/' ) or die( 'Erreur' );
        $imgNames = [ ];
        while ($entry = @readdir ( $imgDir ))
        {
            if ($entry != '.' && $entry != '..' && substr ( $entry, 0, 4 ) != 'main')
            {
                $imgNames[ ] = $entry;
            }
        }
        closedir ( $imgDir );

        return $imgNames;
    }

    public function getImageCouverture ($type, $id) {
        $imgDir = opendir ( public_path () . '/uploads/' . $type . '/' . $id . '/' ) or die( 'Erreur' );

        $imgName = false;
        while ($entry = @readdir ( $imgDir ))
        {
            if (substr ( $entry, 0, 4 ) == 'main')
            {
                $imgName = $entry;
                break;
            }
        }
        closedir ( $imgDir );

        return $imgName;
    }

    public function rmdir_r($path)
    {
        if (is_dir($path) === true)
        {
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file)
            {
                $this->rmdir_r(realpath($path) . '/' . $file);
            }

            return rmdir($path);
        }

        else if (is_file($path) === true)
        {
            return unlink($path);
        }

        return false;
    }

}
