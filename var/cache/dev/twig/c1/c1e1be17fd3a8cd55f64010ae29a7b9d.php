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

/* @pct_theme_templates/modules/mod_article.html5 */
class __TwigTemplate_a7ba8e11798fb93690372625ac9c6d37 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_article.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_article.html5"));

        // line 1
        yield "<?php
// Add stellar script to page when parallax is used
if(\$this->Theme->parallax)
{
\t\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/parallax/jquery.stellar.min.js'.(\\PCT\\SEO::getProtocol() != 'http2' ? '' : '|static');
}
// add media queries to page
if(\$this->Theme->hasMediaQueries)
{
    \$GLOBALS['TL_HEAD'][] = '<style>'.\$this->Theme->mediaqueries.'</style>';
}
?>


<?php if (\$this->teaserOnly): ?>

  <?php \$this->block('alias'); ?>
    <article class=\"<?= \$this->class ?> block\"<?= \$this->cssID ?><?php if (\$this->style): ?> style=\"<?= \$this->style ?>\"<?php endif; ?>>
      <div class=\"ce_text block\">
        <h2><?= \$this->headline ?></h2>
        <div class=\"teaser\">
          <?= \$this->teaser ?>
          <p class=\"more\"><a href=\"<?= \$this->href ?>\" title=\"<?= \$this->readMore ?>\"><?= \$this->more ?> <span class=\"invisible\"><?= \$this->headline ?></span></a></p>
        </div>
      </div>
    </article>
  <?php \$this->endblock(); ?>

<?php elseif (\$this->noMarkup): ?>

  <?php \$this->block('content'); ?>
    <?= implode('', \$this->elements) ?>
  <?php \$this->endblock(); ?>

<?php else: ?>

<div class=\"<?= \$this->class ?> article_<?= \$this->id; ?> block<?php if(\$this->Theme->fullscreen): ?> fullscreen<?php endif; ?><?php if(\$this->offsetCssID): ?> has-offset<?php endif; ?><?php if(\$this->Theme->bg_styles): ?> bg-styles<?php endif; ?><?php if(\$this->Theme): ?> <?= \$this->Theme->classes; ?><?php endif; ?>\"<?= \$this->cssID ?> <?php if(\$this->Theme->bg_styles): ?> style=\"<?= implode(' ', \$this->Theme->bg_styles); ?>\"<?php endif; ?><?php if(\$this->Theme->parallax): ?> data-stellar-background-ratio=\"0.1\" data-stellar-offset-parent=\"true\"<?php endif; ?>>

<?php if(\$this->Theme->overlay): ?>
\t<div class=\"article-overlay <?= \$this->Theme->Overlay->classes; ?>\" style=\"height:<?= \$this->Theme->Overlay->height ?>;\"></div>
<?php endif; ?>
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

  <?php \$this->block('content'); ?>
    <?= implode('', \$this->elements) ?>
  <?php \$this->endblock(); ?>

  <?php if (\$this->backlink): ?>
    <!-- indexer::stop -->
    <p class=\"back\"><a href=\"<?= \$this->backlink ?>\" title=\"<?= \$this->back ?>\"><?= \$this->back ?></a></p>
    <!-- indexer::continue -->
  <?php endif; ?>

</div>
</div>

<?php endif; ?>

<?php if(\$this->Theme->fullscreen): ?>
<!-- SEO-SCRIPT-START -->
<script>
// Fullscreen script
var fullsize_<?= \$this->id; ?> = function()
{
\tvar element = jQuery('.mod_article.article_<?= \$this->id; ?>');
\tvar h = element.outerHeight();
\tvar innerH = element.find('> .container').height();
  var offset = 0;
\tvar windowHeight = jQuery(window).innerHeight();
  <?php if(\$this->offsetCssID): ?>
  offset = jQuery('#<?= \$this->offsetCssID; ?>').height();
  <?php endif; ?>

\telement.removeClass('oversize');
\tif( (innerH + offset) > jQuery(window).height() )
\t{
\t\telement.addClass('oversize');
\t}

  // add class when offset is set
  if( offset > 0 )
  {
    element.height( Math.abs(windowHeight - offset) );
  }
}

jQuery(document).ready(function()
{
\tfullsize_<?= \$this->id; ?>();
});

jQuery(window).resize(function()
{
\tfullsize_<?= \$this->id; ?>();
});
</script>
<!-- SEO-SCRIPT-STOP -->
<?php endif; ?>

