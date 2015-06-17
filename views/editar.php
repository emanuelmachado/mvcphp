

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">Cadastro de Pessoa</div>
            <div class="panel-body">
                <form action="http://testes.dev/index.php?controller=principal&action=editar" method="post">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="txtNome" class="form-label">Nome</label>
                            <input type="text" name="txtNome" id="txtNome" class="form-control" value="<?=$data->nome?>" />
                        </div>
                        <div class="form-group">
                            <label for="pwdSenha" class="form-label">Senha</label>
                            <input type="password" name="pwdSenha" id="pwdSenha" class="form-control"   value="<?=$data->senha?>" />
                        </div>
                        <div class="form-group">
                            <label for="txtCPF" class="form-label">CPF</label>
                            <input type="text" name="txtCPF" id="txtCPF" class="form-control" placeholder="000.000.000-00"  value="<?=$data->cpf?>" />
                        </div>
                        <div class="form-group">
                            <label for="txtDataNascimento" class="form-label">Data de Nascimento</label>
                            <input type="text" name="txtDataNascimento" id="txtDataNascimento" class="form-control" placeholder="00/00/0000"  value="<?=$data->datanascimento?>" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="txtCidade" class="form-label">Cidade</label>
                            <input type="text" name="txtCidade" id="txtCidade" class="form-control"  value="<?=$data->cidade?>" />
                        </div>
                        <div class="form-group">
                            <label for="txtPai" class="form-label">Nome do Pai</label>
                            <input type="text" name="txtPai" id="txtPai" class="form-control"  value="<?=$data->pai?>" />
                        </div>
                        <div class="form-group">
                            <label for="txtMae" class="form-label">Nome da Mãe</label>
                            <input type="text" name="txtMae" id="txtMae" class="form-control"  value="<?=$data->mae?>" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="txtObservacoes" class="form-label">Observações</label>
                            <textarea name="txtObservacoes" id="txtObservacoes" class="form-control"><?=$data->observacoes?></textarea>
                        </div>        
                        <div class="form-group">
                            <input type="hidden" name="hId" value="<?=$data->id?>">
                            <input type="submit" value="Salvar" name="btnSalvar" class="btn btn-success pull-right" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php 
    if(isset($msg_retorno)){
?>
        <div class="alert alert-success" role="alert">
            <?php echo $msg_retorno; ?>
        </div>
<?php
    }
?>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $('#txtDataNascimento').mask('00/00/0000');
        $('#txtCPF').mask('000.000.000-00', {reverse: true});
    });
    
</script>

