<?php

namespace {
\Contao\System::loadLanguageFile('tl_files');
$GLOBALS['TL_DCA']['tl_templates'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Folder::class, 'uploadPath' => 'templates', 'editableFileTypes' => 'html5,twig', 'closed' => \true, 'onload_callback' => array(array('tl_templates', 'addBreadcrumb'))),
    // List
    'list' => array('global_operations' => array('new' => array('href' => 'act=paste&amp;mode=create', 'class' => 'header_new_folder'), 'new_tpl' => array('href' => 'key=new_tpl', 'class' => 'header_new')), 'operations' => array('edit', 'copy' => array('label' => &$GLOBALS['TL_LANG']['tl_files']['copy'], 'href' => 'act=paste&amp;mode=copy', 'icon' => 'copy.svg', 'attributes' => 'data-action="contao--scroll-offset#store"'), 'cut' => array('label' => &$GLOBALS['TL_LANG']['tl_files']['cut'], 'href' => 'act=paste&amp;mode=cut', 'icon' => 'cut.svg', 'attributes' => 'data-action="contao--scroll-offset#store"'), 'delete', 'source' => array('label' => &$GLOBALS['TL_LANG']['tl_files']['source'], 'href' => 'act=source', 'icon' => 'editor.svg', 'button_callback' => array('tl_templates', 'editSource')), 'compare' => array('href' => 'key=compare', 'icon' => 'diffTemplate.svg', 'button_callback' => array('tl_templates', 'compareButton')), 'drag' => array('label' => &$GLOBALS['TL_LANG']['tl_files']['cut'], 'icon' => 'drag.svg', 'attributes' => 'class="drag-handle" aria-hidden="true"', 'button_callback' => array('tl_templates', 'dragFile')))),
    // Palettes
    'palettes' => array('default' => 'name'),
    // Fields
    'fields' => array('name' => array('exclude' => \false, 'label' => &$GLOBALS['TL_LANG']['tl_files']['name'], 'inputType' => 'text', 'load_callback' => array(array('tl_templates', 'addFileLocation')), 'eval' => array('mandatory' => \true, 'maxlength' => 64, 'spaceToUnderscore' => \true, 'tl_class' => 'w50'))),
);
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_templates extends \Contao\Backend
{
    /**
     * Add the breadcrumb menu
     *
     * @throws RuntimeException
     */
    public function addBreadcrumb()
    {
        $objSessionBag = \Contao\System::getContainer()->get('request_stack')->getSession()->getBag('contao_backend');
        // Set a new node
        if (\Contao\Input::get('fn') !== \null) {
            // Check the path (thanks to Arnaud Buchoux)
            if (\Contao\Validator::isInsecurePath(\Contao\Input::get('fn', \true))) {
                throw new \RuntimeException('Insecure path ' . \Contao\Input::get('fn', \true));
            }
            $objSessionBag->set('tl_templates_node', \Contao\Input::get('fn', \true));
            $this->redirect(\preg_replace('/[?&]fn=[^&]*/', '', \Contao\Environment::get('requestUri')));
        }
        $strNode = $objSessionBag->get('tl_templates_node');
        if (!$strNode) {
            return;
        }
        // Check the path (thanks to Arnaud Buchoux)
        if (\Contao\Validator::isInsecurePath($strNode)) {
            throw new \RuntimeException('Insecure path ' . $strNode);
        }
        $projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
        // The currently selected folder does not exist
        if (!\is_dir($projectDir . '/' . $strNode)) {
            $objSessionBag->set('tl_templates_node', '');
            return;
        }
        $strPath = 'templates';
        $arrNodes = \explode('/', \preg_replace('/^templates\\//', '', $strNode));
        $arrLinks = array();
        // Add root link
        $arrLinks[] = \Contao\Image::getHtml('filemounts.svg') . ' <a href="' . $this->addToUrl('fn=') . '" title="' . \Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['selectAllNodes']) . '">' . $GLOBALS['TL_LANG']['MSC']['filterAll'] . '</a>';
        // Generate breadcrumb trail
        foreach ($arrNodes as $strFolder) {
            $strPath .= '/' . $strFolder;
            // No link for the active folder
            if ($strFolder == \basename($strNode)) {
                $arrLinks[] = \Contao\Image::getHtml('folderC.svg') . ' ' . $strFolder;
            } else {
                $arrLinks[] = \Contao\Image::getHtml('folderC.svg') . ' <a href="' . $this->addToUrl('fn=' . $strPath) . '" title="' . \Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['selectNode']) . '">' . $strFolder . '</a>';
            }
        }
        // Limit tree
        $GLOBALS['TL_DCA']['tl_templates']['list']['sorting']['root'] = array($strNode);
        // Insert breadcrumb menu
        $GLOBALS['TL_DCA']['tl_templates']['list']['sorting']['breadcrumb'] = '

