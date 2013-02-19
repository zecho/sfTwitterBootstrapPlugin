<td>
    <ul class="table-action">
        <?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): ?>
        <?php if ('_delete' == $name): ?>
            <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDelete($' . $this->getSingularName() . ', ' . $this->asPhp($params) . ') ?]', $params) ?>

            <?php elseif ('_edit' == $name): ?>
            <?php echo $this->addCredentialCondition('[?php echo $helper->linkToEdit($' . $this->getSingularName() . ', ' . $this->asPhp($params) . ') ?]', $params) ?>

            <?php elseif ('_show' == $name): ?>
            <?php echo $this->addCredentialCondition('[?php echo $helper->linkToShow($' . $this->getSingularName() . ', ' . $this->asPhp($params) . ') ?]', $params) ?>

            <?php else: ?>
            <?php if (isset($params['condition'])): ?>
                [?php if
                ( <?php echo (isset($params['condition']['invert']) && $params['condition']['invert'] ? '!' : '') . '$' . $this->getSingularName() . '->' . $params['condition']['function'] ?>
                ( <?php echo (isset($params['condition']['params']) ? $params['condition']['params'] : '') ?> ) ):  ?]
                <?php endif; ?>
            <li class="sf_admin_action_<?php echo $params['class_suffix'] ?>">
                <?php
                if (sfTwitterBootstrap::getProperty('use_icons_in_button', false)) {
                    $params['label'] = isset($params['icon']) ? '<i class="' . $params['icon'] . '"></i> ' . $params['label'] : $params['label'];
                }
                echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params)
                ?>
            </li>
            <?php if (isset($params['condition'])): ?>
            [?php endif; ?]
            <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</td>
