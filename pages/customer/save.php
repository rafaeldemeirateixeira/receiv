<?php

require_once '../includes/init.php';

try {
    if (isset($_POST['name'])) {
        $validation = new ValidateDataHelperImpl();
        $customer = new Customer();

        $validation->checkString($_POST['name'], 'nome')
            ->checkString($_POST['nif_number'], 'CPF/CNPJ')
            ->checkString($_POST['birth_date'], 'data de nascimento')
            ->checkString($_POST['address'], 'endereço');

        $customer->setName($_POST['name']);
        $customer->setNifNumber($_POST['nif_number']);
        $customer->setBirthdate($_POST['birth_date']);
        $customer->setAddress($_POST['address']);

        if ($_POST['id']) {
            $customer->setId($_POST['id']);
            $customerService->updateById($customer);
            $flashScopeMessageHelper->setSuccess("Devedor {$customer->getName()} atualizado com sucesso");
        } else {
            $customerService->insert($customer);
            $flashScopeMessageHelper->setSuccess("Devedor {$customer->getName()} cadastrado com sucesso");
        }
    }
} catch (Exception $e) {
    $flashScopeMessageHelper->setError("Erro ao criar/modificar devedor: " . $e->getMessage());
}

header('Location: list.php');
