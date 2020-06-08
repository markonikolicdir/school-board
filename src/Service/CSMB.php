<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 8.6.20.
 * Time: 22.48
 */

namespace App\Service;


use App\Entity\Student;

class CSMB implements schoolBoards
{
    private $student;

    /**
     * CSMB constructor.
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }
    public function pass()
    {
        return 'pass';
    }

    public function export(){
        return 'xml'
    }
}