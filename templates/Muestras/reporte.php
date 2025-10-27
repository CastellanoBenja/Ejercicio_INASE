<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID Muestra</th>
                <th>Número de Precinto</th>
                <th>Empresa</th>
                <th>Especie</th>
                <th>Cantidad Semillas</th>
                <th>Poder Germinativo</th>
                <th>Pureza</th>
                <th>Materiales Inertes</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach ($muestras as $m): ?>
                    <tr>
                    <td><?= h($m['id']) ?></td>    
                    <td><?= h($m['numero_de_precinto']) ?></td>
                    <td><?= h($m['empresa']) ?></td>
                    <td><?= h($m['especie']) ?></td>
                    <td><?= h($m['cantidad_semillas']) ?></td>
                    <td><?= h($m['poder_germinativo']) ?></td>
                    <td><?= h($m['pureza']) ?></td>
                    <td><?= h($m['materiales_inertes']) ?></td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>
