<?php

namespace Cuttlefish\Blog;

use Cuttlefish\Controller;
use Cuttlefish\Html;

class ControllerError extends Controller
{
    public static string $name = 'error';
    public static string $contentPath = 'errors';

    /**
     * @return void
     */
    public function records(): void
    {
        $path = $this->getContentPath() . implode("/", $this->args) . '.' . $this->ext;
        $this->records = [ $path ];
    }

    /**
     * @return void
     */
    public function model(): void
    {
        $this->Model = new ModelPage($this->records);
    }

    /**
     * @return void
     */
    public function view(): void
    {
        parent::view();

        $this->View = new Html($this->Model->contents, array(
            'layout'     => 'layout.php',
            'controller' => self::$name,
            'model'      => $this->Model->name,
        ));
    }
}
