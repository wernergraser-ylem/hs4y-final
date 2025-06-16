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

/* @pct_theme_settings/mod_article.html5 */
class __TwigTemplate_ebd527ed3a900a585417138d86cf450e extends Template
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
// Add stellar script to page when parallax is used
if(\$this->Theme->parallax)
{
\t\$GLOBALS['TL_JAVASCRIPT'][] = \\Contao\\Config::get('uploadPath').'/cto_layout/scripts/parallax/jquery.stellar.min.js|static';
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
    <!-- indexer::stop -->
    <div class=\"pdf_link\">

      <?php if (\$this->printButton): ?>
        <a href=\"<?= \$this->print ?>\" rel=\"nofollow\" title=\"<?= \$this->printTitle ?>\" onclick=\"window.print();return false\"><?= Image::getHtml('assets/contao/images/print.gif') ?></a>
      <?php endif; ?>

      <?php if (\$this->pdfButton): ?>
        <a href=\"<?= \$this->href ?>\" rel=\"nofollow\" title=\"<?= \$this->pdfTitle ?>\"><?= Image::getHtml('assets/contao/images/pdf.gif') ?></a>
      <?php endif; ?>

      <?php if (\$this->facebookButton): ?>
        <a href=\"share/?p=facebook&amp;u=<?= \$this->encUrl ?>\" rel=\"nofollow\" title=\"<?= \$this->facebookTitle ?>\" onclick=\"window.open(this.href,'','width=640,height=380,modal=yes,left=100,top=50,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,toolbar=no');return false\"><?= Image::getHtml('assets/contao/images/facebook.gif') ?></a>
      <?php endif; ?>

      <?php if (\$this->twitterButton): ?>
        <a href=\"share/?p=twitter&amp;u=<?= \$this->encUrl ?>&amp;t=<?= \$this->encTitle ?>\" rel=\"nofollow\" title=\"<?= \$this->twitterTitle ?>\" onclick=\"window.open(this.href,'','width=640,height=380,modal=yes,left=100,top=50,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,toolbar=no');return false\"><?= Image::getHtml('assets/contao/images/twitter.gif') ?></a>
      <?php endif; ?>

      <?php if (\$this->gplusButton): ?>
        <a href=\"share/?p=gplus&amp;u=<?= \$this->encUrl ?>\" rel=\"nofollow\" title=\"<?= \$this->gplusTitle ?>\" onclick=\"window.open(this.href,'','width=600,height=200,modal=yes,left=100,top=50,location=no,menubar=no,resizable=yes,scrollbars=yes,status=no,toolbar=no');return false\"><?= Image::getHtml('assets/contao/images/gplus.gif') ?></a>
      <?php endif; ?>

    </div>
    <!-- indexer::continue -->
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
<script>
/* <![CDATA[ */

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

/* ]]> */
</script>
<?php endif; ?>

<?php if(\$this->Theme->parallax): ?>
<script>
/* <![CDATA[ */

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
/* ]]> */
</script>
<?php endif; ?>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_settings/mod_article.html5";
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
        return new Source("", "@pct_theme_settings/mod_article.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/mod_article.html5");
    }
}
