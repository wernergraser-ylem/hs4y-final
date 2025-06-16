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

/* @pct_autogrid/form_autogrid_col.html5 */
class __TwigTemplate_c571819e404a0e0fd4f815ac423ae25b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_autogrid/form_autogrid_col.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_autogrid/form_autogrid_col.html5"));

        // line 1
        yield "
<?php if(\$this->AutoGrid->start): ?>
<div class=\"column<?php if(\$this->class): ?> <?= \$this->class; ?><?php endif; ?><?php if(\$this->AutoGrid->classes): ?> <?= \$this->AutoGrid->classes; ?><?php endif; ?>\" <?= \$this->cssID ?><?php if (\$this->style): ?> style=\"<?= \$this->style ?>\"<?php endif; ?>>
\t<?php if(isset(\$this->AutoGrid->hasAttributes) && \$this->AutoGrid->hasAttributes === true): ?>
\t<div class=\"attributes<?php if(\$this->AutoGrid->Image && !\$this->AutoGrid->hasContent): ?> has-image empty<?php endif; ?><?php if(\$this->autogrid_padding_css): ?> <?= \$this->autogrid_padding_css; ?><?php endif; ?>\"<?php if(\$this->AutoGrid->styles): ?> style=\"<?= implode(' ', \$this->AutoGrid->styles); ?>\"<?php endif; ?>>
\t\t<?php if(isset(\$this->AutoGrid->shstart) && \$this->AutoGrid->shstart === true): ?>
\t\t\t<div class=\"same-height-wrap\">
\t\t<?php endif; ?>
\t<?php if(\$this->AutoGrid->Image && !\$this->AutoGrid->hasContent): ?>
\t\t<figure class=\"image_container image_mob\"><?php \$this->insert('picture_default', \$this->AutoGrid->Image->picture); ?></figure>
\t<?php endif; ?>
\t<?php endif; ?>
<?php endif; ?>
<?php if(\$this->AutoGrid->stop): ?>
\t<?php if(isset(\$this->AutoGrid->hasAttributes) && \$this->AutoGrid->hasAttributes === true): ?>
\t\t</div>
\t\t<?php if(isset(\$this->AutoGrid->shstop) && \$this->AutoGrid->shstop === true): ?>
\t\t\t</div>
\t\t<?php endif; ?>
\t<?php endif;?>
</div>
<?php endif;?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_autogrid/form_autogrid_col.html5";
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
<?php if(\$this->AutoGrid->start): ?>
<div class=\"column<?php if(\$this->class): ?> <?= \$this->class; ?><?php endif; ?><?php if(\$this->AutoGrid->classes): ?> <?= \$this->AutoGrid->classes; ?><?php endif; ?>\" <?= \$this->cssID ?><?php if (\$this->style): ?> style=\"<?= \$this->style ?>\"<?php endif; ?>>
\t<?php if(isset(\$this->AutoGrid->hasAttributes) && \$this->AutoGrid->hasAttributes === true): ?>
\t<div class=\"attributes<?php if(\$this->AutoGrid->Image && !\$this->AutoGrid->hasContent): ?> has-image empty<?php endif; ?><?php if(\$this->autogrid_padding_css): ?> <?= \$this->autogrid_padding_css; ?><?php endif; ?>\"<?php if(\$this->AutoGrid->styles): ?> style=\"<?= implode(' ', \$this->AutoGrid->styles); ?>\"<?php endif; ?>>
\t\t<?php if(isset(\$this->AutoGrid->shstart) && \$this->AutoGrid->shstart === true): ?>
\t\t\t<div class=\"same-height-wrap\">
\t\t<?php endif; ?>
\t<?php if(\$this->AutoGrid->Image && !\$this->AutoGrid->hasContent): ?>
\t\t<figure class=\"image_container image_mob\"><?php \$this->insert('picture_default', \$this->AutoGrid->Image->picture); ?></figure>
\t<?php endif; ?>
\t<?php endif; ?>
<?php endif; ?>
<?php if(\$this->AutoGrid->stop): ?>
\t<?php if(isset(\$this->AutoGrid->hasAttributes) && \$this->AutoGrid->hasAttributes === true): ?>
\t\t</div>
\t\t<?php if(isset(\$this->AutoGrid->shstop) && \$this->AutoGrid->shstop === true): ?>
\t\t\t</div>
\t\t<?php endif; ?>
\t<?php endif;?>
</div>
<?php endif;?>", "@pct_autogrid/form_autogrid_col.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_autogrid/templates/form_autogrid_col.html5");
    }
}
