<?php

require_once '../includes/init.php';

try {
    if (isset($_GET['id'])) {
        $debt = $debtService->findById($_GET['id']);
        if ($debt) {
            $debtService->deleteById($_GET['id']);
            $flashScopeMessageHelper->setSuccess("Débito #" . $debt->getId() . " deletado com sucesso");
        } else {
            $flashScopeMessageHelper->setError("Não foi encontrado débito para deletar");
        }
    }
} catch (Exception $e) {
    $flashScopeMessageHelper->setError("Erro ao deletar débito " . $e->getMessage());
}

header('Location: list.php');
