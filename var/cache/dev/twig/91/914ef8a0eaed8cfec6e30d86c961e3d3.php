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

/* @pct_theme_templates/customelements/customelement_popup_start.html5 */
class __TwigTemplate_9cd513e855a367a5118eb57c69c545d4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_popup_start.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_popup_start.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_popup.css|static';
?>
<div class=\"<?php echo \$this->class; ?> ce_pop_up_<?= \$this->id; ?>\">
\t<div class=\"ce_popup_overlay\"></div>
\t<div class=\"ce_popup_content\" style=\"max-width: <?php echo \$this->field('max_width')->value(); ?>px\">
\t\t<i class=\"ti ti-close popup_close\"></i>
\t\t<div class=\"checkbox\">
\t\t\t<input type=\"checkbox\" class=\"ce_popup_checkbox\" id=\"ce_popup_checkbox\">
\t\t\t<label for=\"ce_popup_checkbox\"><?php echo \$this->field('label')->value(); ?></label>
\t\t</div>
\t\t
\t\t<!-- SEO-SCRIPT-START -->
\t\t<script>
\t\tjQuery(document).ready(function()
\t\t{ 
\t\t\tvar delay = <?= \$this->field('delay')->value() ?: 2000; ?>;
\t\t\t
\t\t\tif ( localStorage.getItem('ce_popup_isClosed_<?= \$this->id; ?>') == undefined || localStorage.getItem('ce_popup_isClosed_<?= \$this->id; ?>') == null ) 
\t\t\t{
\t\t\t\tsetTimeout(function()
\t\t\t\t{
\t\t\t\t\tjQuery('.ce_pop_up_<?= \$this->id; ?>').addClass('popup_show');
\t\t\t\t},delay);
\t\t\t}
\t\t\t
\t\t\tjQuery('.ce_pop_up_<?= \$this->id; ?> .popup_close').click(function()
\t\t\t{
\t\t\t\tjQuery('.ce_pop_up_<?= \$this->id; ?> .ce_popup_overlay, .ce_pop_up_<?= \$this->id; ?> .ce_popup_content').fadeOut('slow');
\t\t\t\t
\t\t\t\tif( jQuery('.ce_pop_up_<?= \$this->id; ?> .ce_popup_checkbox').is(':checked') ) { 
\t\t\t\t\tlocalStorage.setItem('ce_popup_isClosed_<?= \$this->id; ?>', 1);
\t\t\t\t}
\t\t\t});
\t\t});
\t\t</script>
\t\t<!-- SEO-SCRIPT-STOP -->

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
        return "@pct_theme_templates/customelements/customelement_popup_start.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_popup.css|static';
?>
<div class=\"<?php echo \$this->class; ?> ce_pop_up_<?= \$this->id; ?>\">
\t<div class=\"ce_popup_overlay\"></div>
\t<div class=\"ce_popup_content\" style=\"max-width: <?php echo \$this->field('max_width')->value(); ?>px\">
\t\t<i class=\"ti ti-close popup_close\"></i>
\t\t<div class=\"checkbox\">
\t\t\t<input type=\"checkbox\" class=\"ce_popup_checkbox\" id=\"ce_popup_checkbox\">
\t\t\t<label for=\"ce_popup_checkbox\"><?php echo \$this->field('label')->value(); ?></label>
\t\t</div>
\t\t
\t\t<!-- SEO-SCRIPT-START -->
\t\t<script>
\t\tjQuery(document).ready(function()
\t\t{ 
\t\t\tvar delay = <?= \$this->field('delay')->value() ?: 2000; ?>;
\t\t\t
\t\t\tif ( localStorage.getItem('ce_popup_isClosed_<?= \$this->id; ?>') == undefined || localStorage.getItem('ce_popup_isClosed_<?= \$this->id; ?>') == null ) 
\t\t\t{
\t\t\t\tsetTimeout(function()
\t\t\t\t{
\t\t\t\t\tjQuery('.ce_pop_up_<?= \$this->id; ?>').addClass('popup_show');
\t\t\t\t},delay);
\t\t\t}
\t\t\t
\t\t\tjQuery('.ce_pop_up_<?= \$this->id; ?> .popup_close').click(function()
\t\t\t{
\t\t\t\tjQuery('.ce_pop_up_<?= \$this->id; ?> .ce_popup_overlay, .ce_pop_up_<?= \$this->id; ?> .ce_popup_content').fadeOut('slow');
\t\t\t\t
\t\t\t\tif( jQuery('.ce_pop_up_<?= \$this->id; ?> .ce_popup_checkbox').is(':checked') ) { 
\t\t\t\t\tlocalStorage.setItem('ce_popup_isClosed_<?= \$this->id; ?>', 1);
\t\t\t\t}
\t\t\t});
\t\t});
\t\t</script>
\t\t<!-- SEO-SCRIPT-STOP -->

", "@pct_theme_templates/customelements/customelement_popup_start.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_popup_start.html5");
    }
}
