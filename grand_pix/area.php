<div class="container-fluid mt-5" style="background-color: white; color: black;">
    <div class="row">
        <div class="col-md-1">
            <h2><strong>Entregas:</strong></h2>
        </div>
        <div class="col-md-9">

        </div>
        <div class="col-md-2 mt-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladdentrega">
                Pedir entrega
            </button>
        </div>
    </div>
    <div class="container-fluid text-center" style="background-color: #aaaaaa">
        <?php
        $retornotabela = listarId("foto, motoboy, inicio, previsao, valor", 'pedido', 'idusuario', $_SESSION['idusuario']);
        if ($retornotabela != 'Vazio') {
            ?>
            <table>
                <thead>
                    <tr>
                        <td>Pedido</td>
                        <td></td>
                    </tr>
                </thead>
                <?php
                $idpedido = 0;
                foreach ($retornotabela as $itemretorno) {
                    $idpedido += 1;
                    $foto = $itemretorno->foto;
                    $motoboy = $itemretorno->motoboy;
                    $inicio = $itemretorno->inicio;
                    $previsão = $itemretorno->previsão;
                    $valor = $itemretorno->valor;

                }
                ?>
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