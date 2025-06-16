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

/* @pct_theme_templates/theme/nl_default.html5 */
class __TwigTemplate_28e668deb83ceb0199996ea09936f405 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/nl_default.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/nl_default.html5"));

        // line 1
        yield "<?php \$this->extend('block_unsearchable'); ?>

<?php \$this->block('content'); ?>

  <form<?php if (\$this->action): ?> action=\"<?= \$this->action ?>\"<?php endif; ?> id=\"<?= \$this->formId ?>\" method=\"post\">
    <div class=\"formbody\">
      <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formId ?>\">
      <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">

      <?php if (\$this->message): ?>
        <p class=\"<?= \$this->mclass ?>\"><?= \$this->message ?></p>
      <?php endif; ?>

      <?php if (!\$this->showChannels): ?>
        <?php foreach (\$this->channels as \$id=>\$title): ?>
          <input type=\"hidden\" name=\"channels[]\" value=\"<?= \$id ?>\">
        <?php endforeach; ?>
      <?php endif; ?>

        <label for=\"ctrl_email_<?= \$this->id ?>\" class=\"invisible\"><?= \$this->emailLabel ?></label>
        <input type=\"text\" name=\"email\" id=\"ctrl_email_<?= \$this->id ?>\" class=\"text mandatory\" value=\"<?= \$this->email ?>\" placeholder=\"<?= \$this->emailLabel ?>\" required>
      
      <?php if (\$this->showChannels): ?>
        <div class=\"widget widget-checkbox\">
          <fieldset id=\"ctrl_channels_<?= \$this->id ?>\" class=\"checkbox_container\">
            <legend class=\"invisible\"><?= \$this->channelsLabel ?></legend>
              <?php foreach (\$this->channels as \$id=>\$title): ?>
              <span><input type=\"checkbox\" name=\"channels[]\" id=\"opt_<?= \$this->id ?>_<?= \$id ?>\" value=\"<?= \$id ?>\" class=\"checkbox\"<?php if (is_array(\$this->selectedChannels) && in_array(\$id, \$this->selectedChannels)) echo ' checked'; ?>> <label for=\"opt_<?= \$this->id ?>_<?= \$id ?>\"><?= \$title ?></label></span>
            <?php endforeach; ?>
            </fieldset>
        </div>
      <?php endif; ?>

\t  <?= \$this->captcha ?>
\t  
\t  <input type=\"submit\" name=\"submit\" class=\"submit\" value=\"<?= \$this->submit ?>\">
\t  
    </div>
  </form>

  <?php if (\$this->hasError): ?>
    <script>
      try {
        window.scrollTo(null, parseInt(\$('<?php echo \$this->formId; ?>').getElement('p.error').getPosition().y - 40));
      } catch(e) {}
    </script>
  <?php endif; ?>

<?php \$this->endblock(); ?>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/theme/nl_default.html5";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<?php \$this->extend('block_unsearchable'); ?>

<?php \$this->block('content'); ?>

  <form<?php if (\$this->action): ?> action=\"<?= \$this->action ?>\"<?php endif; ?> id=\"<?= \$this->formId ?>\" method=\"post\">
    <div class=\"formbody\">
      <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?= \$this->formId ?>\">
      <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">

      <?php if (\$this->message): ?>
        <p class=\"<?= \$this->mclass ?>\"><?= \$this->message ?></p>
      <?php endif; ?>

      <?php if (!\$this->showChannels): ?>
        <?php foreach (\$this->channels as \$id=>\$title): ?>
          <input type=\"hidden\" name=\"channels[]\" value=\"<?= \$id ?>\">
        <?php endforeach; ?>
      <?php endif; ?>

        <label for=\"ctrl_email_<?= \$this->id ?>\" class=\"invisible\"><?= \$this->emailLabel ?></label>
        <input type=\"text\" name=\"email\" id=\"ctrl_email_<?= \$this->id ?>\" class=\"text mandatory\" value=\"<?= \$this->email ?>\" placeholder=\"<?= \$this->emailLabel ?>\" required>
      
      <?php if (\$this->showChannels): ?>
        <div class=\"widget widget-checkbox\">
          <fieldset id=\"ctrl_channels_<?= \$this->id ?>\" class=\"checkbox_container\">
            <legend class=\"invisible\"><?= \$this->channelsLabel ?></legend>
              <?php foreach (\$this->channels as \$id=>\$title): ?>
              <span><input type=\"checkbox\" name=\"channels[]\" id=\"opt_<?= \$this->id ?>_<?= \$id ?>\" value=\"<?= \$id ?>\" class=\"checkbox\"<?php if (is_array(\$this->selectedChannels) && in_array(\$id, \$this->selectedChannels)) echo ' checked'; ?>> <label for=\"opt_<?= \$this->id ?>_<?= \$id ?>\"><?= \$title ?></label></span>
            <?php endforeach; ?>
            </fieldset>
        </div>
      <?php endif; ?>

\t  <?= \$this->captcha ?>
\t  
\t  <input type=\"submit\" name=\"submit\" class=\"submit\" value=\"<?= \$this->submit ?>\">
\t  
    </div>
  </form>

  <?php if (\$this->hasError): ?>
    <script>
      try {
        window.scrollTo(null, parseInt(\$('<?php echo \$this->formId; ?>').getElement('p.error').getPosition().y - 40));
      } catch(e) {}
    </script>
  <?php endif; ?>

<?php \$this->endblock(); ?>
", "@pct_theme_templates/theme/nl_default.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/theme/nl_default.html5");
    }
}
