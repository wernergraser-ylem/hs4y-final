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

/* @pct_theme_templates/navigation/nav_mainmenu.html5 */
class __TwigTemplate_c1238a257410e486ced02af242037a41 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/navigation/nav_mainmenu.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/navigation/nav_mainmenu.html5"));

        // line 1
        yield "<?php
\$floatLeftOpen = false;
\$floatRightOpen = false;
?>
<ul class=\"vlist <?= \$this->level; ?>\">
<?php foreach (\$this->items as \$i => \$item): ?>
\t<?php if( \$item['visibility_css'] )
\t{
\t\t\$item['class'] .= ' '.\$item['visibility_css'];
\t}
\tif( \$item['addFontIcon'] && !empty('fontIcon') )
\t{
\t\t\$item['class'] .= ' hasIcon';
\t}
\tif( isset(\$item['helper_css']) && !empty(\$item['helper_css']) )
\t{
\t\t\$item['class'] .= ' '.\\implode(' ',\\Contao\\StringUtil::deserialize( \$item['helper_css'] ) );
\t}

\t\$item['class'] .= ' '.\$this->level.' page_'.\$item['id'];
\tif( !isset(\$item['subitems']) )
\t{
\t\t\$item['subitems'] = '';
\t}
\t?>
    <?php // opening floatbox
\t\$arrClass = array_filter(explode(' ',\$item['class']));
\t\$arrNextClass = array_filter(explode(' ', isset(\$this->items[\$i+1]['class']) ? \$this->items[\$i+1]['class'] : ''));
\t?>

\t<?php if(in_array('float_left',\$arrClass) && !\$floatLeftOpen): ?>
\t<li class=\"float_left floatbox sibling\"><ol class=\"inner\">
\t<?php \$floatLeftOpen = true; endif; ?>
\t
\t<?php if(in_array('float_right',\$arrClass) && !\$floatRightOpen): ?>
\t<li class=\"float_right floatbox sibling\"><ol class=\"inner\">
\t<?php \$floatRightOpen = true; endif; ?>
\t<li class=\"mlist <?= \$item['type']; ?><?php if (\$item['class']): ?> <?= \$item['class']; ?><?php endif; ?> <?php if(\$item['isActive']): ?>mm-selected Selected<?php endif; ?>\">
\t\t<a href=\"<?= \$item['href'] ?: './' ?>\" title=\"<?= \$item['pageTitle'] ? \$item['pageTitle'] : \$item['title']; ?>\" class=\"mainmenu_link a-<?= \$this->level; ?> <?= \$item['type']; ?><?php if (\$item['class']): ?> <?= \$item['class']; ?><?php endif; ?><?php if (\$item['addFontIcon']): ?> nav-icon<?php endif; ?>\"<?php if (\$item['accesskey'] != ''): ?> accesskey=\"<?= \$item['accesskey']; ?>\"<?php endif; ?><?php if (isset(\$item['tabindex'])): ?> tabindex=\"<?= \$item['tabindex']; ?>\"<?php endif; ?><?= \$item['rel'] ?? '' ?><?= \$item['target']; ?>><?php if(\$item['addFontIcon']): ?><i class=\"<?= \$item['fontIcon']; ?>\"></i><?php endif; ?><span><?= \$item['link']; ?><?php if (\$item['ribbon']): ?><span class=\"ribbon\"><?= \$item['ribbon']; ?></span><?php endif; ?></span></a>
\t\t<?= \$item['subitems']; ?>
\t</li>
\t<?php //  closing floatbox
\tif(\$floatLeftOpen && !in_array('float_left', \$arrNextClass)) :?>
\t</ol></li>
\t<?php \$floatLeftOpen = false; endif; ?>
\t
\t<?php if(\$floatRightOpen && !in_array('float_right',\$arrNextClass)): ?>
\t</ol></li>
\t<?php \$floatRightOpen = false; endif; ?>

