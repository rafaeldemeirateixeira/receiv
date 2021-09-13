<?php

class DebtServiceImpl implements CrudService
{
    private $debtRepository;

    public function __construct($debtRepository)
    {
        $this->debtRepository = $debtRepository;
    }

    public function findAll()
    {
        return $this->debtRepository->findAll();
    }

    public function findById($id)
    {
        return $this->debtRepository->findById($id);
    }

    public function updateById($debt)
    {
        return $this->debtRepository->updateById($debt);
    }

    public function insert($debt)
    {
        return $this->debtRepository->insert($debt);
    }

    public function deleteById($id)
    {
        return $this->debtRepository->deleteById($id);
    }
}
