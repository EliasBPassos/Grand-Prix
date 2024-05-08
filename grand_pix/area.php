<div class="container-fluid mt-4 mb-4 px-4" style="background-color: white; color: black;">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between">
            <h2><strong>Entregas:</strong></h2>
            <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#modaladdentrega">
                Fazer pedido
            </button>
        </div>
    </div>
    <div class="container-fluid text-center mt-3">
        <?php
        $retornotabela = listarId("idmotoboy, inicio, previsao, valor", 'pedido', 'idusuario', $_SESSION['idusuario']);
        if ($retornotabela != 'Vazio') {
            ?>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <td style="width: 10%" >Pedido</td>
                        <td style="width: 40%">inicio</td>
                        <td style="width: 40%">previsao</td>
                        <td style="width: 10%">valor</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $idpedido = 0;
                    foreach ($retornotabela as $itemretorno) {
                        $idpedido += 1;
                        $inicio = $itemretorno->inicio;
                        $previsao = $itemretorno->previsao;
                        $valor = $itemretorno->valor;
                        ?>
                        <tr>
                            <td><?php echo $idpedido?></td>
                            <th><?php echo $inicio?></th>
                            <th><?php echo $previsao?></th>
                            <th><?php echo $valor?></th>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>

            </table>

            <?php
        } else {
            ?>

            <h3>Nenhum pedido feito :(</h3>
            <?php
        }
        ?>
    </div>
</div>