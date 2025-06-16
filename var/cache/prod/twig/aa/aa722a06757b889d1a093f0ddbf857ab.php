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

/* @pct_theme_templates/modules/mod_newslist_v6.html5 */
class __TwigTemplate_0069ff37b59fcd272a237d8d4a627183 extends Template
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
namespace Contao;\t

\$arrModel = ModuleModel::findByPk(\$this->id)->originalRow();
\$arrCssID =  StringUtil::deserialize(\$arrModel['cssID']);

\$GLOBALS['SEO_SCRIPTS_FILE'][]  = 'files/cto_layout/scripts/isotope/jquery.isotope.min.js|static';
\$GLOBALS['SEO_SCRIPTS_FILE'][]  = 'files/cto_layout/scripts/isotope/isotope_plugin_masonry.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/isotope/isotope_styles.css|static';
?>
<?php \$this->extend('block_unsearchable'); ?>

<?php \$this->block('content'); ?>

<div id=\"mod_news_<?php echo \$this->id; ?>\" class=\"mod_newslist_v6 isotope <?= \$arrCssID[1]; ?>\">
 <?php if (empty(\$this->articles)): ?>
    <p class=\"empty\"><?php echo \$this->empty; ?></p>
  <?php else: ?>
    <?php echo implode('', \$this->articles); ?>
  <?php endif; ?>
</div>
<?php echo \$this->pagination; ?>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(window).on('load', function() {
  \tvar container = jQuery('#mod_news_<?php echo \$this->id; ?>');
\tcontainer.isotope({
\t\titemSelector: '.item',
\t\t//layoutMode: 'masonryColumnShift',
\t\tresizable: true,
\t\tmasonry: {}
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->
<?php \$this->endblock(); ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_newslist_v6.html5";
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
        return new Source("", "@pct_theme_templates/modules/mod_newslist_v6.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_newslist_v6.html5");
    }
}
