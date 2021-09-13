<?php
require_once('../includes/header.php');

$customers = $customerService->findAll();
?>
<section>
    <article>
    <?php
    if ($customers != null) {
        ?>
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Data Nascimento</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($customers as $customer) {
                ?>
                <tr>
                    <th ><?= $customer->getId() ?></th>
                    <td><?= $customer->getName() ?></td>
                    <td><?= $customer->getNifNumber() ?></td>
                    <td><?= $customer->getBirthDate() ?></td>
                    <td><a href="form.php?id=<?= $customer->getId() ?>">editar</a></td>
                    <td><a href="delete.php?id=<?= $customer->getId() ?>">deletar</a></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    <?php
    } else {
        ?>
    <h2 class="alert alert-danger">Não foram econtrados devedores cadastrados</h2>
    <?php
    }
    ?>
    </article>
</section>

<?php
require_once('../includes/footer.php');
