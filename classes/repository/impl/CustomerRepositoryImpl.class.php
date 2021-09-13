<?php

class CustomerRepositoryImpl implements CrudRepository
{
    private $connection;

    private $customerRowMapper;

    const FIND_ALL = "
        SELECT
            id AS customer_id, name, nif_number, DATE_FORMAT(birth_date, '%d/%m/%Y') AS birth_date
        FROM customers
        ORDER BY name ASC
    ";

    const FIND_BY_ID = "
        SELECT
            id AS customer_id, name, nif_number, birth_date, address
        FROM customers
        WHERE id = ?
    ";

    const DELETE_BY_ID = "DELETE FROM customers WHERE id = ?";

    const UPDATE_BY_ID = "UPDATE customers SET name = ?, nif_number = ?, birth_date = ?, address = ? WHERE id = ?";

    const INSERT = "INSERT INTO customers(name, nif_number, birth_date, address) VALUES (?,?,?,?)";

    public function __construct($connection, $customerRowMapper)
    {
        $this->connection = $connection;
        $this->customerRowMapper = $customerRowMapper;
    }

    public function findAll()
    {
        $resultSet = $this->connection->query(self::FIND_ALL);
        while ($row = $resultSet->fetch(PDO::FETCH_OBJ)) {
            $customers[] = $this->customerRowMapper->map($row);
        }
        return $customers;
    }

    public function findById($id)
    {
        $resultSet = $this->connection->prepare(self::FIND_BY_ID);
        $resultSet->bindParam(1, $id);
        if ($resultSet->execute()) {
            while ($row = $resultSet->fetch(PDO::FETCH_OBJ)) {
                $customer = $this->customerRowMapper->map($row);
            }
        }
        return $customer;
    }

    public function deleteById($id)
    {
        $statment = $this->connection->prepare(self::DELETE_BY_ID);
        $statment->bindParam(1, $id);
        $statment->execute();
    }

    public function updateById($customer)
    {
        $statment = $this->connection->prepare(self::UPDATE_BY_ID);
        $statment->bindParam(1, $customer->getName());
        $statment->bindParam(2, $customer->getNifNumber());
        $statment->bindParam(3, $customer->getBirthdate());
        $statment->bindParam(4, $customer->getAddress());
        $statment->bindParam(5, $customer->getId());
        $statment->execute();
    }

    public function insert($customer)
    {
        $statment = $this->connection->prepare(self::INSERT);
        $statment->bindParam(1, $customer->getName());
        $statment->bindParam(2, $customer->getNifNumber());
        $statment->bindParam(3, $customer->getBirthdate());
        $statment->bindParam(4, $customer->getAddress());
        $statment->execute();
    }
}
