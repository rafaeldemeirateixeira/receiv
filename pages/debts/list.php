<?php
require_once('../includes/header.php');

$debts = $debtService->findAll();

?>
<section>
    <article>
    <?php
    if ($debts != null) {
        ?>
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Vencimento</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($debts as $debt) {
                ?>
                <tr>
                    <th><?= $debt->getId() ?></th>
                    <td><?= $debt->getCustomer()->getName() ?></td>
                    <td><?= $debt->getCustomer()->getNifNumber() ?></td>
                    <td>R$ <?= $debt->getAmount() ?></td>
                    <td><?= $debt->getDueDate() ?></td>
                    <td><a href="form.php?id=<?= $debt->getId() ?>">editar</a></td>
                    <td><a href="delete.php?id=<?= $debt->getId() ?>">deletar</a></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    <?php
    } else {
    ?>
    <h2 class="alert alert-danger">Não foram econtrados livros cadastrados</h2>
    <?php
    }
    ?>
    </article>
</section>

<?php
require_once('../includes/footer.php');
