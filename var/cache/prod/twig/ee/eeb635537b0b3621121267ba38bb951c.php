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

/* @pct_theme_templates/customelements/customelement_text_extented.html5 */
class __TwigTemplate_51fc525749bb8dea6c57551c8a102918 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_text_extented.css|static';
// Ursprünglicher Wert aus der Eingabe
\$original_value = \$this->field('font_size')->value();

// Mapping-Array, das die alten Werte auf die neuen Werte abbildet
\$mapping = [
    'font-size-default' => 'font-size-0',
    'font-size-xxxxxl' => 'font-size-10',
    'font-size-xxxxl' => 'font-size-9',
    'font-size-xxxl' => 'font-size-8',
    'font-size-xxl' => 'font-size-7',
    'font-size-xl' => 'font-size-6',
    'font-size-l' => 'font-size-5',
    'font-size-m' => 'font-size-4',
    'font-size-s' => 'font-size-3',
    'font-size-xs' => 'font-size-2',
    'font-size-xxs' => 'font-size-1',
    'font-size-xxxs' => 'font-size-0',
    'font-size-xxxxs' => 'font-size-neg-1',
    'font-size-xxxxxs' => 'font-size-neg-2',
];

// Überprüfen, ob der ursprüngliche Wert im Mapping-Array existiert und entsprechend ändern
\$fontSize = isset(\$mapping[\$original_value]) ? \$mapping[\$original_value] : \$original_value;
?>
<div class=\"<?php echo \$this->class; ?> block<?php if(\$this->field('align')->value()): ?> <?php echo \$this->field('align')->value(); ?><?php endif; ?><?php if(\$this->field('color')->value()): ?> <?php echo \$this->field('color')->value(); ?><?php endif; ?><?php if(\$this->field('font')->value()): ?> <?php echo \$this->field('font')->value(); ?><?php endif; ?><?php if(\$this->field('style')->value()): ?> <?php echo \$this->field('style')->value(); ?><?php endif; ?><?php if(\$this->field('line_height')->value()): ?> <?php echo \$this->field('line_height')->value(); ?><?php endif; ?><?php if(\$this->field('font_weight')->value()): ?> <?php echo \$this->field('font_weight')->value(); ?><?php endif; ?><?php if(\$this->field('align_m')->value()): ?> <?php echo \$this->field('align_m')->value(); ?><?php endif; ?> <?php echo \$fontSize ?>\" <?php echo \$this->cssID; ?><?php if(\$this->field('max_width')->value()): ?> style=\"max-width:<?php echo \$this->field('max_width')->value(); ?>px;\"<?php endif; ?>>
\t<?php echo \$this->field('text')->html(); ?>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_text_extented.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_text_extented.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_text_extented.html5");
    }
}
