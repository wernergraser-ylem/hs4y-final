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

/* @pct_theme_templates/news/news_newsteaser_v2.html5 */
class __TwigTemplate_bd1e59fab53753e6a93eaf273d320870 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/news/news_newsteaser_v2.css|static';
?>
<div class=\"newsteaser_v2 autogrid one_third block <?php echo \$this->class; ?>\" itemscope itemtype=\"http://schema.org/Article\">\t
\t<div class=\"content_left\" itemprop=\"datePublished\">
\t\t<span class=\"day\"><?= \\Contao\\Date::parse(\"d\", \$this->timestamp);?></span>
\t\t<span class=\"month\"><?= \\Contao\\Date::parse(\"M\", \$this->timestamp);?></span>
\t</div>
\t<div class=\"content_right\">
\t\t<div class=\"h6\"><?php echo \$this->hasText ? \$this->linkHeadline : \$this->newsHeadline; ?></div>
\t\t<div class=\"info\">
\t\t\t<?php if (\$this->author): ?>
\t\t\t<span class=\"author\"><?php echo \$this->author; ?></span>
\t\t\t<?php endif; ?>
\t\t\t<?php if (\$this->commentCount): ?>
\t\t\t<span class=\"comments\"><?php echo \$this->commentCount; ?></span>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t<div class=\"teaser\" itemprop=\"description\"><?php echo \\Contao\\StringUtil::substrHtml(\$this->teaser, 100) ?></div>\t
\t</div>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/news/news_newsteaser_v2.html5";
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
        return new Source("", "@pct_theme_templates/news/news_newsteaser_v2.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/news/news_newsteaser_v2.html5");
    }
}
