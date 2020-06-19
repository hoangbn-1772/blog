<?php

class BaseController
{
    // The folder name contains view will be redered.
    protected $folder;

    /**
     * Display UI
     */
    public function render($file, $data = [])
    {
        // Path to view
        $viewPath = empty($this->folder) ? 'views' . '/'.$file . '.php' : 'views/' . $this->folder . '/'.$file . '.php';
        if (is_file($viewPath)) {
            ob_start();
            require_once $viewPath;
            $content = ob_get_clean();
            require_once './views/layouts/app.php';
        } else {
            header('Location: index.php');
        }
    }
}
