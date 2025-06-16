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

/* @pct_theme_templates/customelements/customelement_testimonial.html5 */
class __TwigTemplate_c2eccb3a8fc4c24bccc253e06e6512b8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_testimonial.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_testimonial.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_testimonial.css|static';
?>
<?php if(\$this->field('schema')->value() == 'version6'): ?>

<div class=\"<?php echo \$this->class; ?> block ce_testimonial_<?php echo \$this->field('schema')->value(); ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_testimonial_inside\">
\t\t<?php echo \$this->field('image')->html(); ?>
      <?php if(\$this->field('rating')->value()): ?>
\t\t<div class=\"rating\">
   \t\t<?php if(\$this->field('rating')->value() == 'star1'): ?><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star2'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star3'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star4'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star5'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
\t\t</div>
\t\t<?php endif; ?>\t
\t\t<div class=\"text font_serif_2\"><?php echo \$this->field('text')->value(); ?></div>
\t\t<i class=\"fa fa-quote-right\"></i>
\t\t<div class=\"info\">
\t\t\t
\t\t\t<div class=\"name font_headline\"><?php echo \$this->field('name')->value(); ?></div>
\t\t\t<div class=\"additional font_serif_2\">
\t\t\t\t
\t\t\t\t<?php echo \$this->field('function')->value(); ?>
\t\t\t\t
\t\t\t\t<?php if(\$this->field('link')->value()): ?>
\t\t\t\t<a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>>
\t\t\t\t<?php endif; ?>
\t\t
\t\t\t\t<?php echo \$this->field('company')->value(); ?>
\t\t
\t\t\t\t<?php if(\$this->field('link')->value()): ?>
\t\t\t\t</a>
\t\t\t\t<?php endif; ?>\t
\t\t\t\t
\t\t\t</div>\t
\t\t</div>
\t</div>
</div>

<?php else: ?>\t
\t
<div class=\"<?php echo \$this->class; ?> block ce_testimonial_<?php echo \$this->field('schema')->value(); ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_testimonial_inside\">
      <?php if(\$this->field('rating')->value()): ?>
      <div class=\"rating\">
   \t\t<?php if(\$this->field('rating')->value() == 'star1'): ?><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star2'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star3'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star4'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star5'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
\t\t</div>
\t\t<?php endif; ?>\t
\t\t<div class=\"text\"><div class=\"text_inside\"><?php echo \$this->field('text')->value(); ?></div></div>
\t\t<div class=\"info\">
\t\t\t<?php echo \$this->field('image')->html(); ?>
\t\t\t<div class=\"name\">— <?php echo \$this->field('name')->value(); ?></div>
\t\t\t<div class=\"additional\">
\t\t\t\t
\t\t\t\t<?php echo \$this->field('function')->value(); ?>
\t\t\t\t
\t\t\t\t<?php if(\$this->field('link')->value()): ?>
\t\t\t\t<a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>>
\t\t\t\t<?php endif; ?>
\t\t
\t\t\t\t<?php echo \$this->field('company')->value(); ?>
\t\t
\t\t\t\t<?php if(\$this->field('link')->value()): ?>
\t\t\t\t</a>
\t\t\t\t<?php endif; ?>\t
\t\t\t\t
\t\t\t</div>\t
\t\t</div>
\t</div>
</div>

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
        return "@pct_theme_templates/customelements/customelement_testimonial.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_testimonial.css|static';
?>
<?php if(\$this->field('schema')->value() == 'version6'): ?>

<div class=\"<?php echo \$this->class; ?> block ce_testimonial_<?php echo \$this->field('schema')->value(); ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_testimonial_inside\">
\t\t<?php echo \$this->field('image')->html(); ?>
      <?php if(\$this->field('rating')->value()): ?>
\t\t<div class=\"rating\">
   \t\t<?php if(\$this->field('rating')->value() == 'star1'): ?><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star2'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star3'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star4'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star5'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
\t\t</div>
\t\t<?php endif; ?>\t
\t\t<div class=\"text font_serif_2\"><?php echo \$this->field('text')->value(); ?></div>
\t\t<i class=\"fa fa-quote-right\"></i>
\t\t<div class=\"info\">
\t\t\t
\t\t\t<div class=\"name font_headline\"><?php echo \$this->field('name')->value(); ?></div>
\t\t\t<div class=\"additional font_serif_2\">
\t\t\t\t
\t\t\t\t<?php echo \$this->field('function')->value(); ?>
\t\t\t\t
\t\t\t\t<?php if(\$this->field('link')->value()): ?>
\t\t\t\t<a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>>
\t\t\t\t<?php endif; ?>
\t\t
\t\t\t\t<?php echo \$this->field('company')->value(); ?>
\t\t
\t\t\t\t<?php if(\$this->field('link')->value()): ?>
\t\t\t\t</a>
\t\t\t\t<?php endif; ?>\t
\t\t\t\t
\t\t\t</div>\t
\t\t</div>
\t</div>
</div>

<?php else: ?>\t
\t
<div class=\"<?php echo \$this->class; ?> block ce_testimonial_<?php echo \$this->field('schema')->value(); ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_testimonial_inside\">
      <?php if(\$this->field('rating')->value()): ?>
      <div class=\"rating\">
   \t\t<?php if(\$this->field('rating')->value() == 'star1'): ?><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star2'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star3'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star4'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
   \t\t<?php if(\$this->field('rating')->value() == 'star5'): ?><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><?php endif; ?>\t
\t\t</div>
\t\t<?php endif; ?>\t
\t\t<div class=\"text\"><div class=\"text_inside\"><?php echo \$this->field('text')->value(); ?></div></div>
\t\t<div class=\"info\">
\t\t\t<?php echo \$this->field('image')->html(); ?>
\t\t\t<div class=\"name\">— <?php echo \$this->field('name')->value(); ?></div>
\t\t\t<div class=\"additional\">
\t\t\t\t
\t\t\t\t<?php echo \$this->field('function')->value(); ?>
\t\t\t\t
\t\t\t\t<?php if(\$this->field('link')->value()): ?>
\t\t\t\t<a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?>>
\t\t\t\t<?php endif; ?>
\t\t
\t\t\t\t<?php echo \$this->field('company')->value(); ?>
\t\t
\t\t\t\t<?php if(\$this->field('link')->value()): ?>
\t\t\t\t</a>
\t\t\t\t<?php endif; ?>\t
\t\t\t\t
\t\t\t</div>\t
\t\t</div>
\t</div>
</div>

<?php endif; ?>", "@pct_theme_templates/customelements/customelement_testimonial.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_testimonial.html5");
    }
}
