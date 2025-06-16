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

/* @pct_frontend_quickedit/interface/interface_contentelement_revolutionslider.html5 */
class __TwigTemplate_dcd9442c99c89d65bd1ca4f8f880f2d3 extends Template
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
namespace Contao;

use PCT\\FrontendQuickEdit\\Controller;

?>
<!-- indexer::stop -->
<div id=\"<?= \$this->selector; ?>_interface\" class=\"pct_edit_interface <?= \$this->Config->table; ?>\" data-id=\"<?= \$this->Config->id; ?>\" data-table=\"<?= \$this->Config->table; ?>\" data-selector=\"<?= \$this->selector; ?>\"<?php
if(\$this->clickToEdit): ?> data-clicktoedit=\"true\"<?php endif; ?>>
<div class=\"__info__ <?= \$this->Config->type; ?> <?= \$this->Config->table; ?>\">
<div>
\t<div><?= \$this->Config->type; ?></div>
</div>
</div>
<div class=\"__buttons__ <?= \$this->Config->table; ?> <?= \$this->Config->type; ?>\">
\t<?php \$button = \$this->buttons['edit']; ?>
\t<div class=\"edit __button__\">
\t<a href=\"<?= \$button['href']; ?>\" class=\"<?= \$button['class']; ?>\"  title=\"<?= \$button['title']; ?>\" <?php if(isset(\$button['target'])): ?>target=\"<?= \$button['target']; ?>\"<?php endif; ?><?= \$button['attributes']; ?>><?= \$button['icon']; ?></a>
\t</div>
\t<?php 
\t// edit RS list view
\t\$objModel = \\RevolutionSlider\\Models\\Slider::findByPk( ContentModel::findByPk(\$this->Config->id)->revolutionslider );
\t\$arrLabels = \$GLOBALS['TL_LANG'][\$this->Config->table];
\t\$params = array('do'=>'revolutionslider','table'=>'tl_revolutionslider_slides','id'=>\$objModel->id,'rt'=>Controller::request_token(),);
\t\$button = array
\t(
\t\t'href' \t\t=> StringUtil::decodeEntities( Environment::get('base').'contao'.'?'.http_build_query(\$params) ),
\t\t'icon'\t  \t=> Image::getHtml(\\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_list.svg'),
\t\t'class'\t\t=> 'edit',
\t\t'title'\t\t=> sprintf( \$arrLabels['edit'][1], \$this->Config->id ),
\t\t'attributes' =>  ' data-size=\"size-l\"'
\t);
\t?>
\t<div class=\"edit_list __button__\">
\t<a href=\"<?= \$button['href']; ?>\" class=\"<?= \$button['class']; ?>\"  title=\"<?= \$button['title']; ?>\" <?php if(isset(\$button['target'])): ?>target=\"<?= \$button['target']; ?>\"<?php endif; ?><?= \$button['attributes']; ?>><?= \$button['icon']; ?></a>
\t</div>
</div>
</div>
<!-- indexer::continue -->";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_frontend_quickedit/interface/interface_contentelement_revolutionslider.html5";
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
        return new Source("", "@pct_frontend_quickedit/interface/interface_contentelement_revolutionslider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_frontend_quickedit/templates/interface/interface_contentelement_revolutionslider.html5");
    }
}
