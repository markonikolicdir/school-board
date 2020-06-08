<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="grades")
 */
class Grade
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     * @var string
     */
    protected $grade;

    /**
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param string $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Many Student have Many Grades.
     * @ORM\ManyToMany(targetEntity="Student", inversedBy="grades")
     * @ORM\JoinTable(name="student_grade")
     */
    private $students;

    /**
     * @param Student $student
     * @return $this
     */
    public function addStudents(Student $student)
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
        }

        return $this;
    }
}