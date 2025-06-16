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

/* @pct_theme_templates/customelements/customelement_scroll_reveal_words.html5 */
class __TwigTemplate_c1ea75c640cec82be836dd410bb0db3f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_scroll_reveal_words.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_scroll_reveal_words.html5"));

        // line 1
        yield "<?php
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_scroll_reveal_words.css|static';

\$objInserTag = \\Contao\\System::getContainer()->get('contao.insert_tag.parser');

\$element = \$this->field('markup')->value() ?? 'div';
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}
?>
<<?= \$element; ?> class=\"<?= \$this->class; ?> scroll_reveal_words scroll_reveal_words_<?= \$this->id; ?> <?= str_replace('.', '', \$this->field('markup')->value()); ?>\" data-align=\"<?= \$this->field('align')->value(); ?>\" data-color=\"<?= \$this->field('color')->value(); ?>\" data-visible-on-start=\"<?= \$this->field('visible_on_start')->value(); ?>\">
<?php 
// split text
\$arrChunks = \\explode(' ',\$this->field('text')->value() ?? array() );
\$arrSpans = array();
foreach(\$arrChunks as \$chunk)
{
\t// replace inserttags
\t\$chunk = \\trim( \$objInserTag->replace(\$chunk) ?? '' );
\t\$chunk = \\nl2br( \$chunk );
\t\$arrSpans[] = '<span class=\"word\">'.\$chunk.'</span>';
}
\$text = \\implode(' ',\$arrSpans);
?>
<?= \$text; ?>
</<?= \$element; ?>>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\tconst minOpacity = <?= \$this->field('visible_on_start')->value() !== null ? 0.2 : 0; ?>;
\tvar selector = '.scroll_reveal_words_<?= \$this->id; ?>';
\tvar element = jQuery(selector);
\tconst spans = element.find('span.word');
\t
\tfunction revealWords()
    {
\t\tjQuery.each(spans, function (i,elem)
        { 
\t\t\tlet rect = elem.getBoundingClientRect();
\t\t\tlet top = rect.top - (window.innerHeight * 0.5);
\t\t\tlet left = rect.x;
\t\t\tlet opacity = 1 - ((top * .01) + (left * 0.001)) < 0.1 ? minOpacity : 1 - ( (top * .01) + (left * 0.001)).toFixed(3);
\t\t\topacity = opacity > 1 ? 1 : opacity.toFixed(3);
\t\t\tjQuery(elem).css('opacity', opacity);
        });
    }

\tjQuery(window).scroll(function() 
\t{
\t\tlet deltaS = jQuery(window).scrollTop() + jQuery(window).height();
\t\tif(  deltaS > element.offset().top )
\t\t{
\t\t\trevealWords();
\t\t}
\t});
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
        return "@pct_theme_templates/customelements/customelement_scroll_reveal_words.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_scroll_reveal_words.css|static';

\$objInserTag = \\Contao\\System::getContainer()->get('contao.insert_tag.parser');

\$element = \$this->field('markup')->value() ?? 'div';
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}
?>
<<?= \$element; ?> class=\"<?= \$this->class; ?> scroll_reveal_words scroll_reveal_words_<?= \$this->id; ?> <?= str_replace('.', '', \$this->field('markup')->value()); ?>\" data-align=\"<?= \$this->field('align')->value(); ?>\" data-color=\"<?= \$this->field('color')->value(); ?>\" data-visible-on-start=\"<?= \$this->field('visible_on_start')->value(); ?>\">
<?php 
// split text
\$arrChunks = \\explode(' ',\$this->field('text')->value() ?? array() );
\$arrSpans = array();
foreach(\$arrChunks as \$chunk)
{
\t// replace inserttags
\t\$chunk = \\trim( \$objInserTag->replace(\$chunk) ?? '' );
\t\$chunk = \\nl2br( \$chunk );
\t\$arrSpans[] = '<span class=\"word\">'.\$chunk.'</span>';
}
\$text = \\implode(' ',\$arrSpans);
?>
<?= \$text; ?>
</<?= \$element; ?>>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\tconst minOpacity = <?= \$this->field('visible_on_start')->value() !== null ? 0.2 : 0; ?>;
\tvar selector = '.scroll_reveal_words_<?= \$this->id; ?>';
\tvar element = jQuery(selector);
\tconst spans = element.find('span.word');
\t
\tfunction revealWords()
    {
\t\tjQuery.each(spans, function (i,elem)
        { 
\t\t\tlet rect = elem.getBoundingClientRect();
\t\t\tlet top = rect.top - (window.innerHeight * 0.5);
\t\t\tlet left = rect.x;
\t\t\tlet opacity = 1 - ((top * .01) + (left * 0.001)) < 0.1 ? minOpacity : 1 - ( (top * .01) + (left * 0.001)).toFixed(3);
\t\t\topacity = opacity > 1 ? 1 : opacity.toFixed(3);
\t\t\tjQuery(elem).css('opacity', opacity);
        });
    }

\tjQuery(window).scroll(function() 
\t{
\t\tlet deltaS = jQuery(window).scrollTop() + jQuery(window).height();
\t\tif(  deltaS > element.offset().top )
\t\t{
\t\t\trevealWords();
\t\t}
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->", "@pct_theme_templates/customelements/customelement_scroll_reveal_words.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_scroll_reveal_words.html5");
    }
}
