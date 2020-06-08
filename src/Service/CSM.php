<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 8.6.20.
 * Time: 22.03
 */

namespace App\Service;


use App\Entity\Student;

class CSM implements schoolBoards
{

    private $student;

    /**
     * CSM constructor.
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * @return string
     */
    public function pass()
    {
        $sum = 0;

        foreach ($this->student->getGrades() as $value){
            $sum += $value->getGrade();
        }
        $average =  $sum/count($this->student->getGrades());

        return $average >= 7 ? 'Pass' : 'Fail';
    }

    /**
     * @return false|string
     */
    public function export(){

        $grades = array_filter($this->student->getGrades());
        $average = array_sum($grades)/count($grades);

        $export = [
            'id' => $this->student->getId(),
            'name' => $this->student->getName(),
            'grades' => $this->student->getGrades(),
            'average' => $average,
            'pass' => $this->pass()
        ];
        return json_encode($export);
    }
}