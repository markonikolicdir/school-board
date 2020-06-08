<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 8.6.20.
 * Time: 20.02
 */

namespace App\Controller;

use App\Entity\Grade;
use App\Entity\Student;
use Doctrine\ORM\EntityManager;


class StudentController
{

    protected $em ;

    /**
     * StudentController constructor.
     * @param EntityManager $em
     */
    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    /**
     *
     */
    public function save()
    {
        $student = new Student();

        $names = ['Marko', 'Zarko', 'Milos', 'Jelena', 'Maja'];
        $name =  $this->random($names);
        $student->setName($name);

        $schoolBoards = ['CSM', 'CSMB'];
        $schoolBoard = $this->random($schoolBoards);
        $student->setSchoolBoard($schoolBoard);

        foreach ($this->randomGrades() as $value){
            $grade = new Grade();
            $grade->setGrade($value);


            var_dump($grade);

//            $this->em->persist($grade);
//            $this->em->flush();
            $student->addGrades($grade);
        }


        $this->em->persist($student);
        $this->em->flush();
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        echo 'Show student by ' . $id;
    }

    private function random($array){

        $key = array_rand($array, 1);
        return $array[$key];
    }

    private function randomGrades(){

        $grades = [];
        for ($i=1; $i<=rand(1, 4); $i++){
            $grades[] = rand(5,10);
        }

        return $grades;
    }
}