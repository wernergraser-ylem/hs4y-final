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

/* @pct_customelements_plugin_customcatalog/backend/be_nav_default.html5 */
class __TwigTemplate_df5f07982d45f8b5fb1f28643be3a960 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/backend/be_nav_default.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/backend/be_nav_default.html5"));

        // line 1
        yield "
<ul class=\"<?php echo \$this->level; ?> <?php if(\$this->class):?><?php echo \$this->class; ?><?php endif;?>\" role=\"<?php echo (\$this->level == 'level_1') ? 'menubar' : 'menu'; ?>\">
  <?php foreach (\$this->items as \$item): ?>
     <li<?php if (\$item['class']): ?> class=\"<?php echo \$item['class']; ?><?php if(\$item['is_active']):?> open<?php endif;?>\"<?php endif; ?> <?php echo \$item['attributes']; ?>><a href=\"<?php echo \$item['href']; ?>\" title=\"<?php echo \$item['title']; ?>\"<?php if (\$item['class']): ?> class=\"<?php echo \$item['class']; ?>\"<?php endif; ?><?php echo \$item['target']; ?> role=\"menuitem\"<?php if(!empty(\$item['subitems'])): ?> aria-haspopup=\"true\"<?php endif; ?>><?php if(\$item['icon']): ?><i class=\"icon <?php echo \$item['icon']; ?>\"></i><?php endif;?><?php echo \$item['link']; ?></a><?php echo \$item['subitems']; ?><?php if(!empty(\$item['subitems'])): ?><span class=\"open_subnav fa fa-plus-square-o <?php if(\$item['is_active']):?> open<?php endif;?>\" <?php echo \$item['attributes']; ?>>&nbsp;</span><?php endif;?></li>
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
        return "@pct_customelements_plugin_customcatalog/backend/be_nav_default.html5";
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
        return new Source("
<ul class=\"<?php echo \$this->level; ?> <?php if(\$this->class):?><?php echo \$this->class; ?><?php endif;?>\" role=\"<?php echo (\$this->level == 'level_1') ? 'menubar' : 'menu'; ?>\">
  <?php foreach (\$this->items as \$item): ?>
     <li<?php if (\$item['class']): ?> class=\"<?php echo \$item['class']; ?><?php if(\$item['is_active']):?> open<?php endif;?>\"<?php endif; ?> <?php echo \$item['attributes']; ?>><a href=\"<?php echo \$item['href']; ?>\" title=\"<?php echo \$item['title']; ?>\"<?php if (\$item['class']): ?> class=\"<?php echo \$item['class']; ?>\"<?php endif; ?><?php echo \$item['target']; ?> role=\"menuitem\"<?php if(!empty(\$item['subitems'])): ?> aria-haspopup=\"true\"<?php endif; ?>><?php if(\$item['icon']): ?><i class=\"icon <?php echo \$item['icon']; ?>\"></i><?php endif;?><?php echo \$item['link']; ?></a><?php echo \$item['subitems']; ?><?php if(!empty(\$item['subitems'])): ?><span class=\"open_subnav fa fa-plus-square-o <?php if(\$item['is_active']):?> open<?php endif;?>\" <?php echo \$item['attributes']; ?>>&nbsp;</span><?php endif;?></li>
  <?php endforeach; ?>
</ul>", "@pct_customelements_plugin_customcatalog/backend/be_nav_default.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/backend/be_nav_default.html5");
    }
}
