<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID Muestra</th>
                <th>Empresa</th>
                <th>Especie</th>
                <th>Poder Germinativo</th>
                <th>Pureza</th>
                <th>Materiales Inertes</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($muestras as $m): ?>
                    <tr>
                    <td><?= h($m['id']) ?></td>
                    <td><?= h($m['empresa']) ?></td>
                    <td><?= h($m['especie']) ?></td>
                    <td><?= h($m['poder_germinativo']) ?></td>
                    <td><?= h($m['pureza']) ?></td>
                    <td><?= h($m['materiales_inertes']) ?></td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>
