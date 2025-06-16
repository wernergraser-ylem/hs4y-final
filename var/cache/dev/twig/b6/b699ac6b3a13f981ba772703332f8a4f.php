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

/* @pct_customelements/backend/be_maintenance_jobs.html5 */
class __TwigTemplate_38b3e730a649e189308228ba88811a10 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/backend/be_maintenance_jobs.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/backend/be_maintenance_jobs.html5"));

        // line 1
        yield "
<div id=\"tl_maintenance_pct_customelements\" class=\"maintenance_<?php

 echo \$this->isActive ? 'active' : 'inactive'; ?> maintenance_table\">

  <h2 class=\"sub_headline\"><?php echo \$this->headline; ?></h2>

  <?php if (\$this->message): ?>
    <div class=\"tl_message\">
      <?php echo \$this->message; ?>
    </div>
  <?php endif; ?>

  <form action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"post\">
    <div class=\"tl_formbody_edit\">
      <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_pct_customelements_jobs\">
      <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
      <?php echo \$this->hidden; ?>
     <div class=\"tl_tbox\">
        <fieldset class=\"tl_checkbox_container\">
          <table>
          <thead>
            <tr>
              <th><input type=\"checkbox\" id=\"check_all\" class=\"tl_checkbox\" onclick=\"Backend.toggleCheckboxes(this, 'pct_customelement')\"></th>
              <th><?php echo \$this->job; ?></th>
              <th><?php echo \$this->description; ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach (\$this->jobs as \$value=>\$job): ?>
              <tr>
                <td><input type=\"checkbox\" name=\"pct_customelement[<?php echo \$job['name']; ?>]\" id=\"<?php echo \$job['id']; ?>\" class=\"tl_checkbox\" value=\"<?php echo \$value; ?>\" onfocus=\"Backend.getScrollOffset()\"></td>
                <td class=\"nw\"><label for=\"<?php echo \$job['id']; ?>\"><?php echo \$job['title']; ?></label><?php echo \$job['affected']; ?></td>
                <td><?php echo \$job['description']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          </table>
        </fieldset>
        <?php if (\$this->help): ?>
          <p class=\"tl_help tl_tip\"><?php echo \$this->help; ?></p>
        <?php endif; ?>
      </div>
    </div>
    <div class=\"tl_submit_container\">
      <input type=\"submit\" name=\"clear\" class=\"tl_submit\" value=\"<?php echo \$this->submit; ?>\">
    </div>
  </form>

</div>
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
        return "@pct_customelements/backend/be_maintenance_jobs.html5";
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
        return new Source("
<div id=\"tl_maintenance_pct_customelements\" class=\"maintenance_<?php

 echo \$this->isActive ? 'active' : 'inactive'; ?> maintenance_table\">

  <h2 class=\"sub_headline\"><?php echo \$this->headline; ?></h2>

  <?php if (\$this->message): ?>
    <div class=\"tl_message\">
      <?php echo \$this->message; ?>
    </div>
  <?php endif; ?>

  <form action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"post\">
    <div class=\"tl_formbody_edit\">
      <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_pct_customelements_jobs\">
      <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
      <?php echo \$this->hidden; ?>
     <div class=\"tl_tbox\">
        <fieldset class=\"tl_checkbox_container\">
          <table>
          <thead>
            <tr>
              <th><input type=\"checkbox\" id=\"check_all\" class=\"tl_checkbox\" onclick=\"Backend.toggleCheckboxes(this, 'pct_customelement')\"></th>
              <th><?php echo \$this->job; ?></th>
              <th><?php echo \$this->description; ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach (\$this->jobs as \$value=>\$job): ?>
              <tr>
                <td><input type=\"checkbox\" name=\"pct_customelement[<?php echo \$job['name']; ?>]\" id=\"<?php echo \$job['id']; ?>\" class=\"tl_checkbox\" value=\"<?php echo \$value; ?>\" onfocus=\"Backend.getScrollOffset()\"></td>
                <td class=\"nw\"><label for=\"<?php echo \$job['id']; ?>\"><?php echo \$job['title']; ?></label><?php echo \$job['affected']; ?></td>
                <td><?php echo \$job['description']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          </table>
        </fieldset>
        <?php if (\$this->help): ?>
          <p class=\"tl_help tl_tip\"><?php echo \$this->help; ?></p>
        <?php endif; ?>
      </div>
    </div>
    <div class=\"tl_submit_container\">
      <input type=\"submit\" name=\"clear\" class=\"tl_submit\" value=\"<?php echo \$this->submit; ?>\">
    </div>
  </form>

</div>
", "@pct_customelements/backend/be_maintenance_jobs.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/backend/be_maintenance_jobs.html5");
    }
}
