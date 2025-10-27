<div class="resultados index content">
    <div class="d-flex justify-content-end align-items-center mb-3" style="gap: 5px;">
        <div class="dropdown float-right" style="margin-right: 5px;">
            <button class="dropbtn">Opciones ▼</button>
            <div class="dropdown-content">
                <?= $this->Html->link('Ver Listado Muestras', ['controller' => 'Muestras', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
                <?= $this->Html->link('Ver Listado Resultados', ['controller' => 'Resultados', 'action' => 'index'], ['class' => 'dropdown-item']) ?>
            </div>
        </div>
        <button id="btnFiltrar" class="button float-right" style="margin-right: 5px;">Filtrar</button>
    </div>
    <div id="modalFiltrar" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Filtrar Resultados</h3>
            <?= $this->Form->create(null, ['type' => 'get']) ?>
                <?= $this->Form->control('especie', [
                    'label' => 'Especie',
                    'options' => $especies ?? [],
                    'empty' => 'Todas'
                ]) ?>
                <?= $this->Form->button('Aplicar', ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnFiltrar = document.getElementById('btnFiltrar');
        const modalFiltrar = document.getElementById('modalFiltrar');
        const closeBtn = modalFiltrar.querySelector('.close');

        btnFiltrar.addEventListener('click', () => {
            modalFiltrar.style.display = 'block';
        });

        closeBtn.addEventListener('click', () => {
            modalFiltrar.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === modalFiltrar) {
                modalFiltrar.style.display = 'none';
            }
        });
    });
    </script>
    <h3><?= __('Reporte') ?></h3>
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

</div>
