<div class="row">
    <div class="col-lg-6">
        <table class="table">
            <thead>
                <th>Nome</th>
                <th>CPF</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php 
                    foreach ($arrPessoas as $pessoa) {
                        if($pessoa != null){
                ?>
                            <tr>
                                <td><?=$pessoa->nome?></td>
                                <td><?=$pessoa->cpf?></td>
                                <td>
                                    <a href="index.php?controller=principal&action=detalhes&id=<?=$pessoa->id?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="index.php?controller=principal&action=deletar&id=<?=$pessoa->id?>"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                            </tr>
                <?php
                        }
                    }
                 ?>
            </tbody>
         </table>       
    </div>
</div>