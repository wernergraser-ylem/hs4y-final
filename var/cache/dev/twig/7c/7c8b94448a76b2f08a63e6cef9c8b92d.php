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

/* @pct_theme_templates/modules/mod_article_offset_top.html5 */
class __TwigTemplate_bccce8b43658fac9c30b7c9365664177 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_article_offset_top.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_article_offset_top.html5"));

        // line 1
        yield "<?php
// add media queries to page
if(\$this->Theme->hasMediaQueries)
{
    \$GLOBALS['TL_HEAD'][] = '<style>'.\$this->Theme->mediaqueries.'</style>';
}
?>
<div class=\"<?php echo \$this->class; ?> mod_article_offset_top block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
  <div class=\"container\">
  <?php if (\$this->printable): ?>
    <?php \$this->block('syndication'); ?>
        <!-- indexer::stop -->
        <div class=\"syndication\">
          <?php if (\$this->printButton): ?>
            <a href=\"<?= \$this->print ?>\" class=\"print\" rel=\"nofollow\" title=\"<?= \$this->printTitle ?>\" onclick=\"window.print();return false\"><?= \\Contao\\Image::getHtml('assets/contao/images/print.svg') ?></a>
          <?php endif; ?>
          <?php if (\$this->pdfButton): ?>
            <a href=\"<?= \$this->href ?>\" class=\"pdf\" rel=\"nofollow\" title=\"<?= \$this->pdfTitle ?>\"><?= \\Contao\\Image::getHtml('assets/contao/images/pdf.svg') ?></a>
          <?php endif; ?>
          <?php if (\$this->facebookButton): ?>
            <a href=\"<?= \$this->route('contao_frontend_share', ['p' => 'facebook', 'u' => \$this->encUrl]) ?>\" class=\"facebook\" rel=\"nofollow\" title=\"<?= \$this->facebookTitle ?>\" onclick=\"var w=window.open(this.href,'','width=640,height=380,modal=yes,left=100,top=50,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,toolbar=no');w.opener=null;return false\"><?= \\Contao\\Image::getHtml('assets/contao/images/facebook.svg') ?></a>
          <?php endif; ?>
          <?php if (\$this->twitterButton): ?>
            <a href=\"<?= \$this->route('contao_frontend_share', ['p' => 'twitter', 'u' => \$this->encUrl, 't' => \$this->encTitle]) ?>\" class=\"twitter\" rel=\"nofollow\" title=\"<?= \$this->twitterTitle ?>\" onclick=\"var w=window.open(this.href,'','width=640,height=380,modal=yes,left=100,top=50,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,toolbar=no');w.opener=null;return false\"><?= \\Contao\\Image::getHtml('assets/contao/images/twitter.svg') ?></a>
          <?php endif; ?>
          <?php if (\$this->gplusButton): ?>
            <a href=\"share/?p=gplus&amp;u=<?= \$this->encUrl ?>\" rel=\"nofollow\" title=\"<?= \$this->gplusTitle ?>\" onclick=\"window.open(this.href,'','width=600,height=200,modal=yes,left=100,top=50,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,toolbar=no');return false\"><?= \\Contao\\Image::getHtml('assets/contao/images/gplus.svg') ?></a>
         <?php endif; ?>
        </div>
        <!-- indexer::continue -->
      <?php \$this->endblock(); ?>
  <?php endif; ?>

  <?php echo implode('', \$this->elements); ?>

  <?php if (\$this->backlink): ?>
    <!-- indexer::stop -->
    <p class=\"back\"><a href=\"<?php echo \$this->backlink; ?>\" title=\"<?php echo \$this->back; ?>\"><?php echo \$this->back; ?></a></p>
    <!-- indexer::continue -->
  <?php endif; ?>
  </div>

</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_article_offset_top.html5";
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
        return new Source("<?php
// add media queries to page
if(\$this->Theme->hasMediaQueries)
{
    \$GLOBALS['TL_HEAD'][] = '<style>'.\$this->Theme->mediaqueries.'</style>';
}
?>
<div class=\"<?php echo \$this->class; ?> mod_article_offset_top block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
  <div class=\"container\">
  <?php if (\$this->printable): ?>
    <?php \$this->block('syndication'); ?>
        <!-- indexer::stop -->
        <div class=\"syndication\">
          <?php if (\$this->printButton): ?>
            <a href=\"<?= \$this->print ?>\" class=\"print\" rel=\"nofollow\" title=\"<?= \$this->printTitle ?>\" onclick=\"window.print();return false\"><?= \\Contao\\Image::getHtml('assets/contao/images/print.svg') ?></a>
          <?php endif; ?>
          <?php if (\$this->pdfButton): ?>
            <a href=\"<?= \$this->href ?>\" class=\"pdf\" rel=\"nofollow\" title=\"<?= \$this->pdfTitle ?>\"><?= \\Contao\\Image::getHtml('assets/contao/images/pdf.svg') ?></a>
          <?php endif; ?>
          <?php if (\$this->facebookButton): ?>
            <a href=\"<?= \$this->route('contao_frontend_share', ['p' => 'facebook', 'u' => \$this->encUrl]) ?>\" class=\"facebook\" rel=\"nofollow\" title=\"<?= \$this->facebookTitle ?>\" onclick=\"var w=window.open(this.href,'','width=640,height=380,modal=yes,left=100,top=50,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,toolbar=no');w.opener=null;return false\"><?= \\Contao\\Image::getHtml('assets/contao/images/facebook.svg') ?></a>
          <?php endif; ?>
          <?php if (\$this->twitterButton): ?>
            <a href=\"<?= \$this->route('contao_frontend_share', ['p' => 'twitter', 'u' => \$this->encUrl, 't' => \$this->encTitle]) ?>\" class=\"twitter\" rel=\"nofollow\" title=\"<?= \$this->twitterTitle ?>\" onclick=\"var w=window.open(this.href,'','width=640,height=380,modal=yes,left=100,top=50,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,toolbar=no');w.opener=null;return false\"><?= \\Contao\\Image::getHtml('assets/contao/images/twitter.svg') ?></a>
          <?php endif; ?>
          <?php if (\$this->gplusButton): ?>
            <a href=\"share/?p=gplus&amp;u=<?= \$this->encUrl ?>\" rel=\"nofollow\" title=\"<?= \$this->gplusTitle ?>\" onclick=\"window.open(this.href,'','width=600,height=200,modal=yes,left=100,top=50,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,toolbar=no');return false\"><?= \\Contao\\Image::getHtml('assets/contao/images/gplus.svg') ?></a>
         <?php endif; ?>
        </div>
        <!-- indexer::continue -->
      <?php \$this->endblock(); ?>
  <?php endif; ?>

  <?php echo implode('', \$this->elements); ?>

  <?php if (\$this->backlink): ?>
    <!-- indexer::stop -->
    <p class=\"back\"><a href=\"<?php echo \$this->backlink; ?>\" title=\"<?php echo \$this->back; ?>\"><?php echo \$this->back; ?></a></p>
    <!-- indexer::continue -->
  <?php endif; ?>
  </div>

</div>", "@pct_theme_templates/modules/mod_article_offset_top.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_article_offset_top.html5");
    }
}
