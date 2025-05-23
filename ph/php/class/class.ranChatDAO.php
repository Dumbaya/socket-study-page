<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/php/class/DB.php');
	include_once($_SERVER['DOCUMENT_ROOT'].'/php/class/class.commonDAO.php');

	class ranChatDAO extends commonDAO{
		private $insertQuery = "
			INSERT INTO ran_chat(chat_user) VALUES(:chat_user)
		";
		
		private $selectQuery = "
			SELECT chat_user FROM ran_chat WHERE chat_user != :chat_user AND status='waiting' ORDER BY RAND() LIMIT 1
		";
		private $chk_selectQuery = "
			SELECT * FROM ran_chat WHERE chat_user=:chat_user
		";
		private $cnt_selectQuery = "
			SELECT COUNT(*) FROM ran_chat WHERE chat_user != :chat_user AND status='waiting'
		";

		private $updateQuery = "
			UPDATE ran_chat SET status=:status WHERE chat_user=:chat_user
		";

		private $deleteQuery = "
			DELETE FROM ran_chat WHERE chat_user=:chat_user
		";

		function insertUser($obj){
			return $this->insert($this->insertQuery, $obj);
		}

		function selectUser($obj){
			return $this->select($this->selectQuery, $obj);
		}
		function chk_selectUser($obj){
			return $this->select($this->chk_selectQuery, $obj);
		}
		function cnt_selectUser($obj){
			return $this->select($this->cnt_selectQuery, $obj);
		}

		function updateUser($obj){
			return $this->update($this->updateQuery, $obj);
		}
		
		function deleteUser($obj){
			return $this->delete($this->deleteQuery, $obj);
		}
	}
?>