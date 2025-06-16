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

/* @pct_autogrid/autogrid.html5 */
class __TwigTemplate_31177ea845d79cb5d53ee9c2ea1dffec extends Template
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
// remove margin classes from content element
if(\$this->AutoGrid->Margins->classes)
{
\tif( preg_match('/class=\\\"(.*?)\\\"/',\$this->html,\$result) && strpos(\$this->html,\$this->AutoGrid->Margins->classes) )
\t{
\t\t\$classes = array_map('trim', array_filter( explode(' ', str_replace(\$this->AutoGrid->Margins->classes,'',\$result[1]) ) ) );
\t\t\$this->html = str_replace(\$result[1],implode(' ',\$classes),\$this->html);
\t}
}
?>

<div class=\"column <?= \$this->AutoGrid->classes; ?><?php if(\$this->AutoGrid->Margins->classes): ?> <?= \$this->AutoGrid->Margins->classes; ?><?php endif; ?>\">
\t<?php if(\$this->autogrid_addStyling && \$this->AutoGrid->hasStyles): ?>
\t<div class=\"attributes<?php if(\$this->AutoGrid->Image && !\$this->AutoGrid->hasContent): ?> has-image empty<?php endif; ?><?php if(\$this->autogrid_padding_css): ?> <?= \$this->autogrid_padding_css; ?><?php endif; ?>\" style=\"<?= implode(' ', \$this->AutoGrid->styles); ?>\">
\t\t<?php if(\$this->AutoGrid->Image && !\$this->AutoGrid->hasContent): ?>
\t\t<figure class=\"image_container image_mob\"><?php \$this->insert('picture_default', \$this->AutoGrid->Image->picture); ?></figure>
\t\t<?php endif; ?>
\t<?php endif; ?>

\t<?= \$this->html; ?>

\t<?php if(\$this->autogrid_addStyling && \$this->AutoGrid->hasStyles): ?>
\t</div>
\t<?php endif; ?>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_autogrid/autogrid.html5";
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
        return new Source("", "@pct_autogrid/autogrid.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_autogrid/templates/autogrid.html5");
    }
}
