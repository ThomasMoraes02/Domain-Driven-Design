<?php 
namespace Alura\CleanArchitecture\src\Infra\Student;

use PDO;
use PDOException;
use Alura\CleanArchitecture\src\Domain\Cpf;
use Alura\CleanArchitecture\config\ConfigApp;
use Alura\CleanArchitecture\src\Domain\Student\Student;
use Alura\CleanArchitecture\src\Domain\Student\StudentNotFound;
use Alura\CleanArchitecture\src\Domain\Student\StudentRepository;

class StudentRepositorySqlite implements StudentRepository
{
        /**
     * @var PDO
     */
    private $connection;

    public function __construct()
    {
        try {
            $this->connection = ConfigApp::config()['INSTANCE_DB'];
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo PHP_EOL . "Error: " . $e->getMessage();
        }
    }

    public function addStudent(Student $student): void
    {
        $sql = "INSERT INTO students VALUEs (:cpf, :name, :email)";
        $stmt = $this->connection->prepare($sql);
        
        $stmt->bindValue("cpf", $student->getCpf());
        $stmt->bindValue("name", $student->getName());
        $stmt->bindValue("email", $student->getEmail());
        $stmt->execute();

        $sql = "INSERT INTO phones VALUES (:ddd, :number, :cpf_student)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue("cpf_student", $student->getCpf());

        /**
         * @var Phone $phone
         */
        foreach($student->phones() as $phone) {
            $stmt->bindValue("ddd", $phone->ddd());
            $stmt->bindValue("number", $phone->number());
            $stmt->execute();
        }
    }

    public function getStudentWithCpf(Cpf $cpf): Student
    {
        $sql = "SELECT cpf, name, email, ddd, number as number_phone FROM students
        LEFT JOIN phones ON phones.cpf_student = students.cpf WHERE students.cpf = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, (string) $cpf);
        $stmt->execute();

        $student_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($student_data) === 0) {
            throw new StudentNotFound($cpf);
        }

        return $this->mapStudent($student_data);
    }

    private function mapStudent($student_data)
    {
        $firstLine = $student_data[0];
        $student = Student::withCpfNameAndEmail($firstLine['cpf'], $firstLine['name'], $firstLine['email']);

        $phones = array_filter($student_data, function($line) {
            if(!is_null($line['ddd']) && !is_null($line['number_phone'])) {
                return $line;
            } 
        });

        foreach($phones as $phone) {
            $student->addPhone($phone['ddd'], $phone['number_phone']);
        }

        return $student;
    }

    public function getAll(): array
    {
        $sql = "SELECT cpf, name, email, ddd, number as number_phone FROM students
        LEFT JOIN phones ON phones.cpf_student = students.cpf";

        $stmt = $this->connection->query($sql);

        $list_students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $students = [];

        foreach($list_students as $student) {
            if(!array_key_exists($student['cpf'], $students)) {
                $students[$student['cpf']] = Student::withCpfNameAndEmail($student['cpf'], $student['name'], $student['email']);
            }

            if(!empty($student['ddd'] && !empty($student['number_phone']))) {
                $students[$student['cpf']]->addPhone($student['ddd'], $student['number_phone']);
            }
        }

        return array_values($students);
    }

    /**
     * @return  PDO
     */ 
    public function getConnection()
    {
        return $this->connection;
    }
}