<nav aria-label="' . $GLOBALS['TL_LANG']['MSC']['breadcrumbMenu'] . '">
  <ul id="tl_breadcrumb">
    <li>' . \implode(' › </li><li>', $arrLinks) . '</li>
  </ul>
</nav>';
    }
    /**
     * Create a new template
     *
     * @return string
     */
    public function addNewTemplate()
    {
        $arrAllTemplates = array();
        // Add modern templates
        $container = \Contao\System::getContainer();
        $chains = $container->get('contao.twig.filesystem_loader')->getInheritanceChains();
        foreach ($chains as $identifier => $chain) {
            if (!\str_contains($identifier, '/')) {
                continue;
            }
            $parts = \explode('/', $identifier);
            $rootCategory = \array_shift($parts);
            $arrAllTemplates[$rootCategory]["@Contao/{$identifier}.html.twig"] = \sprintf('%s [%s.html.twig]', \implode('/', $parts), $identifier);
            \ksort($arrAllTemplates[$rootCategory]);
        }
        $files = $container->get('contao.resource_finder')->findIn('templates')->files()->name('/\\.html5$/');
        $projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
        // Add legacy templates
        foreach ($files as $file) {
            // Do not use "StringUtil::stripRootDir()" here, because for
            // symlinked bundles, the path will be outside the project dir.
            $strRelpath = \Symfony\Component\Filesystem\Path::makeRelative($file->getPathname(), $projectDir);
            $modulePatterns = array("vendor/([^/]+/[^/]+)", "\\.\\..*?([^/]+/[^/]+)/(?:src/Resources/contao/templates|contao/templates)", "system/modules/([^/]+)");
            \preg_match('@^(?|' . \implode('|', $modulePatterns) . ')/.*$@', $strRelpath, $matches);
            // Use the matched "module" group and fall back to the full
            // directory path (e.g. "contao/templates" in the app).
            $strModule = $matches[1] ?? \dirname($strRelpath);
            $arrAllTemplates[$strModule][$strRelpath] = \basename($strRelpath);
        }
        $strError = '';
        // Handle creating a new template
        if (\Contao\Input::post('FORM_SUBMIT') == 'tl_create_template') {
            $createModernTemplate = static function (string $template, string $target) use($container, &$strError) : void {
                $filesystem = new \Symfony\Component\Filesystem\Filesystem();
                $targetFile = \Symfony\Component\Filesystem\Path::join($container->getParameter('kernel.project_dir'), $target, \substr($template, 8));
                if ($filesystem->exists($targetFile)) {
                    $strError = \sprintf($GLOBALS['TL_LANG']['tl_templates']['exists'], $targetFile);
                    return;
                }
                try {
                    $info = $container->get('contao.twig.inspector')->inspectTemplate($template);
                } catch (\Contao\CoreBundle\Twig\Inspector\InspectionException $e) {
                    if ($e->getPrevious() instanceof \Twig\Error\LoaderError) {
                        throw new \RuntimeException('Invalid template ' . $template);
                    }
                    $strError = \sprintf($GLOBALS['TL_LANG']['tl_templates']['hasErrors'], $template, $e->getPrevious()->getMessage());
                    return;
                }
                $content = $container->get('twig')->render('@Contao/backend/template_skeleton.html.twig', array('type' => \str_starts_with($template, '@Contao/component') ? 'use' : 'extends', 'template' => $info));
                $filesystem->dumpFile($targetFile, $content);
            };
            $createLegacyTemplate = static function (string $strOriginal, $strTarget) use(&$strError, $arrAllTemplates) : void {
                $projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
                // Validate the target path
                if (!\str_starts_with($strTarget, 'templates') || !\is_dir($projectDir . '/' . $strTarget)) {
                    $strError = \sprintf($GLOBALS['TL_LANG']['tl_templates']['invalid'], $strTarget);
                } else {
                    $blnFound = \false;
                    // Validate the source path
                    foreach ($arrAllTemplates as $arrTemplates) {
                        if (isset($arrTemplates[$strOriginal])) {
                            $blnFound = \true;
                            break;
                        }
                    }
                    if (!$blnFound) {
                        $strError = \sprintf($GLOBALS['TL_LANG']['tl_templates']['invalid'], $strOriginal);
                    } else {
                        $strTarget .= '/' . \basename($strOriginal);
                        // Check whether the target file exists
                        if (\file_exists($projectDir . '/' . $strTarget)) {
                            $strError = \sprintf($GLOBALS['TL_LANG']['tl_templates']['exists'], $strTarget);
                        } else {
                            (new \Symfony\Component\Filesystem\Filesystem())->copy(\Symfony\Component\Filesystem\Path::makeAbsolute($strOriginal, $projectDir), \Symfony\Component\Filesystem\Path::makeAbsolute($strTarget, $projectDir));
                        }
                    }
                }
            };
            $strTarget = \Contao\Input::post('target', \true);
            if (\Contao\Validator::isInsecurePath($strTarget)) {
                throw new \RuntimeException('Invalid path ' . $strTarget);
            }
            $strOriginal = \Contao\Input::post('original', \true);
            if (\str_starts_with($strOriginal, '@')) {
                $createModernTemplate($strOriginal, $strTarget);
            } else {
                $createLegacyTemplate($strOriginal, $strTarget);
            }
            if (!$strError) {
                $this->redirect($this->getReferer());
            }
        }
        $strAllTemplates = '';
        // Group the templates by module
        foreach ($arrAllTemplates as $k => $v) {
            $strAllTemplates .= '<optgroup label="' . $k . '">';
            foreach ($v as $kk => $vv) {
                $strAllTemplates .= \sprintf('<option value="%s"%s>%s</option>', $kk, \Contao\Input::post('original') == $kk ? ' selected="selected"' : '', $vv);
            }
            $strAllTemplates .= '</optgroup>';
        }
        // Show form
        return ($strError ? '
<div class="tl_message">
<p class="tl_error">' . \Contao\StringUtil::specialchars($strError) . '</p>
</div>' : '') . '

<div id="tl_buttons">
<a href="' . $this->getReferer(\true) . '" class="header_back" title="' . \Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['backBTTitle']) . '" accesskey="b" data-action="contao--scroll-offset#store">' . $GLOBALS['TL_LANG']['MSC']['backBT'] . '</a>
</div>

<form id="tl_create_template" class="tl_form tl_edit_form" method="post">
<div class="tl_formbody_edit">
<input type="hidden" name="FORM_SUBMIT" value="tl_create_template">
<input type="hidden" name="REQUEST_TOKEN" value="' . \htmlspecialchars(\Contao\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(), \ENT_QUOTES | \ENT_SUBSTITUTE | \ENT_HTML5) . '">
<div class="tl_tbox cf">
<div class="w50 widget">
  <h3><label for="ctrl_original">' . $GLOBALS['TL_LANG']['tl_templates']['original'][0] . '</label></h3>
  <select name="original" id="ctrl_original" class="tl_select tl_chosen" data-action="focus->contao--scroll-offset#store">' . $strAllTemplates . '</select>' . ($GLOBALS['TL_LANG']['tl_templates']['original'][1] && \Contao\Config::get('showHelp') ? '
  <p class="tl_help tl_tip">' . $GLOBALS['TL_LANG']['tl_templates']['original'][1] . '</p>' : '') . '
</div>
<div class="w50 widget">
  <h3><label for="ctrl_target">' . $GLOBALS['TL_LANG']['tl_templates']['target'][0] . '</label></h3>
  <select name="target" id="ctrl_target" class="tl_select" data-action="focus->contao--scroll-offset#store"><option value="templates">templates</option>' . $this->getTargetFolders('templates') . '</select>' . ($GLOBALS['TL_LANG']['tl_templates']['target'][1] && \Contao\Config::get('showHelp') ? '
  <p class="tl_help tl_tip">' . $GLOBALS['TL_LANG']['tl_templates']['target'][1] . '</p>' : '') . '
</div>
</div>
</div>

<div class="tl_formbody_submit">
<div class="tl_submit_container">
  <button type="submit" name="create" id="create" class="tl_submit" accesskey="s">' . $GLOBALS['TL_LANG']['tl_templates']['newTpl'] . '</button>
</div>
</div>
</form>';
    }
    /**
     * Compares the current to the original template
     *
     * @param DataContainer $dc
     *
     * @throws InternalServerErrorException
     */
    public function compareTemplate(\Contao\DataContainer $dc) : never
    {
        $objCurrentFile = new \Contao\File($dc->id);
        $strName = $objCurrentFile->filename;
        $strExtension = $objCurrentFile->extension;
        $arrTemplates = \Contao\TemplateLoader::getFiles();
        $blnOverridesAnotherTpl = isset($arrTemplates[$strName]);
        $strPrefix = '';
        if (($pos = \strpos($strName, '_')) !== \false) {
            $strPrefix = \substr($strName, 0, $pos + 1);
        }
        $strBuffer = '';
        $strCompareName = \null;
        $strComparePath = \null;
        // By default, it's the original template to compare against
        if ($blnOverridesAnotherTpl) {
            $strCompareName = $strName;
            $strComparePath = $arrTemplates[$strCompareName] . '/' . $strCompareName . '.' . $strExtension;
            $strBuffer .= '<p class="tl_info" style="margin-bottom:1em">' . \sprintf($GLOBALS['TL_LANG']['tl_templates']['overridesAnotherTpl'], $strComparePath) . '</p>';
        } else {
            // Try to find the base template by stripping suffixes
            while (\str_contains($strName, '_')) {
                $strName = \substr($strName, 0, \strrpos($strName, '_'));
                if (isset($arrTemplates[$strName])) {
                    $strCompareName = $strName;
                    $strComparePath = $arrTemplates[$strCompareName] . '/' . $strCompareName . '.' . $strExtension;
                    break;
                }
            }
        }
        // User selected template to compare against
        if (\Contao\Input::post('from') && isset($arrTemplates[\Contao\Input::post('from')])) {
            $strCompareName = \Contao\Input::post('from');
            $strComparePath = $arrTemplates[$strCompareName] . '/' . $strCompareName . '.' . $strExtension;
        }
        if ($strComparePath !== \null) {
            $objCompareFile = new \Contao\File($strComparePath);
            // Abort if one file is missing
            if (!$objCurrentFile->exists() || !$objCompareFile->exists()) {
                throw new \Contao\CoreBundle\Exception\InternalServerErrorException('The source or target file does not exist.');
            }
            $objDiff = new \Diff($objCompareFile->getContentAsArray(), $objCurrentFile->getContentAsArray());
            $strDiff = $objDiff->render(new \Contao\DiffRenderer(array('field' => $dc->id)));
            // Identical versions
            if (!$strDiff) {
                $strBuffer .= '<p>' . $GLOBALS['TL_LANG']['MSC']['identicalVersions'] . '</p>';
            } else {
                $strBuffer .= $strDiff;
            }
        } else {
            $strBuffer .= '<p class="tl_info">' . $GLOBALS['TL_LANG']['tl_templates']['pleaseSelect'] . '</p>';
        }
        // Unset a custom prefix to show all templates in the drop-down menu (see #784)
        if ($strPrefix && \count(\Contao\TemplateLoader::getPrefixedFiles($strPrefix)) < 1) {
            $strPrefix = '';
        }
        // Templates to compare against
        $arrComparable = array();
        $intPrefixLength = \strlen($strPrefix);
        foreach ($arrTemplates as $k => $v) {
            if (!$intPrefixLength || 0 === \strncmp($k, $strPrefix, $intPrefixLength)) {
                $arrComparable[$k] = array('version' => $k, 'info' => $k . '.' . $strExtension);
            }
        }
        \ksort($arrComparable);
        $objTemplate = new \Contao\BackendTemplate('be_diff');
        $objTemplate->staticTo = $dc->id;
        $objTemplate->versions = $arrComparable;
        $objTemplate->from = $strCompareName;
        $objTemplate->showLabel = \Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['showDifferences']);
        $objTemplate->content = $strBuffer;
        $objTemplate->theme = \Contao\Backend::getTheme();
        $objTemplate->language = $GLOBALS['TL_LANGUAGE'];
        $objTemplate->title = \Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['showDifferences']);
        $objTemplate->charset = \Contao\System::getContainer()->getParameter('kernel.charset');
        throw new \Contao\CoreBundle\Exception\ResponseException($objTemplate->getResponse());
    }
    /**
     * Return the "compare template" button
     *
     * @param array  $row
     * @param string $href
     * @param string $label
     * @param string $title
     * @param string $icon
     * @param string $attributes
     *
     * @return string
     */
    public function compareButton($row, $href, $label, $title, $icon, $attributes)
    {
        return \str_ends_with($row['id'], '.html5') && \is_file(\Contao\System::getContainer()->getParameter('kernel.project_dir') . '/' . \rawurldecode($row['id'])) ? '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . \Contao\StringUtil::specialchars($title) . '" onclick="Backend.openModalIframe({\'title\':\'' . \Contao\StringUtil::specialchars(\str_replace("'", "\\'", \rawurldecode($row['id']))) . '\',\'url\':this.href});return false"' . $attributes . '>' . \Contao\Image::getHtml($icon, $label) . '</a> ' : \Contao\Image::getHtml(\str_replace('.svg', '--disabled.svg', $icon)) . ' ';
    }
    /**
     * Return the drag file button
     *
     * @param array  $row
     * @param string $href
     * @param string $label
     * @param string $title
     * @param string $icon
     * @param string $attributes
     *
     * @return string
     */
    public function dragFile($row, $href, $label, $title, $icon, $attributes)
    {
        return '<button type="button" title="' . \Contao\StringUtil::specialchars($title) . '" ' . $attributes . '>' . \Contao\Image::getHtml($icon, $label) . '</button> ';
    }
    /**
     * Recursively scan the templates directory and return all folders as array
     *
     * @param string  $strFolder
     * @param integer $intLevel
     *
     * @return string
     */
    protected function getTargetFolders($strFolder, $intLevel = 1)
    {
        $strFolders = '';
        $strPath = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/' . $strFolder;
        foreach (\Contao\Folder::scan($strPath) as $strFile) {
            if (!\is_dir($strPath . '/' . $strFile) || \str_starts_with($strFile, '.')) {
                continue;
            }
            $strRelPath = $strFolder . '/' . $strFile;
            $strFolders .= \sprintf('<option value="%s"%s>%s%s</option>', $strRelPath, \Contao\Input::post('target') == $strRelPath ? ' selected="selected"' : '', \str_repeat(' &nbsp; ', $intLevel), \basename($strRelPath));
            $strFolders .= $this->getTargetFolders($strRelPath, $intLevel + 1);
        }
        return $strFolders;
    }
    /**
     * Return the edit file source button
     *
     * @param array  $row
     * @param string $href
     * @param string $label
     * @param string $title
     * @param string $icon
     * @param string $attributes
     *
     * @return string
     */
    public function editSource($row, $href, $label, $title, $icon, $attributes)
    {
        /** @var DC_Folder $dc */
        $dc = \func_num_args() <= 12 ? \null : \func_get_arg(12);
        $arrEditableFileTypes = $dc->editableFileTypes ?? \Contao\StringUtil::trimsplit(',', \strtolower($GLOBALS['TL_DCA']['tl_templates']['config']['editableFileTypes'] ?? \Contao\System::getContainer()->getParameter('contao.editable_files')));
        return \in_array(\Symfony\Component\Filesystem\Path::getExtension($row['id'], \true), $arrEditableFileTypes) && \is_file(\Contao\System::getContainer()->getParameter('kernel.project_dir') . '/' . \rawurldecode($row['id'])) ? '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . \Contao\StringUtil::specialchars($title) . '"' . $attributes . '>' . \Contao\Image::getHtml($icon, $label) . '</a> ' : \Contao\Image::getHtml(\str_replace('.svg', '--disabled.svg', $icon)) . ' ';
    }
    /**
     * Add the file location instead of the help text (see #6503)
     *
     * @param mixed         $value
     * @param DataContainer $dc
     *
     * @return mixed
     */
    public function addFileLocation($value, \Contao\DataContainer $dc)
    {
        $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['label'][1] = \sprintf($GLOBALS['TL_LANG']['tl_files']['fileLocation'], $dc->id);
        return $value;
    }
}
}
