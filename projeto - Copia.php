


<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$bancoDados = "doadores";

$conexao = mysqli_connect($host, $usuario, $senha, $bancoDados);

if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $numero = $_POST["numero"];
    $tipo_sangue = isset($_POST["tipo-sangue"]) ? mysqli_real_escape_string($conexao, $_POST["tipo-sangue"]) : '';

    $consulta = "INSERT INTO doadores_info (nome, cpf, numero, tipo_sangue) VALUES ('$nome', '$cpf', '$numero', '$tipo_sangue')";

    $resultado = mysqli_query($conexao, $consulta);

    if (!$resultado) {
        die("Erro na inserção de registro: " . mysqli_error($conexao));
    }

    echo "Registro inserido com sucesso!";
}

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        body {
            background-color: #e42f89eb;
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: white;
            border-radius: 14px;
            margin: 14px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.5);
        }

        .header {
            background: linear-gradient(120deg, #ca079d 0%, #fb00af 100%);
            padding: 24px;
            text-align: center;
            color: black;
        }

        .form {
            padding: 18px;
        }

        .form-content {
            margin-bottom: 20px;
            position: relative;
        }

        .form-content label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .form-content input {
            display: block;
            width: 100%;
            border-radius: 8px;
            padding: 10px;
            margin-top: 8px;
            border: 2px solid #dfdfdf;
            box-shadow: none;
        }

        .form-content a {
            position: absolute;
            bottom: -20px;
            left: 0;
            color: red;
            visibility: hidden;
        }

        .form button {
            background-color: #e205a7;
            color: #ffffff;
            width: 100%;
            border-radius: 14px;
            padding: 12px;
            border: 0;
            font-size: 16px;
            cursor: pointer;
            margin-top: 14px;
        }

        .form-content.error input {
            border-color: red;
        }

        .form-content.error a {
            visibility: visible;
        }
    </style>

    <script>
        const form = document.getElementById("form");
        const username = document.getElementById("username");
        const cpf = document.getElementById("cpf");
        const numero = document.getElementById("numero");
        const tiposangue = document.getElementById("tipo-sangue")

        form.addEventListener("submit", (Event) => {
            Event.preventDefault();

            checkinputUsername();
            checkinputCpf();
            checkinputNumero();
        })

        function checkinputUsername() {
            const usernameValue = username.value;

            if (usernameValue === "") {
                errorInput(username, "Campo obrigatório")
            } else {
                const formItem = username.parentElement;
                formItem.className = "form-content"
            }
        }

        function checkinputCpf() {
            const cpfValue = cpf.value;

            if (cpfValue === "") {
                errorInput(cpf, "Campo obrigatório")
            } else {
                const formItem = cpf.parentElement;
                formItem.className = "form-content"
            }
        }

        function checkinputNumero() {
            const numeroValue = numero.value;

            if (numeroValue === "") {
                errorInput(numero

, "Campo obrigatório")
            } else {
                const formItem = numero.parentElement;
                formItem.className = "form-content"
            }
        }

        function errorInput(input, message) {
            const formItem = input.parentElement;
            const textMessage = formItem.querySelector("a")
            textMessage.innerText = message;
            formItem.className = "form-content error"
        }
    </script>

</head>
<body>
    <div class="container">
        <section class="header">
            <h2>Novo doador</h2>
        </section>

        <form id="form" class="form" method="post" action="">
            <div class="form-content">
                <label for="username">Nome do doador(a)</label>
                <input type="text" id="username" name="nome" placeholder="Digite o nome do doador(a)" required />
                <a> msg de erro </a>
            </div>

            <div class="form-content">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" placeholder="Digite o seu CPF" required />
                <a> msg de erro </a>
            </div>

            <div class="form-content">
                <label for="numero">Telefone para contato</label>
                <input type="text" id="numero" name="numero" placeholder="Digite o seu Telefone" required />
                <a> msg de erro </a>
            </div>

            <div class="form-content">
                <label for="tipo-sangue">Tipo de Sangue:</label>
                <select id="tipo-sangue" name="tipo-sangue" required>
                    <option value="">...</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <a> msg de erro </a>
            </div>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
```

