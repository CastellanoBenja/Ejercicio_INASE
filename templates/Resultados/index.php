<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Resultado> $resultados
 */
?>
<div class="resultados index content">
    <div class="dropdown float-right">
        <button class="dropbtn">Opciones ▼</button>
            <div class="dropdown-content">
            <?= $this->Html->link('Agregar Resultados', ['action' => 'add'], ['class' => 'dropdown-item']) ?>
            <?= $this->Html->link('Ver Listado Muestras', ['controller' => 'Muestras', 'action' => 'index'], 
            ['class' => 'dropdown-item']) ?>
            <?= $this->Html->link('Generar Reporte', ['controller' => 'Muestras', 'action' => 'reporte'], ['class' => 'dropdown-item']) ?>
    </div>
</div>
    <h3><?= __('Resultados') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('muestra_id', 'ID Muestra') ?></th>
                    <th><?= $this->Paginator->sort('poder_germinativo') ?></th>
                    <th><?= $this->Paginator->sort('pureza') ?></th>
                    <th><?= $this->Paginator->sort('materiales_inertes') ?></th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $resultado): ?>
                <tr>
                    <td><?= $resultado->hasValue('muestra') ? $this->Html->link($resultado->muestra->id, ['controller' => 'Muestras', 'action' => 'view', $resultado->muestra->id]) : '' ?></td>
                    <td><?= $this->Number->format($resultado->poder_germinativo) ?></td>
                    <td><?= $this->Number->format($resultado->pureza) ?></td>
                    <td>
                        <?= $this->Text->truncate(
                            $resultado->materiales_inertes, 
                            60,
                            [
                                'ellipsis' => '...', 
                                'exact' => false 
                            ]
                        ) ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $resultado->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $resultado->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $resultado->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Estas seguro que quieres eliminar el Resultado # {0}?', $resultado->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} resultados(s) de {{count}} en total')) ?></p>
    </div>
</div>