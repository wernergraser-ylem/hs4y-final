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

/* @pct_tabletree_widget/be_pct_tabletree.html5 */
class __TwigTemplate_2e67939bbe96c11487dfc0fd6272a90f extends Template
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
        yield "<!DOCTYPE html>
<html lang=\"<?= \$this->language ?>\">
<head>

  <?php \$this->block('head'); ?>
    <meta charset=\"<?= \$this->charset ?>\">
    <title><?= \$this->title ?> | <?= \$this->host ?></title>
    <base href=\"<?= \$this->base ?>\">

    <?php \$this->block('meta'); ?>
      <meta name=\"generator\" content=\"Contao Open Source CMS\">
      <meta name=\"viewport\" content=\"width=device-width,initial-scale=1.0,shrink-to-fit=no\">
      <meta name=\"referrer\" content=\"origin\">
    <?php \$this->endblock(); ?>

    <link rel=\"stylesheet\" href=\"<?php
      \$objCombiner = new \\Contao\\Combiner();
      \$objCombiner->add('system/themes/'.\$this->theme.'/fonts.min.css');
    #  \$objCombiner->add('assets/colorpicker/css/mooRainbow.min.css');
     # \$objCombiner->add('assets/chosen/css/chosen.min.css');
      #\$objCombiner->add('assets/simplemodal/css/simplemodal.min.css');
      #objCombiner->add('assets/datepicker/css/datepicker.min.css');
      \$objCombiner->add('system/themes/'.\$this->theme.'/basic.min.css');
      \$objCombiner->add('system/themes/'.\$this->theme.'/main.min.css');
      echo \$objCombiner->getCombinedFile();
    ?>\">
    <?= \$this->stylesheets ?>

    <script><?= \$this->getLocaleString() ?></script>
    <script src=\"<?php
      \$objCombiner = new \\Contao\\Combiner();
      \$objCombiner->add('assets/mootools/js/mootools.min.js');
      \$objCombiner->add('assets/colorpicker/js/mooRainbow.min.js');
     # \$objCombiner->add('assets/chosen/js/chosen.min.js');
      \$objCombiner->add('assets/simplemodal/js/simplemodal.min.js');
      #\$objCombiner->add('assets/datepicker/js/datepicker.min.js');
      \$objCombiner->add('bundles/contaocore/mootao.min.js');
      \$objCombiner->add('bundles/contaocore/core.min.js');
      \$objCombiner->add('system/themes/'.\$this->theme.'/hover.min.js');
      echo \$objCombiner->getCombinedFile();
    ?>\"></script>
    <script><?= \$this->getDateString() ?></script>
   
  <?php \$this->endblock(); ?>

</head>
<body id=\"top\" class=\"<?= \$this->ua ?> be_main<?php if (\$this->isPopup): ?> popup<?php endif; ?>\"<?= \$this->attributes ?>>
  <div id=\"container\">
    <div id=\"main\">
    \t<?php if (\$this->managerHref): ?>
        <div id=\"manager\">
          <a href=\"<?php echo \$this->managerHref; ?>\" class=\"open\" title=\"<?php echo \\Contao\\StringUtil::specialchars(\$this->manager); ?>\"><?php echo \$this->manager; ?></a>
        </div>
      <?php endif; ?>
      
      <form action=\"<?php echo \$this->action; ?>\" method=\"post\">
\t  <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$this->request_token; ?>\">
\t  <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"pct_tableTreeWidget\">
\t\t    \t    \t
\t\t<?php if (\$this->addSearch): ?>
\t\t  <div id=\"search\" class=\"panel align_right\">
\t\t    <input type=\"text\" name=\"keyword\" id=\"keyword\" value=\"<?php echo \$this->value; ?>\" class=\"tl_text<?php if (\$this->value != ''): ?> active<?php endif; ?>\">
\t\t    <input type=\"submit\" name=\"search\" value=\"<?php echo \$this->search; ?>\" class=\"tl_submit\">
\t\t  </div>
\t\t<?php endif; ?>
      
      <?php if(\$this->panels): ?>
      <?php echo implode('', \$this->panels); ?>
      <?php endif; ?>
          
      </form>
      <div class=\"tl_listing_container\" id=\"tl_listing\">
        <?= \$this->breadcrumb; ?>
        <?= \$this->main; ?>
      </div>
    </div>
  </div>

</body>
</html>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_tabletree_widget/be_pct_tabletree.html5";
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
        return new Source("", "@pct_tabletree_widget/be_pct_tabletree.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_tabletree_widget/templates/be_pct_tabletree.html5");
    }
}
