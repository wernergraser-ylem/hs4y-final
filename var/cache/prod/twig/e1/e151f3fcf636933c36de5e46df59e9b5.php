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

/* @pct_theme_templates/news/news_portfoliolist_demos_external_link.html5 */
class __TwigTemplate_e1d5f34e75284817bd728f373252e9b6 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/portfolio/news_portfoliolist_demos.css|static';

// handle multiple filter values by commata seperated lists
\$arrFilterClasses = array();
foreach(\\explode(',', \$this->subHeadline) as \$v)
{
\t\$arrFilterClasses[] = 'filter_'.\\Contao\\StringUtil::standardize(\$v);
}
// filter field in use
if( isset(\$this->filters) && !empty(\$this->filters) )
{
\t\$arrFilterClasses = array();
\tforeach( \\Contao\\StringUtil::deserialize(\$this->filters) as \$v)
\t{
\t\t\$arrFilterClasses[] = 'filter_'.str_replace(array('ä','ü','ö','ß'),array('ae','ue','oe','ss'),\\Contao\\StringUtil::standardize(\$v));
\t}
}
?>

<?php
\$href = 'http://cdn4.homelinux.net/demo-'.\$this->alias.'.html';
?>

<div class=\"item block <?php echo \$this->class; ?> port_overlay <?php echo implode(' ', \$arrFilterClasses) ?>\">
\t<figure class=\"image_container\">
\t\t<a href=\"<?php echo \$href; ?>\"<?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" target=\"_blank\">
\t\t\t<div class=\"overlay\">
\t\t\t\t<i></i>
\t\t\t</div>
\t\t</a>
\t\t<div class=\"image_container_img\"><?php \$this->insert('picture_default', \$this->picture); ?></div>\t
\t</figure>
\t<div class=\"content\">\t\t
\t\t<div class=\"info\">
\t\t\t<a href=\"<?php echo \$href; ?>\"<?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" target=\"_blank\">
\t\t\t\t<div class=\"title h5\">
\t\t\t\t\t<a href=\"<?php echo \$href; ?>\"<?php echo \$this->attributes; ?> title=\"<?php echo \$this->alt; ?>\" target=\"_blank\">
\t\t\t\t\t<?= \$this->headline; ?>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</a>
\t\t</div>
\t</div>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/news/news_portfoliolist_demos_external_link.html5";
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
        return new Source("", "@pct_theme_templates/news/news_portfoliolist_demos_external_link.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_portfoliolist_demos_external_link.html5");
    }
}
