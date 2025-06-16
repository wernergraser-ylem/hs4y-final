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

/* @pct_themer/backend/be_page_pct_theme_export.html5 */
class __TwigTemplate_235802a5848551abcafbf3c8a34c27ab extends Template
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
        yield "
<?php
\$objPages = \$this->pages;
?>

<div id=\"page_pct_theme_export\">
\t<div id=\"tl_buttons\">
\t<?= \$this->back; ?>
\t</div>

\t<h2 class=\"headline sub_headline\"><?= \$this->headline; ?></h2>
\t
\t<div id=\"tl_rebuild_index\">
\t
\t<?php if(\$this->hasGlobalError): ?>
\t<p class=\"tl_red\"><?php echo \$this->error; ?></p>
\t<?php else: ?>
\t\t
\t\t<?php if(\\Contao\\Input::get('status') == 'run'): ?>
\t\t<h2 class=\"headline\"><?= \$this->state_headline; ?></h2>
\t\t
\t\t<p id=\"index_loading\"><?php echo \$this->loading; ?></p>
\t\t<p id=\"index_complete\" style=\"display:none\"><?php echo \$this->complete; ?></p>
\t\t<p style=\"margin-bottom:0\"><?php echo \$this->content; ?></p>
\t\t\t
\t\t<?php if(\$this->hasError): ?>
\t\t\t<p class=\"tl_red\"><?php echo \$this->error; ?></p>
\t\t\t<?php else: ?>
\t\t\t
\t\t\t<ul class=\"tl_listing\">
\t\t\t<?php while(\$objPages->next()): ?>
\t\t\t<?php 
\t\t\t\$page = \$objPages;\t
\t\t\t?>
\t\t\t<li class=\"theme_data tl_file\" data-page_id=\"<?= \$page->id; ?>\">
\t\t\t\t<div class=\"tl_left\"><?= \$page->title; ?> (<?= \$page->alias;?>)</div>
\t\t\t\t<div class=\"tl_right\">id:<?= \$page->id; ?></div>
\t\t\t\t<div style=\"clear:both\"></div>
\t\t\t</li>
\t\t\t<?php endwhile; ?>
\t\t\t</ul>
\t\t<?php endif; ?>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\\Contao\\Input::get('status') == 'run'): ?>
\t\t<div id=\"forward_to_complete\" style=\"margin-top: 10px;\">
\t\t\t<a class=\"tl_submit\" href=\"<?= \$this->addToUrl('status=complete'); ?>\"><?= \$GLOBALS['TL_LANG']['pct_themer']['submit_complete']; ?></a>
\t\t</div>
\t\t<?php endif; ?>
\t\t<?php if(\\Contao\\Input::get('status') == 'complete'): ?>
\t\t
\t\t<p style=\"margin-bottom:0\"><?php echo \$this->content; ?></p>
\t\t
\t\t<div id=\"download\" style=\"margin-top: 10px;\">
\t\t\t<a class=\"tl_submit\" href=\"<?= \$this->addToUrl('download=1'); ?>\"><?= \$GLOBALS['TL_LANG']['pct_themer']['submit_download']; ?></a>
\t\t</div>
\t\t<?php endif; ?>
\t</div>
\t<?php endif; ?>
</div>

<?php if(\\Contao\\Input::get('status') == 'run'): ?>
<script>
/* <![CDATA[ */
window.addEvent('domready', function() 
{
\tvar url_complete = '<?= \\Contao\\StringUtil::decodeEntities(\$this->addToUrl('status=complete')); ?>';
\t\$('forward_to_complete').setStyle('display', 'none');
\t
\tvar urls = \$\$('.theme_data');
\tvar last = urls.length-1; 
\t
\tif(urls.length < 1)
\t{
\t\treturn false;
\t}
\t
\tfunction runJob(i)
\t{
\t\tvar el = urls[i];
\t\t
\t\tnew Request(
\t\t{
\t\t\t'method': 'get',
\t\t\t'url': location.href,
\t\t\t'data': 'page_id='+el.getAttribute('data-page_id')+'&status=run',
\t\t\tonComplete: function() 
\t\t\t{
\t\t\t\tel.addClass('tl_green');
\t\t\t\tel.getChildren().addClass('tl_green');
\t\t\t\tif(i < last)
\t\t\t\t{
\t\t\t\t\treturn runJob(i+1);
\t\t\t\t}
\t\t\t\telse
\t\t\t\t{
\t\t\t\t\t\$('index_loading').setStyle('display', 'none');
\t\t\t\t\t\$('index_complete').setStyle('display', 'block');
\t\t\t\t\t\$('forward_to_complete').setStyle('display', 'block');
\t\t\t\t}
\t\t\t},
\t\t\tonFailure: function()
\t\t\t{
\t\t\t\tel.addClass('tl_red');
\t\t\t\tel.getChildren().addClass('tl_red');
\t\t\t},
\t\t\tonException: function()
\t\t\t{
\t\t\t\tel.addClass('tl_red');
\t\t\t\tel.getChildren().addClass('tl_red');
\t\t\t}
\t\t}).get();
\t}
\trunJob(0);
});
/* ]]> */\t
</script>
<?php endif; ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/backend/be_page_pct_theme_export.html5";
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
        return new Source("", "@pct_themer/backend/be_page_pct_theme_export.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/backend/be_page_pct_theme_export.html5");
    }
}
