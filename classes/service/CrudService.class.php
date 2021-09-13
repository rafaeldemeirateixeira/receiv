<?php

interface CrudService
{

    function findAll();

    function findById($id);

    function updateById($object);

    function insert($object);

    function deleteById($id);
}
