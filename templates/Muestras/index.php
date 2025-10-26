<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Muestra> $muestras
 */
?>
<div class="muestras index content">
    <div class="dropdown float-right">
        <button class="dropbtn">Opciones ▼</button>
            <div class="dropdown-content">
            <?= $this->Html->link('Agregar Muestra', ['action' => 'add'], ['class' => 'dropdown-item']) ?>
            <?= $this->Html->link('Ver Listado de Resultados', ['controller' => 'Resultados', 'action' => 'index'], 
            ['class' => 'dropdown-item']) ?>
            <?= $this->Html->link('Agregar Resultado', ['controller' => 'Resultados', 'action' => 'add'], 
            ['class' => 'dropdown-item']) ?>
            <?= $this->Html->link('Generar Reporte', ['action' => ''], ['class' => 'dropdown-item']) ?>
    </div>
</div>
    <h3><?= __('Muestras') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('numero_de_precinto') ?></th>
                    <th><?= $this->Paginator->sort('empresa') ?></th>
                    <th><?= $this->Paginator->sort('especie') ?></th>
                    <th><?= $this->Paginator->sort('cantidad_semillas') ?></th>
                    <th class="actions"><?= __('Opciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($muestras as $muestra): ?>
                <tr>
                    <td><?= $this->Number->format($muestra->id) ?></td>
                    <td><?= h($muestra->numero_de_precinto) ?></td>
                    <td><?= h($muestra->empresa) ?></td>
                    <td><?= h($muestra->especie) ?></td>
                    <td><?= $this->Number->format($muestra->cantidad_semillas) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $muestra->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $muestra->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $muestra->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Estas seguro que quieres eliminar # {0}?', $muestra->id),
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
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} muestra(s) de {{count}} en total')) ?></p>
    </div>
</div>