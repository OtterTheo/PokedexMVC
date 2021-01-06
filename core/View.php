<?php


class View
{
    private $file;

    /**
     * View constructor.
     *
     * @param string $controller
     * @param string $filename
     */
    public function __construct($controller = '', $filename ='')
    {
        $file = 'views/';

        if ($controller !== '') {
            $file .= $controller . '/';
        }

        $this->file = $file . $filename;


    }
    //retourne le chemin d'accés de la view
    public function getFile(){
        return $this->file;
    }
    /**
     * Create view
     *
     * @param array $data
     *
     * @throws Exception
     */
    public function createView($data = [])
    {
        $view = $this->generateFile($this->file, $data);

        echo $view;
    }

    /**
     * Generate view with data
     *
     * @param $file
     * @param $data
     *
     * @return false|string
     * @throws Exception
     */
    private function generateFile($file, $data)
    {
        if (file_exists($file)) {
            extract($data);

            ob_start();

            require $file;

            return ob_get_clean();
        }
        else {
            throw new Exception('Fichier ' . $file . ' introuvable');
        }
    }
}
