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
use Symfony\Component\HttpFoundation\Response;

use App\Service\CSM;


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
            $student->addGrades($grade);
        }

        $this->em->persist($student);
        $this->em->flush();
    }

    /**
     * @param $id
     */
    public function list()
    {
        $list = $this->em->getRepository(Student::class)
            ->findBy(
                array(),
                array('name' => 'ASC')
            );

        $response = new Response();
        $response->setContent(json_encode([
            'data' => $this->studentData($list),
        ]));
        $response->headers->set('Content-Type', 'application/json');
        $response->send();
    }

    private function studentData($list){
        $data = [];
        foreach ($list as $value){
            $temp = [];
            $temp['name'] =$value->getName();
            $temp['id'] =$value->getId();
            $data[] = $temp;
        }
        return $data;
    }

    /**
     * @param $id
     */
    public function pass($id)
    {
        $student = $this->em->getRepository(Student::class)->findOneBy(array(
            'id' => $id));

//        var_dump($student->getGrades());
//        var_dump(count($student->getGrades()));

//        foreach ($student->getGrades() as $value){
//            var_dump($value->getGrade());
//        }

        $csm = new CSM($student);
        $pass = $csm->pass();

        $response = new Response();
        $response->setContent(json_encode([
            'pass' => $pass,
        ]));
        $response->headers->set('Content-Type', 'application/json');
        $response->send();
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