<?php

namespace App\Student\Infrastructure;

use App\Shared\Service\ConnectPostgresDb;
use App\Student\Domain\Student;
use App\Student\Domain\StudentRepository;
use App\Student\Domain\ValueObject\Mail;
use App\Student\Domain\ValueObject\Name;
use App\Student\Domain\ValueObject\StudentId;
use PDO;

final class ServiceStudent implements StudentRepository{

	public function create(Student $student): void {
		$pdo = ConnectPostgresDb::getInstance()->getConnection();
		$sql = "INSERT INTO student (id, name, mail) VALUES (?,?,?)";
		$pdo->prepare($sql)->execute([$student->id()->value(), $student->name()->value(), $student->mail()->value()]);
	}
	
	public function search(string $id) {
		$pdo = ConnectPostgresDb::getInstance()->getConnection();
		$sql = "SELECT * FROM student WHERE id=?";
		$stmt=$pdo->prepare($sql);
		$stmt->execute(array($id)); 
		$user = $stmt->fetch();
		if($user != null){
			//return new Student(new StudentId($user['id']), new Name($user['name']), new Mail($user['mail']));
			return array(
				'id' => $user['id'],
				'name' => $user['name'],
				'mail' => $user['mail'],
			);
		}
        return null;
	}
	
	public function list(){
        $pdo = ConnectPostgresDb::getInstance()->getConnection();
		$sql = "SELECT * FROM student";
		$stmt=$pdo->prepare($sql);
		$stmt->execute();
		$users = $stmt->fetchAll(PDO::FETCH_FUNC, function (...$row) {
			return array(
				'id' => $row[0],
				'name' => $row[1],
				'mail' => $row[2],
			);
		});
        return $users;
	}
	
	public function delete(StudentId $id): void {
        $pdo = ConnectPostgresDb::getInstance()->getConnection();
		$sql = "DELETE FROM student WHERE id=?";
		$stmt= $pdo->prepare($sql);
		$stmt->execute([$id->value()]);		
	}

}