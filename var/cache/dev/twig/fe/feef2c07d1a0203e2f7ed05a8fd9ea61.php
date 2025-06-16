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

/* @pct_customelements/backend/tinymce.html5 */
class __TwigTemplate_f0e4e50bb0bccc0bac251af8d6be7b47 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/backend/tinymce.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/backend/tinymce.html5"));

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
      mode: 'exact',
      selector: 'textarea[name=\"<?= \$this->selector; ?>\"]',
      min_height: 336,
      //mode: \"specific_textareas\",
      //editor_selector: \"<?= \$this->selector; ?>\",
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
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements/backend/tinymce.html5";
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

namespace Contao;

use Contao\\CoreBundle\\ContaoCoreBundle;

if (Config::get('useRTE')) : ?>
  <?php
  \$GLOBALS['TL_JAVASCRIPT'][] = \$this->asset('js/tinymce.min.js', 'contao-components/tinymce4');
  ?>
  <script>
    var options = {
      mode: 'exact',
      selector: 'textarea[name=\"<?= \$this->selector; ?>\"]',
      min_height: 336,
      //mode: \"specific_textareas\",
      //editor_selector: \"<?= \$this->selector; ?>\",
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
<?php endif; ?>", "@pct_customelements/backend/tinymce.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/backend/tinymce.html5");
    }
}