<?php endforeach; ?>
</ul>
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
        return "@pct_theme_templates/navigation/nav_mainmenu.html5";
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
\$floatLeftOpen = false;
\$floatRightOpen = false;
?>
<ul class=\"vlist <?= \$this->level; ?>\">
<?php foreach (\$this->items as \$i => \$item): ?>
\t<?php if( \$item['visibility_css'] )
\t{
\t\t\$item['class'] .= ' '.\$item['visibility_css'];
\t}
\tif( \$item['addFontIcon'] && !empty('fontIcon') )
\t{
\t\t\$item['class'] .= ' hasIcon';
\t}
\tif( isset(\$item['helper_css']) && !empty(\$item['helper_css']) )
\t{
\t\t\$item['class'] .= ' '.\\implode(' ',\\Contao\\StringUtil::deserialize( \$item['helper_css'] ) );
\t}

\t\$item['class'] .= ' '.\$this->level.' page_'.\$item['id'];
\tif( !isset(\$item['subitems']) )
\t{
\t\t\$item['subitems'] = '';
\t}
\t?>
    <?php // opening floatbox
\t\$arrClass = array_filter(explode(' ',\$item['class']));
\t\$arrNextClass = array_filter(explode(' ', isset(\$this->items[\$i+1]['class']) ? \$this->items[\$i+1]['class'] : ''));
\t?>

\t<?php if(in_array('float_left',\$arrClass) && !\$floatLeftOpen): ?>
\t<li class=\"float_left floatbox sibling\"><ol class=\"inner\">
\t<?php \$floatLeftOpen = true; endif; ?>
\t
\t<?php if(in_array('float_right',\$arrClass) && !\$floatRightOpen): ?>
\t<li class=\"float_right floatbox sibling\"><ol class=\"inner\">
\t<?php \$floatRightOpen = true; endif; ?>
\t<li class=\"mlist <?= \$item['type']; ?><?php if (\$item['class']): ?> <?= \$item['class']; ?><?php endif; ?> <?php if(\$item['isActive']): ?>mm-selected Selected<?php endif; ?>\">
\t\t<a href=\"<?= \$item['href'] ?: './' ?>\" title=\"<?= \$item['pageTitle'] ? \$item['pageTitle'] : \$item['title']; ?>\" class=\"mainmenu_link a-<?= \$this->level; ?> <?= \$item['type']; ?><?php if (\$item['class']): ?> <?= \$item['class']; ?><?php endif; ?><?php if (\$item['addFontIcon']): ?> nav-icon<?php endif; ?>\"<?php if (\$item['accesskey'] != ''): ?> accesskey=\"<?= \$item['accesskey']; ?>\"<?php endif; ?><?php if (isset(\$item['tabindex'])): ?> tabindex=\"<?= \$item['tabindex']; ?>\"<?php endif; ?><?= \$item['rel'] ?? '' ?><?= \$item['target']; ?>><?php if(\$item['addFontIcon']): ?><i class=\"<?= \$item['fontIcon']; ?>\"></i><?php endif; ?><span><?= \$item['link']; ?><?php if (\$item['ribbon']): ?><span class=\"ribbon\"><?= \$item['ribbon']; ?></span><?php endif; ?></span></a>
\t\t<?= \$item['subitems']; ?>
\t</li>
\t<?php //  closing floatbox
\tif(\$floatLeftOpen && !in_array('float_left', \$arrNextClass)) :?>
\t</ol></li>
\t<?php \$floatLeftOpen = false; endif; ?>
\t
\t<?php if(\$floatRightOpen && !in_array('float_right',\$arrNextClass)): ?>
\t</ol></li>
\t<?php \$floatRightOpen = false; endif; ?>

<?php endforeach; ?>
</ul>
", "@pct_theme_templates/navigation/nav_mainmenu.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/navigation/nav_mainmenu.html5");
    }
}
