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

/* @pct_theme_templates/form/form_text_floatlabel.html5 */
class __TwigTemplate_f871bc263b71e1183165bca129028b84 extends Template
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
        yield "
<?php // strip fontawesome from input class
\$class = \$this->class;
if(\$this->addFontIcon)
{
\t\$class = str_replace(array(\$this->fontIcon,'fa'),array('',''),\$class);
}
?>

<?php \$this->extend('form_row'); ?>

<?php \$this->block('label'); ?>
  <?php if (\$this->label): ?>
    <label for=\"ctrl_<?php echo \$this->id ?>\"<?php if (\$this->class): ?> class=\"<?php echo \$class ?>\"<?php endif; ?>>
      <?php if (\$this->mandatory): ?>
        <span class=\"invisible\"><?php echo \$this->mandatoryField ?> </span><?php echo \$this->label ?><span class=\"mandatory\">*</span>
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

  <?php if (\$this->addFontIcon): ?>
  <div class=\"formicon-wrapper\">
  <span class=\"input-group-addon\"><i class=\"<?php echo \$this->fontIcon; ?>\"></i></span>
  <?php endif; ?>
  
  <?php if(\$this->placeholder): ?>
  <div class=\"placeholderlabel\"><?= \$this->placeholder; ?></div>
  <?php endif; ?>
  
  <input type=\"<?= \$this->type ?>\" name=\"<?= \$this->name ?>\" id=\"ctrl_<?= \$this->id ?>\" class=\"text floatlabel<?php if (\$this->hideInput) echo ' password'; ?><?php if (\$class) echo ' ' . \$class; ?>\" value=\"<?= \\Contao\\StringUtil::specialchars(\$this->value) ?>\"<?= \$this->getAttributes() ?>>

  <?php if (\$this->addSubmit): ?>
    <input type=\"submit\" id=\"ctrl_<?= \$this->id ?>_submit\" class=\"submit\" value=\"<?= \$this->slabel ?>\">
  <?php endif; ?>

  <?php if (\$this->addFontIcon): ?>
  </div>
  <?php endif; ?>

  <?php if(\$this->placeholder): ?>
  <script>
  
  
  jQuery(document).ready(function() 
  {
\tvar placeholder = '<?= \$this->placeholder; ?>';
  \tjQuery('#ctrl_<?= \$this->id ?>').focus(function(e)
  \t{
\t  \tjQuery(this).prev('.placeholderlabel').addClass('active');
\t  \tjQuery(this).attr('placeholder','');
  \t});
  \tjQuery('#ctrl_<?= \$this->id ?>').focusout(function(e)
  \t{
\t  \tjQuery(this).prev('.placeholderlabel').removeClass('active');
\t  \tjQuery(this).attr('placeholder',placeholder);
  \t});
    jQuery('#ctrl_<?= \$this->id ?>').siblings('.placeholderlabel').click(function()
    {
      jQuery('#ctrl_<?= \$this->id ?>').trigger('focus');
    });
  });
  
  
  </script>
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
        return "@pct_theme_templates/form/form_text_floatlabel.html5";
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
        return new Source("", "@pct_theme_templates/form/form_text_floatlabel.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/form/form_text_floatlabel.html5");
    }
}
