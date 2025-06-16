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

/* @pct_theme_templates/navigation/nav_submenu_v2.html5 */
class __TwigTemplate_ffee505c685c3fa76d8f563842579654 extends Template
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
        yield "<ul class=\"vlist <?= \$this->level; ?>\">
<?php foreach (\$this->items as \$item): ?>
<?php
\$item['class'] .= ' custommenu_cols'.count(\$this->items);
if( \$item['visibility_css'] )
{
\t\$item['class'] .= ' '.\$item['visibility_css'];
}
if( \$item['addFontIcon'] && !empty('fontIcon') )
{
\t\$item['class'] .= ' hasIcon';
}
if( !isset(\$item['subitems']) )
{
\t\$item['subitems'] = '';
}
if( isset(\$item['helper_css']) && !empty(\$item['helper_css']) )
{
\t\$item['class'] .= ' '.\\implode(' ',\\Contao\\StringUtil::deserialize( \$item['helper_css'] ) );
}
?>
<li class=\"mlist <?= \$item['type']; ?><?php if (\$item['class']): ?> <?= \$item['class']; ?><?php endif; ?> <?php if(\$item['isActive']): ?>mm-selected Selected<?php endif; ?>\"><a href=\"<?= \$item['href'] ?: './' ?>\" title=\"<?= \$item['pageTitle'] ? \$item['pageTitle'] : \$item['title']; ?>\" class=\"a-<?= \$this->level; ?> <?= \$item['type']; ?><?php if (\$item['class']): ?> <?= \$item['class']; ?><?php endif; ?>\"<?php if (\$item['accesskey'] != ''): ?> accesskey=\"<?= \$item['accesskey']; ?>\"<?php endif; ?><?php if (isset(\$item['tabindex'])): ?> tabindex=\"<?= \$item['tabindex']; ?>\"<?php endif; ?><?= \$item['rel'] ?? '' ?><?= \$item['target']; ?>><?php if(\$item['addFontIcon']): ?><i class=\"<?= \$item['fontIcon']; ?>\"></i><?php endif; ?><?= \$item['link']; ?><span class=\"pagetitle\"><?= \$item['pageTitle']?></span></a><?= \$item['subitems']; ?></li>
<?php endforeach; ?>
</ul>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/navigation/nav_submenu_v2.html5";
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
        return new Source("", "@pct_theme_templates/navigation/nav_submenu_v2.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/navigation/nav_submenu_v2.html5");
    }
}
