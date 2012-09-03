[?php $configs = array();
<?php $catalogue = $this->getI18nCatalogue(); ?>
<?php foreach ($this->configuration->getValue('show.display') as $name => $field): ?>
<?php echo $this->addCredentialCondition(sprintf(<<<EOF

// Config for %s
\$configs['%s']['label'] = __('%s', array(),'%s');
\$configs['%s']['render'] = %s;

EOF
,
  $field->getName(),
  $field->getName(),
  $field->getConfig('label', '', true),
  $catalogue,
  $field->getName(),
  $this->renderField($field)
), $field->getConfig()) ?>
<?php endforeach; ?>

foreach ($fields as $fieldName => $config) : ?]
  [?php if (!isset($configs[$config->getName()])): continue; endif; ?]
<div class="control-group sf_admin_row">
  <label class="control-label">[?php echo $configs[$fieldName]['label'] ?]</label>
  <div class="controls">
    <div class="input-plain">[?php echo $configs[$fieldName]['render'] ?]</div>
  </div>
</div>
[?php endforeach; ?]
