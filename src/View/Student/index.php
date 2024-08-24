<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos - School Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <?php include dirname(__DIR__) . '/Elements/menu.php';  ?>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-end justify-content-between">
                <h2 class="mt-3">Alunos</h2>
                <a class="btn btn-primary" href="/alunos/adicionar">Adicionar</a>
            </div>
            <div class="col-12">
                <hr>
                <!-- Exibir mensagens rápidas -->
                <?php include dirname(__DIR__) . '/Elements/flash_message.php';  ?>

                <table class="table" id="students">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <th scope="row"><?= $student['id'] ?></th>
                                <td><?= $student['name'] ?></td>
                                <td><?= $student['birth_date'] ?></td>
                                <td><?= $student['username'] ?></td>
                                <td><a href="/alunos/editar?id=<?= $student['id'] ?>">Editar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#students', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
            },
            'order':[
                [1, 'asc']
            ]
        });
    </script>
</body>

</html>