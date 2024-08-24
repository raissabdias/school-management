<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar aluno - School Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include dirname(__DIR__) . '/Elements/menu.php';  ?>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-end justify-content-between">
                <h2 class="mt-3">Editar aluno</h2>
                <a class="btn btn-primary" href="/alunos">Voltar</a>
            </div>
            <div class="col-12">
                <hr>
                <!-- Exibir erros do formulário -->
                <?php include dirname(__DIR__) . '/Elements/errors.php';  ?>
                
                <!-- Formulário -->
                <form class="mt-5" method="POST">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Informe seu nome completo" value="<?= $student['name'] ?? null ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="birth_date" class="col-sm-2 col-form-label">Data de nascimento</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= $student['birth_date'] ?? null ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Usuário</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Informe uma credencial para acesso" value="<?= $student['username'] ?? null ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 mt-5 text-center">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>