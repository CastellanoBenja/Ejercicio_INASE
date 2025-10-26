<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Muestra $muestra
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Editar Muestra'), ['action' => 'edit', $muestra->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Muestra'), ['action' => 'delete', $muestra->id], ['confirm' => __('Estas seguro que quieres eliminar # {0}?', $muestra->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Muestras'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva Muestra'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="muestras view content">
            <h3><?= h($muestra->numero_de_precinto) ?></h3>
            <table>
                <tr>
                    <th><?= __('Numero De Precinto') ?></th>
                    <td><?= h($muestra->numero_de_precinto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Empresa') ?></th>
                    <td><?= h($muestra->empresa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Especie') ?></th>
                    <td><?= h($muestra->especie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($muestra->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad Semillas') ?></th>
                    <td><?= $this->Number->format($muestra->cantidad_semillas) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>