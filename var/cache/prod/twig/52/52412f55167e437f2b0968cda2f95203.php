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

/* @pct_theme_templates/modules/mod_eventlist_timeline.html5 */
class __TwigTemplate_1d2959e146906f9794033cc9305f6882 extends Template
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

// Settings

// -1 = find event closest to current date (default)
// 0 ... n = for first event or number of event

\$startEvent = -1;

// --------------------------- DO NOT EDIT BELOW THIS LINE UNLESS YOU KNOW WHAT YOU ARE DOING
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/horizontal-timeline/css/style_orig.css';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/horizontal-timeline/css/style.css';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/horizontal-timeline/js/util.js|static';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/horizontal-timeline/js/swipe-content.js|static';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/horizontal-timeline/js/main.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/events/mod_eventlist_timeline.css|static';

\$objDoc = new \\DOMDocument();
@\$objDoc->loadHTML( \\mb_convert_encoding(\\Contao\\StringUtil::substrHtml(\$this->events,strlen(\$this->events)), 'HTML-ENTITIES', 'UTF-8') );
\$objXpath = new \\DOMXPath(\$objDoc);
\$arrItems = \$objXpath->query('//*[@class=\"timeline_item\"]');
\$arrDates = array();
\$arrEvents = array();

if(count(\$arrItems) > 0)
{
\tforeach(\$arrItems as \$found)
\t{
\t\t\$strBuffer = urldecode(\$objDoc->saveHTML(\$found));
\t\t\$preg = preg_match('/data-timeline_date=\"(.*?)\"/',\$strBuffer,\$match);
\t\tif(\$preg < 1)
\t\t{
\t\t\tcontinue;
\t\t}

\t\t\$date = \$match[1];
\t\t\$arrDates[] = \$date;
\t\t
\t\tif(array_key_exists(\$date,\$arrEvents))
\t\t{
\t\t\t\$arrEvents[\$date] .= \$strBuffer;
\t\t}
\t\telse
\t\t{
\t\t\t\$arrEvents[\$date] = \$strBuffer;
\t\t}
\t}
\t\$arrDates = array_unique(\$arrDates);
\t
\t\$tmp = array();
\tforeach(\$arrDates as \$date)
\t{
\t\t\$tmp[] = \$date;
\t}
\t\$arrDates = \$tmp;
\tunset(\$tmp);
}

?>

<?php \$this->extend('block_unsearchable'); ?>

<?php \$this->block('content'); ?>

<?php if(count(\$arrItems) > 0): ?>

<?php // find the event closest to the current date
if(\$startEvent < 0)
{
\t\$time = 0;
\tforeach(\$arrDates as \$i => \$date)
\t{
\t\t\$objDate = new \\Contao\\Date(\$date,'d/m/Y');
\t\t
\t\tif(\$objDate->__get('tstamp') >= \$time && \$objDate->__get('tstamp') <= time())
\t\t{
\t\t\t\$time = \$objDate->__get('tstamp');
\t\t\t\$startEvent = \$i;
\t\t}
\t}
\t
\t// fallback
\tif(\$startEvent < 0)
\t{
\t\t\$startEvent = 0;
\t}
}
?>

<section id=\"timeline_<?php echo \$this->id; ?>\" class=\"cd-h-timeline js-cd-h-timeline timeline_<?php echo \$this->id; ?>\">
\t<div class=\"cd-h-timeline__container container timeline\">
\t\t<div class=\"cd-h-timeline__dates events-wrapper\">
\t\t\t<div class=\"cd-h-timeline__line events\">
\t\t\t\t<ol>
\t\t\t\t<?php foreach(\$arrDates as \$i => \$date): ?>
\t\t\t\t\t<?php // parse the date
\t\t\t\t\t\$objDate = new \\Contao\\Date(\$date,'d/m/Y');
\t\t\t\t\t?>
\t\t\t\t\t<li><a href=\"#0\" class=\"cd-h-timeline__date<?= (\$i == \$startEvent ? ' cd-h-timeline__date--selected' : ''); ?> \" data-date=\"<?= \$date; ?>\"><?= \\Contao\\Date::parse('d M',\$objDate->__get('tstamp')); ?></a></li>\t\t\t
\t\t\t\t<?php endforeach; ?>
\t\t\t\t</ol>

\t\t\t\t<span class=\"cd-h-timeline__filling-line filling-line\" aria-hidden=\"true\"></span>
\t\t\t</div> <!-- .events -->
\t\t</div> <!-- .events-wrapper -->
\t\t\t
\t\t<ul class=\"cd-timeline-navigation\">
\t\t\t<li><a href=\"#0\" class=\"text-replace cd-h-timeline__navigation cd-h-timeline__navigation--prev cd-h-timeline__navigation--inactive prev\">Prev</a></li>
\t\t\t<li><a href=\"#0\" class=\"text-replace cd-h-timeline__navigation cd-h-timeline__navigation--next cd-h-timeline__navigation--inactive next\">Next</a></li>
\t\t</ul> <!-- .cd-timeline-navigation -->
\t</div> <!-- .timeline -->

\t<div class=\"cd-h-timeline__events events-content\">
\t\t<ol>
\t\t\t<?php foreach(\$arrDates as \$i => \$date): ?>
\t\t\t<li class=\"cd-h-timeline__event text-component<?= (\$i == \$startEvent ? ' cd-h-timeline__event--selected selected' : ''); ?>\" data-date=\"<?= \$date; ?>\"><?= \$arrEvents[\$date]; ?></li>
\t\t\t<?php endforeach; ?>
\t\t</ol>
\t</div> <!-- .events-content -->
</section>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\tjQuery('html').addClass('js');
\tvar timeline = new HorizontalTimeline( document.getElementById('timeline_<?php echo \$this->id; ?>') );
});
</script>
<!-- SEO-SCRIPT-STOP -->

<?php endif; ?>

<?php \$this->endblock(); ?>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_eventlist_timeline.html5";
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
        return new Source("", "@pct_theme_templates/modules/mod_eventlist_timeline.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_eventlist_timeline.html5");
    }
}
