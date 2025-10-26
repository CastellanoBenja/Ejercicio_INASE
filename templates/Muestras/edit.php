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
            <?= $this->Html->link(__('Listar Muestras'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $muestra->id],
                ['confirm' => __('Estás seguro que quieres eliminar # {0}?', $muestra->id), 'class' => 'side-nav-item']
            ) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="muestras form content">
            <?= $this->Form->create($muestra) ?>
            <fieldset>
                <legend><?= __('Editar Muestra') ?></legend>
                <?php
                    echo $this->Form->control('numero_de_precinto');
                    echo $this->Form->control('empresa');
                    echo $this->Form->control('especie');
                    echo $this->Form->control('cantidad_semillas');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Confirmar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
