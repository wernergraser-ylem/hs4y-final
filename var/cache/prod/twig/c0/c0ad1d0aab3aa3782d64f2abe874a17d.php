<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @pct_theme_templates/form/form_text_datepicker.html5 */
class __TwigTemplate_4f97e3909ce40d9e2724a8321ccb329e extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<?php
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/moment/moment.min.js'.(\\PCT\\SEO::getProtocol() == 'http2' ? '' : '|static');
?>

<?php \$this->extend('form_row'); ?>

<?php \$this->block('label'); ?>
  <?php if (\$this->label): ?>
    <label for=\"ctrl_<?= \$this->id ?>\"<?php if (\$this->class): ?> class=\"<?= \$this->class ?>\"<?php endif; ?>>
      <?php if (\$this->mandatory): ?>
        <span class=\"invisible\"><?= \$this->mandatoryField ?></span> <?= \$this->label ?><span class=\"mandatory\">*</span>
      <?php else: ?>
        <?= \$this->label ?>
      <?php endif; ?>
    </label>
  <?php endif; ?>
<?php \$this->endblock(); ?>

<?php \$this->block('field'); ?>
  <?php if (\$this->hasErrors()): ?>
    <p class=\"error\"><?= \$this->getErrorAsString() ?></p>
  <?php endif; ?>
  
  <input type=\"date\" name=\"<?= \$this->name ?>_input\"id=\"ctrl_<?= \$this->id ?>\" class=\"datepicker text\" value=\"<?= \\Contao\\StringUtil::specialchars(\$this->value ?: \\Contao\\Date::parse('Y-m-d') ) ?>\"<?= \$this->getAttributes() ?><?php if(\$this->rgxp == 'date' && \\Contao\\FormModel::findByPk(\$this->pid)->novalidate): ?> pattern=\"<?= \\Contao\\Date::getRegexp(\\Contao\\Date::getNumericDateFormat()); ?>\" <?php endif; ?>>
  <input type=\"hidden\" name=\"<?= \$this->name ?>\" id=\"ctrl_<?= \$this->id ?>_hidden\" class=\"hidden\" value=\"<?= \\Contao\\StringUtil::specialchars(\$this->value ?: \\Contao\\Date::parse( \\Contao\\Config::get('dateFormat') ) ) ?>\">
  <!-- SEO-SCRIPT-START -->
  <script>
  jQuery('input[name=\"<?= \$this->name ?>_input\"]').on('change',function() 
  {
      var format = 'DD.MM.YYYY';
      <?php if( (\\Contao\\Config::get('dateFormat') == 'Y-m-d' && \\Contao\\FormModel::findByPk(\$this->pid)->novalidate) || \$this->rgxp == 'date' ): ?>
      var format = 'YYYY-MM-DD';
      <?php endif; ?>
      jQuery('input[name=\"<?= \$this->name ?>\"').val( moment(this.value, \"YYYY-MM-DD\").format(format) );
  });
  </script>
  <!-- SEO-SCRIPT-STOP -->
  <?php if (\$this->addSubmit): ?>
    <input type=\"submit\" id=\"ctrl_<?= \$this->id ?>_submit\" class=\"submit\" value=\"<?= \$this->slabel ?>\">
  <?php endif; ?>

<?php \$this->endblock(); ?>



";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/form/form_text_datepicker.html5";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_theme_templates/form/form_text_datepicker.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/form/form_text_datepicker.html5");
    }
}
