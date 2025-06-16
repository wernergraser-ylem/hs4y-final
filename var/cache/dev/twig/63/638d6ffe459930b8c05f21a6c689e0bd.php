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

/* @pct_theme_templates/navigation/nav_default.html5 */
class __TwigTemplate_49f9df8457abc56740de62f5aeb216aa extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/navigation/nav_default.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/navigation/nav_default.html5"));

        // line 1
        yield "<ul class=\"vlist <?php echo \$this->level; ?>\">
<?php foreach (\$this->items as \$item): ?>  
<?php 
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
<li class=\"mlist<?php if (\$item['class']): ?> <?= \$item['class']; ?><?php endif; ?><?php if(\$item['isActive']): ?> mm-selected Selected<?php endif; ?> <?= \$item['type']; ?>\"><a href=\"<?= \$item['href'] ?: './' ?>\" title=\"<?php echo \$item['pageTitle'] ? \$item['pageTitle'] : \$item['title']; ?>\" class=\"a-<?php echo \$this->level; ?><?php if (\$item['class']): ?> <?= \$item['class']; ?><?php endif; ?> <?= \$item['type']; ?>\"<?php if (\$item['accesskey'] != ''): ?> accesskey=\"<?php echo \$item['accesskey']; ?>\"<?php endif; ?><?= \$item['rel'] ?? '' ?><?php echo \$item['target']; ?>><?php if(\$item['addFontIcon']): ?><i class=\"<?= \$item['fontIcon']; ?>\"></i><?php endif; ?><?php echo \$item['link']; ?></a><?php echo \$item['subitems']; ?></li>
<?php endforeach; ?>
</ul>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/navigation/nav_default.html5";
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
        return new Source("<ul class=\"vlist <?php echo \$this->level; ?>\">
<?php foreach (\$this->items as \$item): ?>  
<?php 
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
<li class=\"mlist<?php if (\$item['class']): ?> <?= \$item['class']; ?><?php endif; ?><?php if(\$item['isActive']): ?> mm-selected Selected<?php endif; ?> <?= \$item['type']; ?>\"><a href=\"<?= \$item['href'] ?: './' ?>\" title=\"<?php echo \$item['pageTitle'] ? \$item['pageTitle'] : \$item['title']; ?>\" class=\"a-<?php echo \$this->level; ?><?php if (\$item['class']): ?> <?= \$item['class']; ?><?php endif; ?> <?= \$item['type']; ?>\"<?php if (\$item['accesskey'] != ''): ?> accesskey=\"<?php echo \$item['accesskey']; ?>\"<?php endif; ?><?= \$item['rel'] ?? '' ?><?php echo \$item['target']; ?>><?php if(\$item['addFontIcon']): ?><i class=\"<?= \$item['fontIcon']; ?>\"></i><?php endif; ?><?php echo \$item['link']; ?></a><?php echo \$item['subitems']; ?></li>
<?php endforeach; ?>
</ul>", "@pct_theme_templates/navigation/nav_default.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/navigation/nav_default.html5");
    }
}
