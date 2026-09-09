<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos Concluintes</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!--
   Criar um arquivo PHP que conecte-se ao banco e exiba os alunos e suas notas em uma tabela HTML.
    Adicionar um cálculo da média das notas de cada aluno.
    Utilizar CSS para estilizar a página, deixando visualmente agradável. 
    Permitir busca por aluno: Criar um campo de pesquisa para filtrar por nome.
    Exibir ranking de alunos: Ordenar os alunos pela média das notas.
-->
    <!-- fazendo o css interno -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #7a067c78;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #f3e6e6;
            background-color: #6c0474;
            width: 30%;
            margin-left: 35%;
            padding: 10px;
            border-radius: 20px;

        }

        table {
            
            text-align: center;
            margin-left:5%;
            width: 90%;
            background-color: #f1edf1;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

        }

        table.ranking {
            width: 50%;
            background-color: #e7d8e7;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-left: 25%;

        }

        div {
            margin: 20px;
            text-align: center;
            font-size: 20px;
            background-color: #cfaed2;
            color: #6c0474;

        }

        td {
            background-color: #ffffff;
            text-align: center;
            border-radius: 2px;
        }
        td:hover {
            background-color: #e2bfdd;
            text-align: center;
            border-radius: 2px;
        }

        
        th {
    
            color: #f3e6e6;
            background-color: #6c0474;
            border: 1px solid #d2a6d0;
            border-radius: 2px;
        }

        h2 {
            border: 1px solid #d2a6d0;
            background-color: #6c0474;
            color: white;
            padding: 10px;
            width: 25%;
            margin-left: 37%;
            text-align: center;
            border-radius: 20px;
        }

        form {
            padding: 15px;
            margin-left: 5%;
        }
    </style>
</head>

<body>
    <h1>Alunos Concluintes </h1>

    
    <form method="GET" action="">
        <input type="text" name="filtro" placeholder="Pesquisar por nome"
            value="<?php echo htmlspecialchars($_GET['filtro'] ?? ''); ?>">
        <button type="submit">Pesquisar</button>
    </form>

    <!-- criando a tabela -->
    <table class="w3-hoverable">

        <!-- parte de cima da tabela-->
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Nota 4</th>
            <th>Média</th>


        </tr>


        <!-- inserindo as linhas -->
        <tr class="w3-teal">
           
            <?php

            $servername = "localhost";
            $username = "root";
            $password = "usbw";
            $dbname = "pwii";
            $conexao = new mysqli($servername, $username, $password, $dbname);


            if ($conexao->connect_error) {
                die("Erro na conexão: " . $conexao->connect_error);
            }

            $filtro = $_GET['filtro'] ?? '';
            $sql = "SELECT * FROM alunoconcluinte WHERE nome LIKE ?";


            $stmt = $conexao->prepare($sql);

            $termo = "%" . $filtro . "%";

            $stmt->bind_param("s", $termo);

            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {

                while ($linha = $resultado->fetch_assoc()) {
                    if ($resultado != null) {

                        $media = ($linha['nota1'] + $linha['nota2'] + $linha['nota3'] + $linha['nota4']) / 4;
                        $media = number_format($media, 1);
                        $media = "<span style='color: green;'>" . $media . "</span>";

                        echo '<tr>';
                        echo '<td>' . $linha['idalunoconcluinte'] . '</td>';
                        echo '<td>' . $linha['nome'] . '</td>';
                        echo '<td>' . $linha['nota1'] . '</td>';
                        echo '<td>' . $linha['nota2'] . '</td>';
                        echo '<td>' . $linha['nota3'] . '</td>';
                        echo '<td>' . $linha['nota4'] . '</td>';
                        echo '<td>' . $media . '</td>';
                        echo '</tr>';
                    }


                }

            } else {

                echo "<div>Nenhum aluno encontrado.</div>";

            }

            ?>
        </tr>
    </table>
    <br></br><br><br><br><br>
    <!--Ranking dos alunos com base na média das notas-->
    <h2>Ranking</h2>
    <table class=" ranking w3-hoverable">
        <tr>
            <th >Posição</th>
            <th >Nome</th>
            <th >Média</th>
        </tr>

        <tr class="w3-teal"></tr>
        <?php
        $ranking = "SELECT nome, (nota1 + nota2 + nota3 + nota4) / 4 AS media
             FROM alunoconcluinte  ORDER BY media DESC";

        $ranking_result = $conexao->query($ranking);

        $posicao = 1;

        foreach ($ranking_result as $n_posicao) {
            echo '<tr>';
            echo '<td >' . $posicao . '</td>';
            echo '<td>' . htmlspecialchars($n_posicao['nome']) . '</td>';
            echo '<td>' . number_format($n_posicao['media'], 1) . '</td>';
            echo '</tr>';
            $posicao++;
        }
        $conexao->close();
        ?>
        </tr>
    </table>


</body>

</html>