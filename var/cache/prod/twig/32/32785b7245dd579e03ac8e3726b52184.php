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

/* @pct_themer/themedesigner/td_section.html5 */
class __TwigTemplate_373cb42c82f2e2c9395e9b8b23045609 extends Template
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
        yield "
<?php 
\$blnSwitchChildsOpen = false;
\$arrSwitchChilds = array();
?>

<ul class=\"section section_<?= \$this->section; ?><?php if(\$this->isActive):?> active<?php endif;?>\" data-section=\"<?= \$this->section; ?>\">
\t
\t<?php foreach(\$this->palettes as \$palette => \$data): ?>
\t<?php 
\t\$cssId = 'id=\"'.strtolower(\$this->section).'_'.\$palette.'\"';\t
\t?>
\t<div <?php if(\$cssId):?><?= \$cssId; ?><?php endif; ?> <?php if(\$data['isAccordion']): ?>data-init_slider=\"1\"<?php endif; ?> data-palette=\"<?= \$palette; ?>\" data-section=\"<?= \$this->section; ?>\" class=\"palette_wrapper <?php if(\$data['isActive']):?> active<?php endif; ?><?php if(!\$data['isDevice']):?> hidden<?php endif; ?>\"<?php if(!empty(\$data['devices'])): ?> data-devices=\"<?= \$data['devices']; ?>\"<?php endif; ?>>
\t<div class=\"td_toggler<?php if(\$data['isActive']):?> active<?php endif; ?><?php if(empty(\$data['fields'])):?> empty label<?php endif; ?>\"><?= \$data['toggler_label']; ?></div>
\t\t
\t\t<?php if( empty(\$data['fields']) === false ): ?>
\t\t<ul class=\"td_palette <?php if(\$data['class']):?>td_palette_<?= \$data['class']; ?><?php endif; ?> <?php if(\$data['isActive']):?>active<?php endif; ?>\">
\t\t\t<?php foreach(\$data['fields'] as \$fieldname => \$field): ?>
\t\t\t
\t\t\t<?php // child switch container
\t\t\tif(\$field['isFirstChildSwitch']): ?>
\t\t\t<ul class=\"switch_childs<?php if(\$field['parentSwitch']['isActive']): ?> active<?php endif; ?>\">
\t\t\t<li class=\"overlay\"></li>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<li class=\"field <?= \$fieldname; ?><?php if(\$field['isActive']): ?> active<?php endif; ?><?php if(\$field['isChildSwitch']): ?> switch_sibling<?php endif;?><?php if(!\$field['isDevice']): ?> hidden<?php endif; ?>\"<?php if(!empty(\$field['devices'])): ?> data-devices=\"<?= \$field['devices']; ?>\"<?php endif; ?>>
\t\t\t\t<?php if(\$field['switch']): ?>
\t\t\t\t<div data-init_switch=\"1\" data-name=\"<?= \$field['switch']; ?>\" data-switch=\"<?= \$field['switch']; ?>\" class=\"switch<?php if(\$field['isActive']): ?> active<?php endif; ?>\"><span><?= \$field['name']; ?></span></div>
\t\t\t\t<?php endif; ?>
\t\t\t\t<?php if(\$field['html']): ?><?= \$field['html']; ?><?php endif; ?>
\t\t\t\t<div class=\"overlay\"></div>
\t\t\t</li>
\t\t\t
\t\t\t<?php if(\$field['isLastChildSwitch']): ?>
\t\t\t</ul>
\t\t\t<?php endif; ?>
\t\t\t\t\t\t
\t\t\t<?php endforeach; ?>
\t\t</ul>
\t\t<?php endif; ?>
\t</div>
\t<?php endforeach; ?>\t
</ul>
<div class=\"clear\"></div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/td_section.html5";
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
        return new Source("", "@pct_themer/themedesigner/td_section.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/td_section.html5");
    }
}
