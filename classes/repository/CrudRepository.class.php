<?php

interface CrudRepository
{

    function findAll();

    function findById($id);

    function updateById($id);

    function insert($object);

    function deleteById($id);
}
