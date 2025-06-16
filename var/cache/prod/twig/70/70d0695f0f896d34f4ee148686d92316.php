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

/* @pct_themer/themedesigner/css/css_webfonts.html5 */
class __TwigTemplate_01e375dd842d1e07d572ced57c3c1752 extends Template
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
        yield "<?php if( isset(\$this->fonts['Abeezee']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Abeezee';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/abeezee-v22-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Abel']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Abel';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/abel-v18-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Abhaya+Libre']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Abhaya Libre';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/abhaya-libre-v17-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Abhaya Libre';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/abhaya-libre-v17-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Abril+Fatface']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Abril Fatface';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/abril-fatface-v23-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Aclonica']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Aclonica';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/aclonica-v22-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Acme']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Acme';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/acme-v25-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Actor']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Actor';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/actor-v17-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Adamina']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Adamina';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/adamina-v21-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Advent+Pro']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Advent Pro';
  font-style: normal;
  font-weight: 200;
  src: url('<?= \$this->path; ?>/advent-pro-v28-latin-200.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Advent Pro';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/advent-pro-v28-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Advent Pro';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/advent-pro-v28-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Advent Pro';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/advent-pro-v28-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Aguafina+Script']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Aguafina Script';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/aguafina-script-v22-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Aldrich']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Aldrich';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/aldrich-v21-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Alef']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Alef';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/alef-v21-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Alef';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/alef-v21-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Alegreya']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Alegreya';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/alegreya-v35-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Alegreya';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/alegreya-v35-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Alegreya+Sans']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Alegreya Sans';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/alegreya-sans-v24-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Alegreya Sans';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/alegreya-sans-v24-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Alegreya Sans';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/alegreya-sans-v24-latin-300.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Alegreya+Sc']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Alegreya Sc';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/alegreya-sc-v25-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Alegreya Sc';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/alegreya-sc-v25-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Alex+Brush']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Alex Brush';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/alex-brush-v22-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Alfa+Slab+One']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Alfa Slab One';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/alfa-slab-one-v19-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Alice']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Alice';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/alice-v20-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Alike+Angular']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Alike Angular';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/alike-angular-v25-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Allan']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Allan';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/allan-v24-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Allan';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/allan-v24-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Allerta+Stencil']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Allerta Stencil';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/allerta-stencil-v22-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Allura']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Allura';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/allura-v21-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Almendra']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Almendra';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/almendra-v26-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Almendra';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/almendra-v26-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Amatic+SC']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Amatic SC';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/amatic-sc-v26-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Amatic SC';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/amatic-sc-v26-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Anaheim']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Anaheim';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/anaheim-v15-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Andada+Pro']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Andada Pro';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/andada-pro-v20-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Annie+Use+Your+Telescope']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Annie Use Your Telescope';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/annie-use-your-telescope-v18-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Anton']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Anton';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/anton-v25-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Archivo+Narrow']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Archivo Narrow';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/archivo-narrow-v30-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Archivo Narrow';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/archivo-narrow-v30-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Arsenal']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Arsenal';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/arsenal-v12-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Arsenal';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/arsenal-v12-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Audiowide']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Audiowide';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/audiowide-v20-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Biryani']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Biryani';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/biryani-v13-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Biryani';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/biryani-v13-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Biryani';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/biryani-v13-latin-300.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Bitter']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Bitter';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/bitter-v36-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Bitter';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/bitter-v36-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Cairo']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Cairo';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/cairo-v28-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Cairo';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/cairo-v28-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Cairo';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/cairo-v28-latin-300.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Cardo']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Cardo';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/cardo-v19-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Cardo';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/cardo-v19-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Cinzel']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Cinzel';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/cinzel-v23-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Cinzel';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/cinzel-v23-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Cinzel+Decorative']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Cinzel Decorative';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/cinzel-decorative-v16-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Cinzel Decorative';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/cinzel-decorative-v16-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Comfortaa']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Comfortaa';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/comfortaa-v45-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Comfortaa';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/comfortaa-v45-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Comfortaa';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/comfortaa-v45-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Cormorant']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Cormorant';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/cormorant-v21-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Cormorant';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/cormorant-v21-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Cormorant+Infant']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Cormorant Infant';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/cormorant-infant-v17-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Cormorant Infant';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/cormorant-infant-v17-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Cormorant Infant';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/cormorant-infant-v17-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Courgette']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Courgette';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/courgette-v17-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Cutive+Mono']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Cutive Mono';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/cutive-mono-v21-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Dm+Serif+Display']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Dm Serif Display';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/dm-serif-display-v15-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Dosis']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Dosis';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/dosis-v32-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Dosis';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/dosis-v32-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Dosis';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/dosis-v32-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Dosis';
  font-style: normal;
  font-weight: 200;
  src: url('<?= \$this->path; ?>/dosis-v32-latin-200.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Exo']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Exo';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/exo-v21-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Exo';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/exo-v21-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Exo';
  font-style: normal;
  font-weight: 200;
  src: url('<?= \$this->path; ?>/exo-v21-latin-200.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Exo';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/exo-v21-latin-300.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Fjalla+One']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Fjalla One';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/fjalla-one-v15-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Glass+Antiqua']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Glass Antiqua';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/glass-antiqua-v24-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Inconsolata']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Inconsolata';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/inconsolata-v32-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Inconsolata';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/inconsolata-v32-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Josefin+Sans']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Josefin Sans';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/josefin-sans-v32-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Josefin Sans';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/josefin-sans-v32-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Josefin Sans';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/josefin-sans-v32-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Josefin+Slab']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Josefin Slab';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/josefin-slab-v26-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Josefin Slab';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/josefin-slab-v26-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Josefin Slab';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/josefin-slab-v26-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Jost']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Jost';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/jost-v15-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Jost';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/jost-v15-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Jost';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/jost-v15-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Jost';
  font-style: normal;
  font-weight: 500;
  src: url('<?= \$this->path; ?>/jost-v15-latin-500.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Karla']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Karla';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/karla-v31-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Karla';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/karla-v31-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['La+Belle+Aurore']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'La Belle Aurore';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/la-belle-aurore-v20-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Lato']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Lato';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/lato-v24-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Lato';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/lato-v24-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Lato';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/lato-v24-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Lobster']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Lobster';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/lobster-v30-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Lora']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Lora';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/lora-v35-latin-regular.woff2') format('woff2');
}
<?php endif; ?>

