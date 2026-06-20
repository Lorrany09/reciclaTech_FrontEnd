<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nova Doação</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="stylesdonate.css">

</head>



<body>

<div class="container py-5">

    <h1 class="titulo-pagina">
        Fazer nova doação
    </h1>

    <div class="cartao-doacao">

        <form>

            <div class="row">

                <div class="col-md-3">

                    <div class="area-foto">

                        <i class="bi bi-card-image icone-foto"></i>

                        <input
                            type="file"
                            id="selecionarFoto"
                            accept="image/*"
                            hidden>

                        <button
                            type="button"
                            class="btn botao-foto"
                            onclick="document.getElementById('selecionarFoto').click()">

                            Selecionar Fotos

                        </button>

                    </div>

                </div>

                <div class="col-md-9">

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label>Nome</label>
                            <input type="text" class="form-control campo">
                        </div>

                        <div class="col-md-6">
                            <label>Tipo de aparelho</label>
                            <input type="text" class="form-control campo">
                        </div>

                        <div class="col-md-4">
                            <label>Marca</label>
                            <input type="text" class="form-control campo">
                        </div>

                        <div class="col-md-4">
                            <label>Modelo</label>
                            <input type="text" class="form-control campo">
                        </div>

                        <div class="col-md-4">
                            <label>Condição</label>

                            <select class="form-select campo">
                                <option>Novo</option>
                                <option>Seminovo</option>
                                <option>Desgastado</option>
                                <option>Quebrado</option>
                            </select>
                        </div>

                        <div class="col-12">

                            <label>Descrição</label>

                            <textarea
                                class="form-control campo descricao"
                                placeholder="Descreva o aparelho"></textarea>

                        </div>

                    </div>

                    <div class="area-botoes">

                        <button
                            type="reset"
                            class="btn botao-cancelar">
                            Cancelar
                        </button>

                        <button
                            type="submit"
                            class="btn botao-enviar">
                            Enviar
                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

</body>
</html>