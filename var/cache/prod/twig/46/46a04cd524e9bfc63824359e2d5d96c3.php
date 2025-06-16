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

/* @pct_customelements/backend/be_maintenance_wizardupdater.html5 */
class __TwigTemplate_fff72b33d35dc93eb1ff80fdae052403 extends Template
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
<div id=\"tl_maintenance_index\" class=\"maintenance_<?php echo \$this->isActive ? 'active' : 'inactive'; ?>\">

  <h2 class=\"sub_headline_index\"><?php echo \$this->indexHeadline; ?></h2>

  <?php if (\$this->indexMessage): ?>
    <div class=\"tl_message\">
      <p class=\"tl_error\"><?php echo \$this->indexMessage; ?></p>
    </div>
  <?php endif; ?>

  <?php if (\$this->isRunning): ?>
    <div id=\"tl_rebuild_index\">
      <p id=\"index_loading\"><?php echo \$this->loading; ?></p>
      <p id=\"index_complete\" style=\"display:none\"><?php echo \$this->complete; ?></p>
      <p style=\"margin-bottom:0\"><?php echo \$this->content; ?></p>
    </div>

\t<script type=\"text/javascript\">
\t/* <![CDATA[ */
\twindow.addEvent('domready', function() 
\t{
\t\tvar urls = \$\$('.wizard_data');
\t\tvar last = urls.length-1; 
\t
\t\tfunction runStep(i)
\t\t{
\t\t\tvar el = urls[i];
\t\t\t
\t\t\tnew Request(
\t\t\t{
\t\t\t\t'url': location.href,
\t\t\t\t'data': 'vault_id='+el.getAttribute('data-vault_id'),
\t\t\t\tonComplete: function() 
\t\t\t\t{
\t\t\t\t\tel.addClass('tl_green');
\t\t\t\t\tif(i < last)
\t\t\t\t\t{
\t\t\t\t\t\treturn runStep(i+1);
\t\t\t\t\t}
\t\t\t\t\telse
\t\t\t\t\t{
\t\t\t\t\t\t\$('index_loading').setStyle('display', 'none');
\t\t\t\t\t\t\$('index_complete').setStyle('display', 'block');
\t\t\t\t\t}
\t\t\t\t},
\t\t\t\tonFailure: function()
\t\t\t\t{
\t\t\t\t\tel.addClass('tl_red');
\t\t\t\t},
\t\t\t\tonException: function()
\t\t\t\t{
\t\t\t\t\tel.addClass('tl_red');
\t\t\t\t}
\t\t\t}).get();
\t\t}
\t\trunStep(0);
\t});
\t/* ]]> */\t
\t</script>
\t<?php endif; ?>
\t
    <form action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"get\">
      <div class=\"tl_submit_container\">
        <input type=\"hidden\" name=\"do\" value=\"maintenance\">
        <input type=\"submit\" id=\"index\" class=\"tl_submit\" value=\"<?php echo \$this->indexContinue; ?>\">
      </div>
    </form>
\t
</div>


";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements/backend/be_maintenance_wizardupdater.html5";
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
        return new Source("", "@pct_customelements/backend/be_maintenance_wizardupdater.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/backend/be_maintenance_wizardupdater.html5");
    }
}
