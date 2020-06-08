<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 7.6.20.
 * Time: 09.34
 */

namespace App\Controller;


class TestController
{


    /**
     *
     */
    public function list()
    {
        echo 'List brate';
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        echo 'Show ' . $id;
    }
}