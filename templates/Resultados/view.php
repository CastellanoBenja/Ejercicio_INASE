<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resultado $resultado
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Opciones') ?></h4>
            <?= $this->Html->link(__('Listar Resultados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Añadir Resultado'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Editar Resultado'), ['action' => 'edit', $resultado->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Resultado'), ['action' => 'delete', $resultado->id], ['confirm' => __('Estas seguro que quieres eliminar el Resultado # {0}?', $resultado->id), 'class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="resultados view content">
            <h3><?= h($resultado->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Muestra') ?></th>
                    <td><?= $resultado->hasValue('muestra') ? $this->Html->link($resultado->muestra->numero_de_precinto, ['controller' => 'Muestras', 'action' => 'view', $resultado->muestra->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($resultado->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Poder Germinativo') ?></th>
                    <td><?= $this->Number->format($resultado->poder_germinativo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pureza') ?></th>
                    <td><?= $this->Number->format($resultado->pureza) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Materiales Inertes') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($resultado->materiales_inertes)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>