<?php
require_once('../includes/header.php');

$id = null;
$debt = null;

if (isset($_GET['id'])) {
    $id = $_GET["id"];
    $debt = $debtService->findById($id);
}

$customers = $customerService->findAll();

?>
<section>
    <article>
        <form action="save.php" method="post">
            <div class="form-group">
                <label for="customer_id">Devedor</label>
                <select id="customer_id" name="customer_id" class="form-control">
                    <option value="">Selecione devedor ...</option>
                    <?php
                    foreach ($customers as $customer) {
                        ?>
                        <option <?php
                        if ($debt) {
                            echo $customer->getId() == $debt->getCustomer()->getId() ? "selected" : "" ;
                        } else {
                            echo "";
                        }
                        ?> value="<?= $customer->getId() ?>"><?= $customer->getName() ?></option>
                    <?php }  ?>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição</label>
                <textarea id="description" name="description" class="form-control" rows="3"><?= $debt ? $debt->getDescription() : '' ?></textarea>
            </div>
            <div class="form-group">
                <label for="title">Valor</label>
                <input class="form-control" type="float" id="amount" name="amount" value="<?= $debt ? $debt->getAmount() : '' ?>">
            </div>
            <div class="form-group">
                <label for="title">Data de Vencimento</label>
                <input class="form-control" type="date" id="due_date" name="due_date" value="<?= $debt ? $debt->getDueDate() : '' ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info form-control">Enviar</button>
            </div>
            <input type="hidden" name="id" id="id" value="<?= $debt ? $debt->getId() : '' ?>">
        </form> 
    
    </article>
</section>

<?php
require_once('../includes/footer.php');
