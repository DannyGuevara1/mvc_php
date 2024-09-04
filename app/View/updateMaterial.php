<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel="stylesheet" href="../../public/css/home.css">
    <link rel="stylesheet" href="../../public/css/table.css">
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
        <div class="form-container">
            <form action="/pdo/public/updateMaterial/<?php echo $material->idmateriales; ?>" method="POST">
                <label class="form__label" for="nombre">Nombre:
                    <input class="form__input" type="text" id="nombre" name="nombre"
                        value="<?php echo $material->nombre; ?>"
                     required>
                </label>
                <label class="form__label" for="cantidad">Cantidad:
                    <input class="form__input" type="number" id="cantidad" name="cantidad"
                        value="<?php echo $material->cantidad; ?>"
                     required>
                </label>
                <label class="form__label" for="idtipomaterial">Tipo de Material:
                    <select class="form__select" name="idtipomaterial" id="type" required>
                        <?php foreach ($typeMaterials as $typeMaterial) : ?>
                            <option value="<?php echo $typeMaterial->idtipomaterial; ?>"
                                <?php echo $material->idtipomaterial == $typeMaterial->idtipomaterial ? 'selected' : ''; ?>>
                                <?php echo $typeMaterial->nombre; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <label class="form__label" for="idaula">Aula:
                    <select class="form__select" name="idaula" id="classroom" required>
                        <?php foreach ($classrooms as $classroom) : ?>
                            <option value="<?php echo $classroom->idaula; ?>"
                                <?php echo $material->idaula == $classroom->idaula ? 'selected' : ''; ?>>
                                <?php echo $classroom->nombre; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <button type="submit" class="save form__button">Guardar</button>
            </form>
        </div>
    </main>
</body>

</html>
