<!-- Janela Nova Solicitaçao -->
<div class="modal fade" id="solicitacaoInterna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Solicitação Interna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form class="needs-validation" method="post" action="modals/solicitar_interno.php" enctype="multipart/form-data" novalidate>
        <!--ESCOLHAS PARA O TIPO E VALOR DO CERTIFICADO SELECIONADO-->
        <section class="d-flex py-2">          
            <div class="col-sm-12 mx-auto text-center">
            <label for="type-cpf" class="form-label">Tipo do Certificado</label>
            <select name="tipo-certificado" class="form-select" id="type-cpf" required>
                <option value="">Escolha o certificado</option>
                <option>E-CPF A1 Midia Digital 1 ano</option>
                <option>E-CPF A3 Cartao 1 ano</option>
                <option>E-CPF A3 Cartao 2 anos</option>
                <option>E-CPF A3 Cartao 3 anos</option>
              	<option>E-CPF A3 Token 1 ano</option>
                <option>E-CPF A3 Token 2 anos</option>
                <option>E-CPF A3 Token 3 anos</option>
                <option>E-CPF A3 Cartao + Leitora 1 ano</option>
                <option>E-CPF A3 Cartao + Leitora 2 anos</option>
                <option>E-CPF A3 Cartao + Leitora 3 anos</option>
                <option>E-CPF A3 sem midia 1 ano</option>
                <option>E-CPF A3 sem midia 2 anos</option>
                <option>E-CPF A3 sem midia 3 anos</option>
                <option>E-CNPJ A1 Midia Digital 1 ano</option>
                <option>E-CNPJ A3 Cartao 1 ano</option>
                <option>E-CNPJ A3 Cartao 2 anos</option>
                <option>E-CNPJ A3 Cartao 3 anos</option>
              	<option>E-CNPJ A3 Token 1 ano</option>
                <option>E-CNPJ A3 Token 2 anos</option>
                <option>E-CNPJ A3 Token 3 anos</option>
                <option>E-CNPJ A3 Cartao + Leitora 1 ano</option>
                <option>E-CNPJ A3 Cartao + Leitora 2 anos</option>
                <option>E-CNPJ A3 Cartao + Leitora 3 anos</option>
                <option>E-CNPJ A3 sem midia 1 ano</option>
                <option>E-CNPJ A3 sem midia 2 anos</option>
                <option>E-CNPJ A3 sem midia 3 anos</option>
              	<option>(Outro tipo) 1 ano</option>
            </select><div class="invalid-feedback">Selecione um tipo de certificado.</div>
            </div>
        </section>
        
        <section class="d-flex py-2">
            <div class="col-sm-12 mx-auto"><!--NOME DO CLIENTE-->
            <label for="nome-cliente" class="form-label">Nome Completo</label>
            <input name="nome" type="text" class="form-control" id="nome-cliente" required>
            <div class="invalid-feedback">Insira o nome do cliente.</div>
            </div>
        </section>
    
        <section class="d-flex py-2">
            <div class="col-sm-4 mx-auto"><!--TELEFONE DO CLIENTE-->
            <label for="endereco-cliente" class="form-label">Telefone</label>
            <input name="telefone" type="text" class="form-control" id="telefone-cliente" required>
            <div class="invalid-feedback">Insira o telefone do cliente.</div>
            </div>
        </section><hr class="my-4">
        <input class="w-100 btn btn-lg btn-primary" type="submit" name="btnSolicitar" value="Salvar">
        </form>
    </div>
    </div>
</div>
</div>