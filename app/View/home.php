<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../public/css/home.css">
    <link rel="stylesheet" href="../public/css/table.css">
    <script src="../public/js/modal.js" defer></script>
</head>

<body>
    <header>
        <nav id="menu">
            <div class="menu-item">
                <div class="menu-text">
                    <a href="/pdo/public/">Home</a>
                </div>
            </div>
            <div class="menu-item highlight">
                <div class="menu-text">
                    <a href="/pdo/public/about">Services</a>
                </div>
            </div>
            <div class="menu-item highlight">
                <div class="menu-text">
                    <a href="/pdo/contact">Support</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="table" id="customers_table">
            <section class="table__header">
                <h1>Asignaciones</h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data...">
                </div>
                <div class="export__file">
                    Create
                    <input data-id="abrir-modal" for="export-file" type="button" class="export__file-btn" title="Create" />
                    <dialog class="modal">
                        <h2>Formulario</h2>
                        <div class="form-container">
                            <form class="form__main" action="/pdo/public/createMaterial" method="POST">
                                <label class="form__label" for="nombre">Nombre:
                                    <input class="form__input" type="text" id="nombre" name="nombre" required>
                                </label>
                                <label class="form__label" for="cantidad">Cantidad:
                                    <input class="form__input" type="number" id="cantidad" name="cantidad" required>
                                </label>
                                <label class="form__label" for="date">Fecha:
                                    <input class="form__input" type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                                </label>

                                <label class="form__label" for="idtipomaterial">Tipo de Material:
                                    <select class="form__select" name="idtipomaterial" id="type" required>
                                        <?php foreach ($typeMaterials as $typeMaterial) : ?>
                                            <option value="<?php echo $typeMaterial->idtipomaterial; ?>">
                                                <?php echo $typeMaterial->nombre; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>

                                <label class="form__label" for="idaula">Aula:
                                    <select class="form__select" name="idaula" id="classroom" required>
                                        <?php foreach ($classrooms as $classroom) : ?>
                                            <option value="<?php echo $classroom->idaula; ?>">
                                                <?php echo $classroom->nombre; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>
                                <button data-id="cerrar-modal" class="close form__button">cerrar</button>
                                <button type="submit" class="save form__button">Guardar</button>
                            </form>
                        </div>
                    </dialog>
                </div>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Nombre <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Cantidad <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Tipo de Material <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Aula <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Fecha de adquisicion <span class="icon-arrow">&UpArrow;</span></th>
                            <th> Acciones <span class="icon-arrow">&UpArrow;</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $material): ?>
                            <tr>
                                <td><?php echo $material->idmateriales; ?></td>
                                <td><?php echo $material->nombre; ?></td>
                                <td><?php echo $material->cantidad; ?></td>
                                <td>
                                    <p class="status delivered">
                                        <?php echo $material->idtipomaterial; ?>
                                    </p>
                                </td>
                                <td>
                                    <p class="status shipped">
                                        <?php echo $material->idaula; ?>
                                    </p>
                                </td>
                                <td><?php echo $material->fechaadquisicion; ?></td>
                                <td class="action">
                                    <a href="/pdo/public/updateMaterialPage/<?php echo $material->idmateriales ?>" class="edit">Editar</a>
                                    <form action="/pdo/public/deleteMaterial/<?php echo $material->idmateriales ?>"
                                        method="POST"
                                        onsubmit="return confirm('¿Estás seguro de eliminar este material?')">
                                        <button type="submit" class="delete">Eliminar</button>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>

</body>

</html>
