<?php

require 'connect.php';

class hashs {

    private $pdo;

    public function __construct($pdo) {
    	$this->pdo = $pdo;
    }

    public function md5_hash_cadastred($email, $senha) {
			
		$sql = 'INSERT INTO md5 (email, senha) VALUES (:email, :senha)';
		$stmt = $this->pdo->prepare($sql);
		
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);
		
		return $stmt->execute();
    }

    public function sha1_hash_cadastred($email, $senha) {

		$sql = 'INSERT INTO sha1 (email, senha) VALUES (:email, :senha)';
		$stmt = $this->pdo->prepare($sql);
		
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);

		return $stmt->execute();

    }

    public function bcrypt_hash_cadastred($email, $senha) {

		$sql = 'INSERT INTO bcrypt (email, senha) VALUES (:email, :senha)';
		$stmt = $this->pdo->prepare($sql);
		
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);
		
		return $stmt->execute();

	}

	public function md5_hash_verify($email, $senha) {

		$sql = 'SELECT * FROM md5 WHERE email = :email AND senha = :senha';
		$stmt = $this->pdo->prepare($sql);

		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);

		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);

	}

    public function sha1_hash_verify($email, $senha) {

    	$sql = 'SELECT * FROM sha1 WHERE email = :email AND senha = :senha';
		$stmt = $this->pdo->prepare($sql);

		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);

		$stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

	}

	public function bcrypt_hash_verify($email, $senha) {

		$sql = 'SELECT * FROM bcrypt WHERE email = :email';
		$stmt = $this->pdo->prepare($sql);

		$stmt->bindParam(':email', $email);

		$stmt->execute();
        $query = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($query && password_verify($senha, $query['senha'])) {
        	return true;
        } else {
        	return false;
        }

	}

}

?>