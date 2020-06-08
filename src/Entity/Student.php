<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 5.6.20.
 * Time: 12.21
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="students")
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $schoolBoard;

    /**
     * @return mixed
     */
    public function getSchoolBoard()
    {
        return $this->schoolBoard;
    }

    /**
     * @param mixed $schoolBoard
     */
    public function setSchoolBoard($schoolBoard)
    {
        $this->schoolBoard = $schoolBoard;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Many Student have Many Grades.
     * @ORM\ManyToMany(targetEntity="Grade", mappedBy="students")
     */
    private $grades;

    /**
     * @param Grade $grade
     */
    public function addGrades(Grade $grade)
    {
        $grade->addStudents($this);
        $this->grades[] = $grade;
    }

    /**
     * Student constructor.
     */
    public function __construct()
    {
        $this->grades = new ArrayCollection();
    }
}