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

/* @pct_theme_templates/modules/mod_logout_2cl.html5 */
class __TwigTemplate_950f4d979f12a21bc3840449b06a12c9 extends Template
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
        yield "<!-- indexer::stop -->
<div id=\"mod_login_top_opener_<?php echo \$this->id; ?>\" class=\"mod_login_top meta-nav\"><i class=\"fa fa-lock\"></i><?php echo \$GLOBALS['TL_LANG']['MSC']['logout'] ?></div>
<div id=\"overlay_close_<?php echo \$this->id; ?>\" class=\"overlay_close\"></div>
<div <?php echo \$this->cssID; ?> class=\"<?php echo \$this->class; ?> login top-login block <?php if(\$this->message): ?>show<?php endif; ?>\"<?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>

  <?php if (\$this->headline): ?>
    <<?= \$this->hl ?>><?= \$this->headline ?></<?= \$this->hl ?>>
  <?php endif; ?>

  <form<?php if (\$this->action): ?> action=\"<?= \$this->action ?>\"<?php endif; ?> id=\"tl_logout\" method=\"post\">
    <div class=\"formbody\">
      <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_logout\">
      <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
      <table>
        <tr class=\"row_0 row_first\">
          <td class=\"login_info\"><?= \$this->loggedInAs ?><br><?= \$this->lastLogin ?></td>
        </tr>
        <tr class=\"row_1 row_last\">
          <td><div class=\"submit_container\"><input type=\"submit\" class=\"submit\" value=\"<?= \$this->slabel ?>\"></div></td>
        </tr>
      </table>
    </div>
    <div id=\"mod_login_top_closer_<?php echo \$this->id; ?>\" class=\"close-window-login\"><i class=\"fa fa-close\"></i></div>
  </form>


\t<script>
\tjQuery(document).ready(function(){
\t\tjQuery(\"#mod_login_top_opener_<?php echo \$this->id; ?>\").click(function(){
\t    \tjQuery(\".top-login\").addClass(\"show\");
\t\t});
\t\tjQuery(\"#mod_login_top_closer_<?php echo \$this->id; ?>\").click(function(){
\t    \tjQuery(\".top-login\").removeClass(\"show\");
\t\t});
\t\tjQuery(\"#overlay_close_<?php echo \$this->id; ?>\").click(function(){
\t    \tjQuery(\".top-login\").removeClass(\"show\");
\t\t});
\t\tjQuery(document).keyup(function(e) {
\t\t\tif (e.keyCode === 27) jQuery(\".top-login\").removeClass(\"show\");
\t\t});
\t});
\t</script>

</div>
<!-- indexer::continue -->
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_logout_2cl.html5";
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
        return new Source("", "@pct_theme_templates/modules/mod_logout_2cl.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_logout_2cl.html5");
    }
}