<?php if( isset(\$this->fonts['Manrope']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Manrope';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/manrope-v15-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Manrope';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/manrope-v15-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Manrope';
  font-style: normal;
  font-weight: 500;
  src: url('<?= \$this->path; ?>/manrope-v15-latin-500.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Manrope';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/manrope-v15-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Merriweather']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Merriweather';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/merriweather-v30-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Merriweather';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/merriweather-v30-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Merriweather';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/merriweather-v30-latin-300.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Montserrat']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/montserrat-v26-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/montserrat-v26-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Nunito']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Nunito';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/nunito-v26-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Nunito';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/nunito-v26-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Nunito';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/nunito-v26-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Nunito+Sans']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Nunito Sans';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/nunito-sans-v15-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Nunito Sans';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/nunito-sans-v15-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Nunito Sans';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/nunito-sans-v15-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Open+Sans']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/open-sans-v40-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/open-sans-v40-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/open-sans-v40-latin-300.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Oswald']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Oswald';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/oswald-v53-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Oswald';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/oswald-v53-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Oswald';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/oswald-v53-latin-300.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Patua+One']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Patua One';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/patua-one-v20-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Playfair+Display']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Playfair Display';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/playfair-display-v37-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Playfair Display';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/playfair-display-v37-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Poppins']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/poppins-v21-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/poppins-v21-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/poppins-v21-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 500;
  src: url('<?= \$this->path; ?>/poppins-v21-latin-500.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Quicksand']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Quicksand';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/quicksand-v31-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Quicksand';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/quicksand-v31-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Quicksand';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/quicksand-v31-latin-300.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Raleway']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/raleway-v34-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 600;
  src: url('<?= \$this->path; ?>/raleway-v34-latin-600.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/raleway-v34-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/raleway-v34-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 200;
  src: url('<?= \$this->path; ?>/raleway-v34-latin-200.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Roboto']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 500;
  src: url('<?= \$this->path; ?>/roboto-v32-latin-500.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/roboto-v32-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/roboto-v32-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/roboto-v32-latin-300.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Roboto+Condensed']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Roboto Condensed';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/roboto-condensed-v27-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Roboto Condensed';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/roboto-condensed-v27-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Roboto Condensed';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/roboto-condensed-v27-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Roboto+Slab']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Roboto Slab';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/roboto-slab-v34-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Roboto Slab';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/roboto-slab-v34-latin-regular.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Roboto Slab';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/roboto-slab-v34-latin-700.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Sacramento']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Sacramento';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/sacramento-v15-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Scada']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Scada';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/scada-v15-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Scada';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/scada-v15-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Source+Sans+Pro']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Source Sans Pro';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/sourcesanspro-v22-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Source Sans Pro';
  font-style: normal;
  font-weight: 600;
  src: url('<?= \$this->path; ?>/sourcesanspro-v22-latin-600.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Source Sans Pro';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/sourcesanspro-v22-latin-400.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Titillium+Web']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Titillium Web';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/titillium-web-v17-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Titillium Web';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/titillium-web-v17-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Titillium Web';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/titillium-web-v17-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Ubuntu']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Ubuntu';
  font-style: normal;
  font-weight: 300;
  src: url('<?= \$this->path; ?>/ubuntu-v20-latin-300.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Ubuntu';
  font-style: normal;
  font-weight: 700;
  src: url('<?= \$this->path; ?>/ubuntu-v20-latin-700.woff2') format('woff2');
}
@font-face {
  font-display: swap;
  font-family: 'Ubuntu';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/ubuntu-v20-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Unica+One']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Unica One';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/unica-one-v18-latin-regular.woff2') format('woff2');
}
<?php endif; ?>
<?php if( isset(\$this->fonts['Vibur']) ): ?>
@font-face {
  font-display: swap;
  font-family: 'Vibur';
  font-style: normal;
  font-weight: 400;
  src: url('<?= \$this->path; ?>/vibur-v23-latin-regular.woff2') format('woff2');
}
<?php endif; ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/css/css_webfonts.html5";
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
        return new Source("", "@pct_themer/themedesigner/css/css_webfonts.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/css/css_webfonts.html5");
    }
}