<?php if(\$this->Theme->parallax): ?>
<!-- SEO-SCRIPT-START -->
<script>
// Initialize Parallax Script
jQuery(document).ready(function()
{
\tif( !jQuery('body').hasClass('ios') )
\t{
\t\tjQuery('.mod_article.article_<?= \$this->id; ?>.parallax').stellar(
\t\t{
\t\t\thorizontalScrolling: false,
\t\t\tresponsive:true,
\t\t});
\t}
});
</script>
<!-- SEO-SCRIPT-STOP -->
<?php endif; ?>
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
        return "@pct_theme_templates/modules/mod_article.html5";
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
// Add stellar script to page when parallax is used
if(\$this->Theme->parallax)
{
\t\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/parallax/jquery.stellar.min.js'.(\\PCT\\SEO::getProtocol() != 'http2' ? '' : '|static');
}
// add media queries to page
if(\$this->Theme->hasMediaQueries)
{
    \$GLOBALS['TL_HEAD'][] = '<style>'.\$this->Theme->mediaqueries.'</style>';
}
?>


<?php if (\$this->teaserOnly): ?>

  <?php \$this->block('alias'); ?>
    <article class=\"<?= \$this->class ?> block\"<?= \$this->cssID ?><?php if (\$this->style): ?> style=\"<?= \$this->style ?>\"<?php endif; ?>>
      <div class=\"ce_text block\">
        <h2><?= \$this->headline ?></h2>
        <div class=\"teaser\">
          <?= \$this->teaser ?>
          <p class=\"more\"><a href=\"<?= \$this->href ?>\" title=\"<?= \$this->readMore ?>\"><?= \$this->more ?> <span class=\"invisible\"><?= \$this->headline ?></span></a></p>
        </div>
      </div>
    </article>
  <?php \$this->endblock(); ?>

<?php elseif (\$this->noMarkup): ?>

  <?php \$this->block('content'); ?>
    <?= implode('', \$this->elements) ?>
  <?php \$this->endblock(); ?>

<?php else: ?>

<div class=\"<?= \$this->class ?> article_<?= \$this->id; ?> block<?php if(\$this->Theme->fullscreen): ?> fullscreen<?php endif; ?><?php if(\$this->offsetCssID): ?> has-offset<?php endif; ?><?php if(\$this->Theme->bg_styles): ?> bg-styles<?php endif; ?><?php if(\$this->Theme): ?> <?= \$this->Theme->classes; ?><?php endif; ?>\"<?= \$this->cssID ?> <?php if(\$this->Theme->bg_styles): ?> style=\"<?= implode(' ', \$this->Theme->bg_styles); ?>\"<?php endif; ?><?php if(\$this->Theme->parallax): ?> data-stellar-background-ratio=\"0.1\" data-stellar-offset-parent=\"true\"<?php endif; ?>>

<?php if(\$this->Theme->overlay): ?>
\t<div class=\"article-overlay <?= \$this->Theme->Overlay->classes; ?>\" style=\"height:<?= \$this->Theme->Overlay->height ?>;\"></div>
<?php endif; ?>
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

  <?php \$this->block('content'); ?>
    <?= implode('', \$this->elements) ?>
  <?php \$this->endblock(); ?>

  <?php if (\$this->backlink): ?>
    <!-- indexer::stop -->
    <p class=\"back\"><a href=\"<?= \$this->backlink ?>\" title=\"<?= \$this->back ?>\"><?= \$this->back ?></a></p>
    <!-- indexer::continue -->
  <?php endif; ?>

</div>
</div>

<?php endif; ?>

<?php if(\$this->Theme->fullscreen): ?>
<!-- SEO-SCRIPT-START -->
<script>
// Fullscreen script
var fullsize_<?= \$this->id; ?> = function()
{
\tvar element = jQuery('.mod_article.article_<?= \$this->id; ?>');
\tvar h = element.outerHeight();
\tvar innerH = element.find('> .container').height();
  var offset = 0;
\tvar windowHeight = jQuery(window).innerHeight();
  <?php if(\$this->offsetCssID): ?>
  offset = jQuery('#<?= \$this->offsetCssID; ?>').height();
  <?php endif; ?>

\telement.removeClass('oversize');
\tif( (innerH + offset) > jQuery(window).height() )
\t{
\t\telement.addClass('oversize');
\t}

  // add class when offset is set
  if( offset > 0 )
  {
    element.height( Math.abs(windowHeight - offset) );
  }
}

jQuery(document).ready(function()
{
\tfullsize_<?= \$this->id; ?>();
});

jQuery(window).resize(function()
{
\tfullsize_<?= \$this->id; ?>();
});
</script>
<!-- SEO-SCRIPT-STOP -->
<?php endif; ?>

<?php if(\$this->Theme->parallax): ?>
<!-- SEO-SCRIPT-START -->
<script>
// Initialize Parallax Script
jQuery(document).ready(function()
{
\tif( !jQuery('body').hasClass('ios') )
\t{
\t\tjQuery('.mod_article.article_<?= \$this->id; ?>.parallax').stellar(
\t\t{
\t\t\thorizontalScrolling: false,
\t\t\tresponsive:true,
\t\t});
\t}
});
</script>
<!-- SEO-SCRIPT-STOP -->
<?php endif; ?>
", "@pct_theme_templates/modules/mod_article.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_article.html5");
    }
}
