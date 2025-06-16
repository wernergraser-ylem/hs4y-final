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

/* @pct_theme_templates/customelements/customelement_splitwords.html5 */
class __TwigTemplate_0b1fbd97d214c03db426211f2c76ba02 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_splitwords.css';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/core.js';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/waypoint/js/scripts.js';

\$objInserTag = \\Contao\\System::getContainer()->get('contao.insert_tag.parser');

\$element = \$this->field('markup')->value() ?? 'div';
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}
?>
<<?= \$element; ?> class=\"<?= \$this->class; ?> <?= str_replace('.', '', \$this->field('markup')->value()); ?> ce_split_words_<?= \$this->id; ?>\" data-align=\"<?= \$this->field('align')->value(); ?>\" data-color=\"<?= \$this->field('color')->value(); ?>\" data-speed=\"<?= \$this->field('speed')->value(); ?>\">
<?php 
// split text
\$arrChunks = \\explode(' ', \$this->field('text')->value() ?? array());
\$arrSpans = array();
foreach (\$arrChunks as \$chunk) {
    // replace inserttags
    \$chunk = \\trim(\$objInserTag->replace(\$chunk) ?? '');
    \$chunk = \\nl2br(\$chunk);
\tforeach (\\explode('<br />', \$chunk) as \$index => \$part) 
\t{
\t\tif (\$index > 0) 
\t\t{
            \$arrSpans[] = '<br />';
        }
        \$arrSpans[] = '<span class=\"word_wrap\"><span class=\"word\">'.\$part.'</span></span>';
    }
}
\$text = \\implode(' ', \$arrSpans);
?>
<?= \$text; ?>
</<?= \$element; ?>>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\tconst speed = '1.2s';
    const delay = '0.5s';
\tvar selector = '.ce_split_words_<?= \$this->id; ?>';
\tvar element = jQuery(selector);
\tconst spans = element.find('span.word_wrap span.word');
\tvar waypoint = EX.fx.waypoint(selector);
\tjQuery(selector).on('intersecting',function(e,params)
\t{
\t\tsetTimeout(() =>
\t\t{
\t\t\tjQuery.each(spans, function (index, elem)
\t\t\t{ 
\t\t\t\tjQuery(elem).css('animation', `slideUp \${speed} cubic-bezier(0.25,1,0.5,1) \${index * 0.1}s forwards`);
\t\t\t});
\t\t}, parseFloat(delay) * 1000);
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_splitwords.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_splitwords.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_splitwords.html5");
    }
}
