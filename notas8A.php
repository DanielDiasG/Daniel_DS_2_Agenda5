<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas 8º Ano A</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!--
    A Diretora da escola ficou encantada com o resultado do trabalho de Joseph e pediu que desenvolvesse uma página para exibir as notas do 8º Ano A. 
    A equipe de banco de dados enviou um array bidimensional com os dados da turma.

    Tarefa:
        Crie um arquivo PHP chamado notas8A.php.
        Crie um array bidimensional contendo pelo menos 5 alunos fictícios e suas notas dos 4 bimestres.
        Os nomes e notas devem ser criados por você (não copie os do exemplo da aula).

-->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
            width: 80%;
            margin: 20px auto;
            background-color: #d2a6d0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

        }


        td {
            padding: 12px;
            text-align: center;
            border: 1px solid #d2a6d0;
            border-radius: 2px;
        }

        th {
            border: 1px solid #d2a6d0;
            background-color: #6c0474;
            color: white;
        }
    </style>
</head>

<body>
    <h1>8º ANO A</h1>
    <table class="w3-table-all w3-hoverable">
        <tr>
            <th class='w3-center'>Aluno</th>
            <th class='w3-center'>Bimestre 1</th>
            <th class='w3-center'>Bimestre 2</th>
            <th class='w3-center'>Bimestre 3</th>
            <th class='w3-center'>Bimestre 4</th>
            <th class='w3-center'>Média</th>
        </tr>

        <tr class="w3-teal">
            <?php
            $NotasOitavoAnoA = array(
                array('aluno' => 'João Pedro', 'bim1' => '8', 'bim2' => '8.5', 'bim3' => '9.5', 'bim4' => '10'),
                array('aluno' => 'Maria Silva', 'bim1' => '7.5', 'bim2' => '8', 'bim3' => '8.5', 'bim4' => '9'),
                array('aluno' => 'Ronaldo Alves', 'bim1' => '4', 'bim2' => '5', 'bim3' => '3.5', 'bim4' => '5'),
                array('aluno' => 'Ana Paula', 'bim1' => '8.5', 'bim2' => '9', 'bim3' => '8', 'bim4' => '10'),
                array('aluno' => 'Karoline Ribeiro', 'bim1' => '6', 'bim2' => '5.5', 'bim3' => '4.5', 'bim4' => '7'),
                array('aluno' => 'Guilherme Santos', 'bim1' => '4', 'bim2' => '2', 'bim3' => '6', 'bim4' => '5'),
                array('aluno' => 'Leonardo Costa', 'bim1' => '6', 'bim2' => '7.5', 'bim3' => '5', 'bim4' => '8'),
                array('aluno' => 'Carlos Silva', 'bim1' => '7', 'bim2' => '8', 'bim3' => '8.5', 'bim4' => '9')

            );

            foreach ($NotasOitavoAnoA as $aluno) {
                $media = ($aluno['bim1'] + $aluno['bim2'] + $aluno['bim3'] + $aluno['bim4']) / 4;
                if ($media >= 6) {
                    $media = "<span style='color: green;'>" . number_format($media, 2) . "</span>";
                } else {
                    $media = "<span style='color: red;'>" . number_format($media, 2) . "</span>";
                }
                echo "<tr>";
                echo "<td class='w3-center' >" . $aluno['aluno'] . "</td>";
                echo "<td class='w3-center' >" . $aluno['bim1'] . "</td>";
                echo "<td class='w3-center' >" . $aluno['bim2'] . "</td>";
                echo "<td class='w3-center' >" . $aluno['bim3'] . "</td>";
                echo "<td class='w3-center' >" . $aluno['bim4'] . "</td>";
                echo "<td class='w3-center' >" . $media . "</td>";
                echo "</tr>";
            }
            ?>
        </tr>

    </table>