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

/* @pct_iconpicker/be_widget_iconpicker.html5 */
class __TwigTemplate_aeeb175fb3b73263538dd0697a3d95dc extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_iconpicker/be_widget_iconpicker.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_iconpicker/be_widget_iconpicker.html5"));

        // line 1
        yield "<?php
/**
 * IconPicker Widget template file
 */
?>

<?php
\$intCols = 5;
?>

<?php if(!empty(\$this->files) && !empty(\$this->styles)): ?>
<?php // add css files to page to display the font icons
foreach(\$this->files as \$file)
{
\t\$GLOBALS['TL_CSS'][] = \$file;
}
?>

<div id=\"<?= \$this->strId; ?>\" class=\"iconpicker\">

<form action=\"<?php echo \$this->action; ?>\" method=\"post\">

<?php foreach(\$this->styles as \$file => \$styles): ?>\t
<h2><?php echo basename(\$file); ?></h2>
<ul>
\t<?php foreach(\$styles as \$i => \$element): ?>
\t<li>
\t\t<div class=\"iconbox\">
\t\t\t<div class=\"icon <?php echo \$element['class']; ?>\"></div>
\t\t\t<div class=\"name\"><?php echo \$element['label']; ?></div>\t
\t\t\t<div class=\"radio_container\">
\t\t\t<input type=\"radio\" name=\"icon\" id=\"icon_<?= \$element['class']; ?>\" value=\"<?= \$element['class']; ?>\" <?php if(\$this->value == \$element['class']): ?>checked<?php endif;?>>
\t\t\t</div>
\t\t</div>
\t</li>
\t<?php endforeach; ?>
</ul>
<?php endforeach; ?>
</form>
</div>
<?php else: ?>
<p class=\"info\"><?php echo \$this->empty; ?></p>
<?php endif; ?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_iconpicker/be_widget_iconpicker.html5";
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
 * IconPicker Widget template file
 */
?>

<?php
\$intCols = 5;
?>

<?php if(!empty(\$this->files) && !empty(\$this->styles)): ?>
<?php // add css files to page to display the font icons
foreach(\$this->files as \$file)
{
\t\$GLOBALS['TL_CSS'][] = \$file;
}
?>

<div id=\"<?= \$this->strId; ?>\" class=\"iconpicker\">

<form action=\"<?php echo \$this->action; ?>\" method=\"post\">

<?php foreach(\$this->styles as \$file => \$styles): ?>\t
<h2><?php echo basename(\$file); ?></h2>
<ul>
\t<?php foreach(\$styles as \$i => \$element): ?>
\t<li>
\t\t<div class=\"iconbox\">
\t\t\t<div class=\"icon <?php echo \$element['class']; ?>\"></div>
\t\t\t<div class=\"name\"><?php echo \$element['label']; ?></div>\t
\t\t\t<div class=\"radio_container\">
\t\t\t<input type=\"radio\" name=\"icon\" id=\"icon_<?= \$element['class']; ?>\" value=\"<?= \$element['class']; ?>\" <?php if(\$this->value == \$element['class']): ?>checked<?php endif;?>>
\t\t\t</div>
\t\t</div>
\t</li>
\t<?php endforeach; ?>
</ul>
<?php endforeach; ?>
</form>
</div>
<?php else: ?>
<p class=\"info\"><?php echo \$this->empty; ?></p>
<?php endif; ?>", "@pct_iconpicker/be_widget_iconpicker.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_iconpicker/templates/be_widget_iconpicker.html5");
    }
}
