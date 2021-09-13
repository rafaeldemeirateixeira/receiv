<?php

require_once('../includes/header.php');

$id = null;
$customer = null;

if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $customer = $customerService->findById($id);
}

?>
<section>
    <article>
        <form action="save.php" method="post">
            <div class="row">
                <div class= "col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="title">Nome</label>
                        <input class="form-control" type="text" id="name" name="name" value="<?= $customer ? $customer->getName() : '' ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class= "col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="title">CPF/CNPJ</label>
                        <input class="form-control" type="text" id="nif_number" name="nif_number" maxlength="14" value="<?= $customer ? $customer->getNifNumber() : '' ?>">
                    </div>
                </div>
                <div class= "col-sm-12 col-md-6 col-lg-6">
                    <label for="title">Data de Nascimento</label>
                    <input class="form-control" type="date" id="birth_date" name="birth_date" maxlength="8" value="<?= $customer ? $customer->getBirthDate() : '' ?>">
                </div>
            </div>

            <div class="row">
                <div class= "col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="title">Endereço</label>
                        <textarea id="address" name="address" class="form-control" rows="3"><?= $customer ? $customer->getAddress() : '' ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info form-control">Enviar</button>
            </div>
            <input type="hidden" name="id" id="id" value="<?= $customer ? $customer->getId() : '' ?>">
        </form> 
    </article>
</section>

<?php
require_once('../includes/footer.php');
