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

/* @pct_theme_templates/backend/be_tinyMCE.html5 */
class __TwigTemplate_158cb42a7b69eda6d251d5831b0ef5d9 extends Template
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

use Contao\\CoreBundle\\ContaoCoreBundle;

if (Config::get('useRTE')) : ?>
  <?php
  \$GLOBALS['TL_JAVASCRIPT'][] = \$this->asset('js/tinymce.min.js', 'contao-components/tinymce4');
  ?>
  <script>
    var options = {
      selector: '#<?= \$this->selector; ?>',
      language: '<?= Backend::getTinyMceLanguage() ?>',
      element_format: 'html',
      document_base_url: '<?= Environment::get('base') ?>',
      entities: '160,nbsp,60,lt,62,gt,173,shy',
      branding: false,
      promotion: false,
      setup: function(editor) {
        editor.getElement().removeAttribute('required');
        document.querySelectorAll('[accesskey]').forEach(function(el) {
          editor.addShortcut('access+' + el.accessKey, el.id, () => el.click());
        });
      },
      init_instance_callback: function(editor) {
        if (document.activeElement && document.activeElement.id && document.activeElement.id == editor.id) {
          editor.editorManager.get(editor.id).focus();
        }
        editor.on('focus', () => window.dispatchEvent(new Event('store-scroll-offset')));
      },
      <?php \$this->block('picker'); ?>
      file_picker_callback: function(callback, value, meta) {
        Backend.openModalSelector({
          'id': 'tl_listing',
          'title': document.getElement('.tox-dialog__title').get('text'),
          'url': Contao.routes.backend_picker + '?context=' + (meta.filetype == 'file' ? 'link' : 'file') + '&amp;extras[fieldType]=radio&amp;extras[filesOnly]=true&amp;extras[source]=<?= \$this->source ?>&amp;value=' + value + '&amp;popup=1',
          'callback': function(table, val) {
            callback(val.join(','));
          }
        });
      },
      file_picker_types: <?= json_encode(\$this->fileBrowserTypes) ?>,
      <?php \$this->endblock(); ?>

      <?php \$this->block('plugins'); ?>
      plugins: 'autosave charmap code fullscreen image importcss link lists searchreplace stripnbsp table visualblocks visualchars',
      <?php \$this->endblock(); ?>

      <?php \$this->block('valid_elements'); ?>
      extended_valid_elements: 'q[cite|class|title],article,section,hgroup,figure,figcaption',
      <?php \$this->endblock(); ?>

      <?php \$this->block('menubar'); ?>
      menubar: 'file edit insert view format table',
      <?php \$this->endblock(); ?>

      <?php \$this->block('toolbar'); ?>
      toolbar: 'link unlink | image | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code',
      <?php \$this->endblock(); ?>

      <?php \$this->block('contextmenu'); ?>
      contextmenu: false,
      <?php \$this->endblock(); ?>

      <?php \$this->block('cache_suffix'); ?>
      cache_suffix: '?v=<?= \$this->assetVersion('js/tinymce.min.js', 'contao-components/tinymce4') ?>',
      <?php \$this->endblock(); ?>

      <?php \$this->block('custom'); ?>
      <?php \$this->endblock(); ?>

      tabfocus_elements: ':prev,:next',
      browser_spellcheck: true,
      importcss_append: true
    };

    options.content_css = [],
    <?php
    \$bundles = array_keys(\\Contao\\System::getContainer()->getParameter('kernel.bundles'));
    if (in_array('pct_theme_templates', \$bundles)) : ?>
      options.importcss_groups = [{
        title: 'cto_layout/css/tinymce.css'
      }];
      <?php \$this->block('content_css'); ?>
      options.content_css.push('files/cto_layout/css/tinymce.css');
      <?php \$this->endblock(); ?>
    <?php endif; ?>

    <?php if (version_compare(ContaoCoreBundle::getVersion(), '5.0', '>=')) : ?>
      options.skin = (document.documentElement.dataset.colorScheme === 'dark' ? 'tinymce-5-dark' : 'tinymce-5');

      <?php \$this->block('content_css'); ?>
      options.content_css.push( document.documentElement.dataset.colorScheme === 'dark' ? '<?= \$this->asset('tinymce-dark.css', 'system/themes/' . Backend::getTheme()) ?>' : '<?= \$this->asset('tinymce.css', 'system/themes/' . Backend::getTheme()) ?>' );
      <?php \$this->endblock(); ?>
      
      <?php else : ?>
      <?php \$this->block('content_css'); ?>
      options.content_css.push( 'system/themes/<?= Backend::getTheme() ?>/tinymce.min.css' );
      <?php \$this->endblock(); ?>

    <?php endif; ?>
    window.tinymce && tinymce.init(options);
  </script>
<?php endif; ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/backend/be_tinyMCE.html5";
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
        return new Source("", "@pct_theme_templates/backend/be_tinyMCE.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/backend/be_tinyMCE.html5");
    }
}
