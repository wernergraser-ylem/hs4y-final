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

/* @pct_theme_templates/customelements/customelement_rotatingwords.html5 */
class __TwigTemplate_6033d3b4c07e3767c392f21b2f1f4d60 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_rotatingwords.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_rotatingwords.html5"));

        // line 1
        yield "<?php

use Contao\\StringUtil;
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_rotating_words.css';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/core.js';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/rotatingwords/js/scripts.js';

\$element = \$this->field('markup')->value();
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}
?>
<<?= \$element; ?> <?= \$this->cssID; ?> class=\"<?= \$this->class; ?> ce_rotating_words_<?= \$this->id;?> <?= str_replace('.', '', \$this->field('markup')->value()); ?>\" 
data-align=\"<?= \$this->field('align')->value(); ?>\" 
data-color=\"<?= \$this->field('color')->value(); ?>\" 
data-color-highlighted=\"<?= \$this->field('color_highlighted')->value(); ?>\" 
data-speed=\"<?= \$this->field('speed')->value(); ?>\"
>
\t<div class=\"rotating-words-container\">
\t\t<?php if( \$this->field('text_begin')->value() ): ?>
\t\t<span><?= \$this->field('text_begin')->html('customelement_attr_raw'); ?></span>
\t\t<?php endif; ?>
\t\t<span class=\"rotating-words\">
\t\t\t<?php 
\t\t\t\$words = StringUtil::deserialize( \$this->field('effect_words')->value() ) ?? array();
\t\t\t?>
\t\t\t<?php foreach(\$words as \$i => \$word): ?>
\t\t\t\t<span class=\"word <?php if(\$i == 0): ?>active<?php endif; ?>\"><span class=\"mask\"><?= \$word; ?></span></span>
\t\t\t<?php endforeach; ?>
\t\t</span>
\t\t<?php if( \$this->field('text_end')->value() ): ?>
\t\t<span><?= \$this->field('text_end')->html('customelement_attr_raw'); ?></span>
\t\t<?php endif; ?>
        </span>
\t</div>
</<?= \$element; ?>>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() {
    setTimeout(function() {
        var options = {speed:<?= \$this->field('speed')->value(); ?>, duration:<?= \$this->field('duration')->value(); ?>};
        var fx = EX.fx.rotatingwords('.ce_rotating_words_<?= \$this->id; ?> .rotating-words-container', options);
    }, 500);
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_rotatingwords.html5";
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

use Contao\\StringUtil;
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_rotating_words.css';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/core.js';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/rotatingwords/js/scripts.js';

\$element = \$this->field('markup')->value();
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}
?>
<<?= \$element; ?> <?= \$this->cssID; ?> class=\"<?= \$this->class; ?> ce_rotating_words_<?= \$this->id;?> <?= str_replace('.', '', \$this->field('markup')->value()); ?>\" 
data-align=\"<?= \$this->field('align')->value(); ?>\" 
data-color=\"<?= \$this->field('color')->value(); ?>\" 
data-color-highlighted=\"<?= \$this->field('color_highlighted')->value(); ?>\" 
data-speed=\"<?= \$this->field('speed')->value(); ?>\"
>
\t<div class=\"rotating-words-container\">
\t\t<?php if( \$this->field('text_begin')->value() ): ?>
\t\t<span><?= \$this->field('text_begin')->html('customelement_attr_raw'); ?></span>
\t\t<?php endif; ?>
\t\t<span class=\"rotating-words\">
\t\t\t<?php 
\t\t\t\$words = StringUtil::deserialize( \$this->field('effect_words')->value() ) ?? array();
\t\t\t?>
\t\t\t<?php foreach(\$words as \$i => \$word): ?>
\t\t\t\t<span class=\"word <?php if(\$i == 0): ?>active<?php endif; ?>\"><span class=\"mask\"><?= \$word; ?></span></span>
\t\t\t<?php endforeach; ?>
\t\t</span>
\t\t<?php if( \$this->field('text_end')->value() ): ?>
\t\t<span><?= \$this->field('text_end')->html('customelement_attr_raw'); ?></span>
\t\t<?php endif; ?>
        </span>
\t</div>
</<?= \$element; ?>>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() {
    setTimeout(function() {
        var options = {speed:<?= \$this->field('speed')->value(); ?>, duration:<?= \$this->field('duration')->value(); ?>};
        var fx = EX.fx.rotatingwords('.ce_rotating_words_<?= \$this->id; ?> .rotating-words-container', options);
    }, 500);
});
</script>
<!-- SEO-SCRIPT-STOP -->", "@pct_theme_templates/customelements/customelement_rotatingwords.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_rotatingwords.html5");
    }
}
