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

/* @pct_theme_templates/customcatalog/customcatalog_hotelapart_rooms_list.html5 */
class __TwigTemplate_b709305886b463445a763d8d35946bd1 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_hotelapart_rooms_list.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_hotelapart_rooms_list.html5"));

        // line 1
        yield "<?php if(!\$this->empty): ?>
<div class=\"item-wrapper autogrid_wrapper block\">
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"block autogrid one_third <?= \$entry->class; ?> <?php if(\$entry->field('highlight')->value()): ?> item-highlight<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t
\t\t<div class=\"item-inside block\">
\t\t\t
\t\t\t<div class=\"item-price-wrap\">
\t\t\t\t<div class=\"item-price-label\">ab <span class=\"item-price color-accent\"><?php echo \$entry->field('price')->value(); ?> &euro;</span></div>
\t\t\t\t<div class=\"item-price-add\">pro Person/Nacht</div>
\t\t\t</div>
\t\t\t
\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a>
\t\t\t<?php if(\$entry->field('highlight')->value()): ?> <i class=\"item-highlight-icon fa fa-star bg-accent\"></i><?php endif; ?>


\t\t\t<div class=\"item-content\">
\t\t\t\t<div class=\"item-top-wrap\">
\t\t\t\t\t<div class=\"item-headline\">
\t\t\t\t\t\t<h5><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('name')->value(); ?></a></h5>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"item-persons\">
\t\t\t\t\t\tGr&ouml;sse: <?php echo \$entry->field('size')->value(); ?>m², f&uuml;r <?php echo \$entry->field('persons')->value(); ?>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"item-features\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_wifi')->value()): ?><li><i class=\"fa fa-wifi bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_accessibility')->value()): ?><li><i class=\"fa fa-wheelchair bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_restaurant')->value()): ?><li><i class=\"fa fa-cutlery bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_cabel_tv')->value()): ?><li><i class=\"fa fa-desktop bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"item-description\">
\t\t\t\t\t<?php echo \$entry->field('short_description')->value(); ?>
\t\t\t\t\t<?php echo \$entry->field('rating')->html(); ?>
\t\t\t\t</div>
\t\t\t\t
\t\t\t</div>
\t\t\t
\t\t</div>
\t\t\t
\t</div>

<?php endforeach; ?>
</div>\t\t
<?php else: ?>
<p class=\"info empty\">Keine Package gefunden</p>
<?php endif;?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_hotelapart_rooms_list.html5";
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
        return new Source("<?php if(!\$this->empty): ?>
<div class=\"item-wrapper autogrid_wrapper block\">
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"block autogrid one_third <?= \$entry->class; ?> <?php if(\$entry->field('highlight')->value()): ?> item-highlight<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t
\t\t<div class=\"item-inside block\">
\t\t\t
\t\t\t<div class=\"item-price-wrap\">
\t\t\t\t<div class=\"item-price-label\">ab <span class=\"item-price color-accent\"><?php echo \$entry->field('price')->value(); ?> &euro;</span></div>
\t\t\t\t<div class=\"item-price-add\">pro Person/Nacht</div>
\t\t\t</div>
\t\t\t
\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a>
\t\t\t<?php if(\$entry->field('highlight')->value()): ?> <i class=\"item-highlight-icon fa fa-star bg-accent\"></i><?php endif; ?>


\t\t\t<div class=\"item-content\">
\t\t\t\t<div class=\"item-top-wrap\">
\t\t\t\t\t<div class=\"item-headline\">
\t\t\t\t\t\t<h5><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('name')->value(); ?></a></h5>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"item-persons\">
\t\t\t\t\t\tGr&ouml;sse: <?php echo \$entry->field('size')->value(); ?>m², f&uuml;r <?php echo \$entry->field('persons')->value(); ?>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"item-features\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_wifi')->value()): ?><li><i class=\"fa fa-wifi bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_accessibility')->value()): ?><li><i class=\"fa fa-wheelchair bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_restaurant')->value()): ?><li><i class=\"fa fa-cutlery bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t\t<?php if (\$entry->field('list_cabel_tv')->value()): ?><li><i class=\"fa fa-desktop bg-accent\"></i></li><?php endif;?>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"item-description\">
\t\t\t\t\t<?php echo \$entry->field('short_description')->value(); ?>
\t\t\t\t\t<?php echo \$entry->field('rating')->html(); ?>
\t\t\t\t</div>
\t\t\t\t
\t\t\t</div>
\t\t\t
\t\t</div>
\t\t\t
\t</div>

<?php endforeach; ?>
</div>\t\t
<?php else: ?>
<p class=\"info empty\">Keine Package gefunden</p>
<?php endif;?>", "@pct_theme_templates/customcatalog/customcatalog_hotelapart_rooms_list.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_hotelapart_rooms_list.html5");
    }
}
