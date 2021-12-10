<?php
include '../../routes/conexao.php';
$sqlCidade = "SELECT id_cidade, nm_cidade FROM cidade";

$resultadoCidade = mysqli_query($conexao, $sqlCidade);
$buscaCidade = mysqli_query($conexao, $sqlCidade);
$sqlRuas = "SELECT rua.id_rua, rua.nm_rua, rua.id_cidade, cidade.nm_cidade FROM rua, cidade WHERE rua.id_cidade = cidade.id_cidade";
$resultadoRuas = mysqli_query($conexao, $sqlRuas);
//$resultado = mysqli_query($conexao, $sql);
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Free Bulma template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>
    <div class="container" style="margin-top:40px ;">
        <div class="columns">
            <div class="column is-3 ">
                <aside class="menu is-hidden-mobile">
                    <p class="menu-label">
                        Administrador
                    </p>
                    <ul class="menu-list">
                        <li><a href="../vagas/index.php">Vagas</a></li>
                        <li><a href="../ruas/index.php">Ruas</a></li>
                        <li><a href="../cidades/index.php">Cidades</a></li>
                    </ul>
                    <p class="menu-label">
                        Usuario
                    </p>
                    <ul class="menu-list">
                        <li><a class="is-active" href="index.php">Vagas</a></li>
                    </ul>

                </aside>
            </div>
            <table class="table is-fullwidth">
                <thead style="font-size: 18;">
                    <th>ID</th>
                    <th>Cidade</th>
                    <th>Rua</th>
                    <th>Vaga</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                    while ($linha = mysqli_fetch_array($resultadoRuas)) {
                        echo "<tr>";
                        echo "<td>$linha[id_rua]</td>";
                        echo "<td>$linha[nm_rua]</td>";
                        echo "<td>$linha[nm_cidade]</td>";
                        echo "<td>$linha[id_cidade]</td>";
                    ?>
                        <td class="level-right"><a class="button is-small is-primary" href="#">Liberada</a></td>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="modal" id="modal">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <header class="modal-card-head">
                        <p id="titulo-modal" class="modal-card-title">Cadastro de vagas</p>
                        <button class="delete" aria-label="close" id="fechar-modal" onclick="fecharModal()"></button>
                    </header>
                    <section class="modal-card-body" style="padding: 0;">
                        <form method="post" action="../../routes/insertRuas.php">
                            <div class="column is-9">
                                <label class="label" for="select">Estado</label>
                                <div class="select" style="margin-bottom: 30px;" id="select">
                                    <select name="id_cidade">
                                        <?php
                                        while ($linha = mysqli_fetch_array($resultadoCidade)) {
                                            echo "<option value=$linha[id_cidade]>";
                                            echo $linha['nm_cidade'];
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label class="label" for="select">Cidade</label>
                                <div class="select" style="margin-bottom: 30px;" id="select">
                                    <select name="id_cidade">
                                        <?php
                                        while ($linha = mysqli_fetch_array($resultadoCidade)) {
                                            echo "<option value=$linha[id_cidade]>";
                                            echo $linha['nm_cidade'];
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label class="label" for="select">Rua</label>
                                <div class="select" style="margin-bottom: 30px;" id="select">
                                    <select name="id_cidade">
                                        <?php
                                        while ($linha = mysqli_fetch_array($resultadoCidade)) {
                                            echo "<option value=$linha[id_cidade]>";
                                            echo $linha['nm_cidade'];
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="field">
                                    <label class="label">CPF</label>
                                    <div class="control">
                                        <div>
                                            <input class="input" type="text" style="width: 500px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <footer class="modal-card-foot">
                                <button class="button is-success" type="submit" value="Cadastrar">Cadastrar</button>
                                <button class="button" id="fechar-modal-cancelar" onclick="fecharModal()">Cancel</button>
                            </footer>
                        </form>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <script>
        function abrirModal() {
            return document.getElementById('modal').classList.add('is-active')
        }

        var fechar = document.getElementById('fechar-modal').addEventListener('mouseup', () => {
            var elemento2 = document.getElementById('modal').classList.remove('is-active')
        })

        var fecharmodal = document.getElementById('fechar-modal-cancelar').addEventListener('mouseup', () => {
            var elemento2 = document.getElementById('modal').classList.remove('is-active')
        })
    </script>
    <script async type="text/javascript" src="../js/bulma.js"></script>
    <script src="https://kit.fontawesome.com/44cff19db5.js" crossorigin="anonymous"></script>
</body>

</html>