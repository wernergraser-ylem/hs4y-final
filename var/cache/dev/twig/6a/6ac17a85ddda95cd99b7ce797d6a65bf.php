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

/* @pct_customelements/backend/be_tl_customelement_group.html5 */
class __TwigTemplate_842ce3d40f897efcb8c0caac7ba65251 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/backend/be_tl_customelement_group.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/backend/be_tl_customelement_group.html5"));

        // line 1
        yield "<?php
/**
 * Backend template for tl_pct_customelement_group list
 */
?>

<div class=\"tl_content_left tl_customelement_group  <?php echo (\$this->row['published'] ? '' : 'unpublished'); ?> <?php echo (\$this->row['isLegend'] ?? 'is_legend'); ?>\">
<div id=\"customelement_group_<?php echo \$this->row['id']; ?>\" class=\"group_title active <?php echo(!empty(\$this->childs) > 0 ? 'hasChilds' : 'empty')?>\"><?php echo \$this->row['title']; ?></div>
<div id=\"slide_<?php echo \$this->row['id']; ?>\" class=\"slide active\">
<?php if(!empty(\$this->childs)):?>
<ul class=\"child_list\">
<?php foreach(\$this->childs as \$child): ?>
<li class=\"field field_<?php echo \$child['id']; ?> <?php echo (\$child['published'] ? '' : 'unpublished'); ?>\">
\t<div class=\"col left\">
\t\t<span class=\"title\"><?php echo \$child['title']; ?></span>
\t\t[<span class=\"definition italic\"><?php echo \$child['type']; ?> <?php echo \$child['alias']; ?></span>]
\t</div>
\t<div class=\"col right buttons\">
\t\t<span class=\"edit\"><?php echo \$child['__edit__']; ?></span>
\t\t<span class=\"delete\"><?php echo \$child['__delete__']; ?></span>
\t\t<span class=\"toggle\"><?php echo \$child['__toggle__']; ?></span>
\t</div>
</li>
<?php endforeach; ?>
</ul>
<?php else: ?>
<p class=\"empty\"><?php echo \$this->empty; ?></p>
<?php endif;?>
</div>
</div>

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
        return "@pct_customelements/backend/be_tl_customelement_group.html5";
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
/**
 * Backend template for tl_pct_customelement_group list
 */
?>

<div class=\"tl_content_left tl_customelement_group  <?php echo (\$this->row['published'] ? '' : 'unpublished'); ?> <?php echo (\$this->row['isLegend'] ?? 'is_legend'); ?>\">
<div id=\"customelement_group_<?php echo \$this->row['id']; ?>\" class=\"group_title active <?php echo(!empty(\$this->childs) > 0 ? 'hasChilds' : 'empty')?>\"><?php echo \$this->row['title']; ?></div>
<div id=\"slide_<?php echo \$this->row['id']; ?>\" class=\"slide active\">
<?php if(!empty(\$this->childs)):?>
<ul class=\"child_list\">
<?php foreach(\$this->childs as \$child): ?>
<li class=\"field field_<?php echo \$child['id']; ?> <?php echo (\$child['published'] ? '' : 'unpublished'); ?>\">
\t<div class=\"col left\">
\t\t<span class=\"title\"><?php echo \$child['title']; ?></span>
\t\t[<span class=\"definition italic\"><?php echo \$child['type']; ?> <?php echo \$child['alias']; ?></span>]
\t</div>
\t<div class=\"col right buttons\">
\t\t<span class=\"edit\"><?php echo \$child['__edit__']; ?></span>
\t\t<span class=\"delete\"><?php echo \$child['__delete__']; ?></span>
\t\t<span class=\"toggle\"><?php echo \$child['__toggle__']; ?></span>
\t</div>
</li>
<?php endforeach; ?>
</ul>
<?php else: ?>
<p class=\"empty\"><?php echo \$this->empty; ?></p>
<?php endif;?>
</div>
</div>

", "@pct_customelements/backend/be_tl_customelement_group.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/backend/be_tl_customelement_group.html5");
    }
}
