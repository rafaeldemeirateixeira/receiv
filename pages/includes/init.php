<?php

session_start();

function myAutoload($className)
{
    $extension =  spl_autoload_extensions();
    $dirs[] = "../../classes/singleton/";
    $dirs[] = "../../classes/factory/";
    $dirs[] = "../../classes/factory/impl/";
    $dirs[] = "../../classes/service/";
    $dirs[] = "../../classes/service/impl/";
    $dirs[] = "../../classes/repository/";
    $dirs[] = "../../classes/repository/impl/";
    $dirs[] = "../../classes/model/";
    $dirs[] = "../../classes/mapper/";
    $dirs[] = "../../classes/mapper/impl/";
    $dirs[] = "../../classes/helper/";
    $dirs[] = "../../classes/helper/impl/";

    foreach ($dirs as $i => $value) {
        $file = $dirs[$i] . $className . $extension;
        if (file_exists($file)) {
            require_once $file;
        }
    }
}

spl_autoload_extensions(".class.php");
spl_autoload_register("myAutoload");

$connectionFactory = new ConnectionFactoryImpl();
$connection = $connectionFactory->get();

# Customer
$customerRowMapper = new CustomerRowMapperImpl();
$customerRepository = new CustomerRepositoryImpl($connection, $customerRowMapper);
$customerService = new CustomerServiceImpl($customerRepository);

# Debt
$debtsRowMapper = new DebtRowMapperImpl($customerRowMapper);
$debtRepository = new DebtRepositoryImpl($connection, $debtsRowMapper);
$debtService = new DebtServiceImpl($debtRepository);

# Message
$flashScopeMessageHelper = new FlashScopeMessageHelperImpl();
