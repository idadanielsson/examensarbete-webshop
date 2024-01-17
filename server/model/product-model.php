<?php
    require_once 'classes/db.php';

    class ProductModel extends DB {
        protected $table = "products";

		public function getAllProducts() {
            $query = 'SELECT * FROM ' . $this->table . ';';
            $statement = $this->pdo->prepare($query);
            $statement->execute();

            return $statement->fetchAll();
        }

        //Hämtar en produkt baserat på id
        public function getProductById($productId) {
            $query = 'SELECT * FROM ' .  $this->table . ' WHERE id = :products_id';
            $statement = $this->pdo->prepare($query);
            $statement->execute(['products_id' => $productId]);
    
            return $statement->fetch();
        }

	}