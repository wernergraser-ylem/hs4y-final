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

/* @pct_themer/themedesigner/css/stylesheet.html5 */
class __TwigTemplate_2eccb02a59ff3111c0d8a7fb9c5df830 extends Template
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
<?php
/**
 * Stylesheet template for generating a css file
 */
?>

<?php if(\$this->accentColor): ?>
:root {
\t--accentColor: <?= \$this->accentColor; ?>;
}
<?php endif; ?>

<?php if(\$this->secondColor): ?>
:root {
\t--secondColor: <?= \$this->secondColor; ?>;
}
<?php endif; ?>

<?php if(\$this->customColor1): ?>
:root {
\t--customColor1: <?= \$this->customColor1; ?>;
}
<?php endif; ?>

<?php if(\$this->customColor2): ?>
:root {
\t--customColor2: <?= \$this->customColor2; ?>;
}
<?php endif; ?>

<?php if(\$this->bgColorLightgray): ?>
:root {
\t--bgColorLightGray: <?= \$this->bgColorLightgray; ?>;
}
<?php endif; ?>

<?php if(\$this->bgColorGray): ?>
:root {
\t--bgColorGray: <?= \$this->bgColorGray; ?>;
}
<?php endif; ?>

<?php if(\$this->bgColorDarkgray): ?>
:root {
\t--bgColorDarkGray: <?= \$this->bgColorDarkgray; ?>;
}
<?php endif; ?>

<?php if(\$this->txtColorGray): ?>
:root {
\t--txtColorGray: <?= \$this->txtColorGray; ?>;
}
<?php endif; ?>

<?php if(\$this->activeColor): ?>
.header.original .mainmenu ul li a.trail,
.header.original .mainmenu ul li a.active,
.header.cloned .mainmenu ul li a.trail,
.header.cloned .mainmenu ul li a.active,
.mod_pct_megamenu .mod_navigation a.active {
\tcolor: <?= \$this->activeColor; ?>;
}
<?php endif; ?>

<?php if(\$this->hoverColor): ?>
.header .mainmenu ul li a:hover  {
\tcolor: <?= \$this->hoverColor; ?>;
}
<?php endif; ?>


<?php if(\$this->topbarElementsTopbar): ?>
#top {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsEmail): ?>
body.viewport_desktop #top .mod_top_mail,
body.viewport_desktop #top .topbar_mail {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsTeaser): ?>
body.viewport_desktop #top .topbar_teaser,
body.viewport_desktop #top .mod_top_phone {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsMetanav): ?>
body.viewport_desktop #top .top_metanavi,
body.viewport_desktop #top .topbar_metanavi {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsLogin): ?>
body.viewport_desktop #top .mod_login_top {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsSearch): ?>
body.viewport_desktop #top .mod_search {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsSocials): ?>
body.viewport_desktop #top .mod_socials {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsLangswitch): ?>
body.viewport_desktop #top .mod_langswitcher {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsEmailTablet): ?>
body.viewport_tablet #top .mod_top_mail,
body.viewport_tablet #top .topbar_mail {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsTeaserTablet): ?>
body.viewport_tablet #top .topbar_teaser,
body.viewport_tablet #top .mod_top_phone {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsMetanavTablet): ?>
body.viewport_tablet #top .top_metanavi,
body.viewport_tablet #top .topbar_metanavi {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsLoginTablet): ?>
body.viewport_tablet #top .mod_login_top {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsSearchTablet): ?>
body.viewport_tablet #top .mod_search {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsSocialsTablet): ?>
body.viewport_tablet #top .mod_socials {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsLangswitchTablet): ?>
body.viewport_tablet #top .mod_langswitcher {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsEmailMobile): ?>
body.viewport_mobile #top .mod_top_mail,
body.viewport_mobile #top .topbar_mail {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsTeaserMobile): ?>
body.viewport_mobile #top .topbar_teaser,
body.viewport_mobile #top .mod_top_phone {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsMetanavMobile): ?>
body.viewport_mobile #top .top_metanavi,
body.viewport_mobile #top .topbar_metanavi {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsLoginMobile): ?>
body.viewport_mobile #top .mod_login_top {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsSearchMobile): ?>
body.viewport_mobile #top .mod_search {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsSocialsMobile): ?>
body.viewport_mobile #top .mod_socials {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarElementsLangswitchMobile): ?>
body.viewport_mobile #top .mod_langswitcher {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->topbarFontSize): ?>
#top,
#top .mod_socials a i {
\tfont-size: <?= \$this->topbarFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->topbarFontSizeMob): ?>
@media only screen and (max-width: 767px) {
\t#top,
\t#top .mod_socials a i {
\t\tfont-size: <?= \$this->topbarFontSizeMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->topbarFontColor): ?>
#top,
#top a,
#top .mod_socials a i {
\tcolor: <?= \$this->topbarFontColor; ?>;
}
<?php endif; ?>

<?php if(\$this->topbarBackgroundColor): ?>
#top,
#top .inside {
\tbackground-color: <?= \$this->topbarBackgroundColor; ?>;
}
<?php endif; ?>

<?php if(\$this->topbarLayoutHeight): ?>
#top-wrapper #top .inside {
\tpadding-top: <?= \$this->topbarLayoutHeight; ?>px;
\tpadding-bottom: <?= \$this->topbarLayoutHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->topbarLayoutMarginTop): ?>
#top-wrapper #top {
\tmargin-top: <?= \$this->topbarLayoutMarginTop; ?>px;
}
<?php endif; ?>

<?php if(\$this->topbarLayoutMarginBottom): ?>
#top-wrapper #top {
\tmargin-bottom: <?= \$this->topbarLayoutMarginBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->topbarLayoutMarginLeftRight): ?>
#top-wrapper #top {
\tmargin-left: <?= \$this->topbarLayoutMarginLeftRight; ?>px;
\tmargin-right: <?= \$this->topbarLayoutMarginLeftRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->topbarLayoutShadow): ?>
#top {
\tbox-shadow: 0 0 8px 6px rgba(0,0,0,<?= \$this->topbarLayoutShadow; ?>);
}
<?php endif; ?>

<?php if(\$this->topbarLayoutSocialV2): ?>
#top .mod_socials i {
\tmargin: 0 2px;
}

#top .mod_socials i.fa-facebook {
\tbackground: rgb(67,96,152)!important;
\tcolor: rgb(255,2552,255)!important;
}

#top .mod_socials i.fa-twitter {
\tbackground: #111418!important;
\tcolor: rgb(255,2552,255)!important;
}

#top .mod_socials i.fa-xing {
 \tbackground: rgb(0,93,94)!important;
 \tcolor: rgb(255,2552,255)!important;
}

#top .mod_socials i.fa-tumblr {
 \tbackground: rgb(45,73,102)!important;
 \tcolor: rgb(255,2552,255)!important;
}

#top .mod_socials i.fa-google-plus {
 \tbackground: rgb(217,82,50)!important;
 \tcolor: rgb(255,2552,255)!important;
}

#top .mod_socials i.fa-flickr {
 \tbackground: rgb(250,29,132)!important;
 \tcolor: rgb(255,2552,255)!important;
}

#top .mod_socials i.fa-linkedin {
 \tbackground: rgb(2,116,179)!important;
 \tcolor: rgb(255,2552,255)!important;
}

#top .mod_socials i.fa-instagram {
 \tbackground: rgb(167,124,98)!important;
 \tcolor: rgb(255,2552,255)!important;
}

#top .mod_socials i.fa-pinterest {
 \tbackground: rgb(205,33,40)!important;
 \tcolor: rgb(255,2552,255)!important;
}

#top .mod_socials i.fa-vimeo-square {
 \tbackground: rgb(52,192,238)!important;
 \tcolor: rgb(255,2552,255)!important;
}

#top .mod_socials i.fa-youtube {
 \tbackground: rgb(220,33,48)!important;
 \tcolor: rgb(255,2552,255)!important;
}

#top .mod_socials i:hover, {
\topacity: 0.7!important;
}
<?php endif; ?>

<?php if(\$this->topbarLayoutBorderRadius): ?>
#top-wrapper #top,
#top-wrapper #top .inside  {
\tborder-radius: <?= \$this->topbarLayoutBorderRadius; ?>px;
}
<?php endif; ?>

<?php if(\$this->topbarLayoutBorder): ?>
#top-wrapper #top  {
\tborder-bottom: 1px solid <?= \$this->topbarLayoutBorder; ?>;
}
<?php endif; ?>

<?php if(\$this->bodyFontFamily): ?>
html, body  {
\tfont-family: <?= \$this->bodyFontFamily; ?>;
\tfont-weight: <?= \$this->bodyFontFamily_weight; ?>;
}
<?php endif; ?>

<?php if(\$this->bodyFontColor): ?>
:root {
\t--body-color: <?= \$this->bodyFontColor; ?>;
}
<?php endif; ?>

<?php if(\$this->bodyFontHyphensOff): ?>
* {
\thyphens: none;
\t-webkit-hyphens: none;
\t-ms-hyphens: none;
}
<?php endif; ?>

<?php if(\$this->bodyBackgroundColor): ?>
:root {
\t--bodyBackgroundColor: <?= \$this->bodyBackgroundColor; ?>;
}
<?php endif; ?>

<?php if(\$this->bodyFontSize): ?>
:root {
\t--body-fontSize: <?= \$this->bodyFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->bodyFontLineHeight): ?>
p  {
\tline-height: <?= \$this->bodyFontLineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->bodyFontSizeMobile): ?>
@media only screen and (max-width: 767px) {

html, body  {
\tfont-size: <?= \$this->bodyFontSizeMobile; ?>px;
}

}
<?php endif; ?>

<?php if(\$this->bodyFontLineHeightMobile): ?>
@media only screen and (max-width: 767px) {

p  {
\tline-height: <?= \$this->bodyFontLineHeightMobile; ?>px;
}

}
<?php endif; ?>

<?php if(\$this->headlineFontFamily): ?>
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6,
.ce_revolutionslider_text.bold, .font_headline {
\tfont-family: <?= \$this->headlineFontFamily; ?>;
\tfont-weight: <?= \$this->headlineFontFamily_weight; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineHyphensOff): ?>
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .font_headline {
\thyphens: none;
\t-webkit-hyphens: none;
\t-ms-hyphens: none;
}
<?php endif; ?>

<?php if(\$this->headlineFontFamilyH1): ?>
h1, .h1 {
\tfont-family: <?= \$this->headlineFontFamilyH1; ?>;
\tfont-weight: <?= \$this->headlineFontFamilyH1_weight; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontSizeH1): ?>
:root {
\t--h1-fontSize: <?= \$this->headlineFontSizeH1; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineLineHeightH1): ?>
h1, .h1, .h1 p {
\tline-height: <?= \$this->headlineLineHeightH1; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineLetterspacingH1): ?>
h1, .h1, .h1 p {
\tletter-spacing: <?= \$this->headlineLetterspacingH1; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineFontWeightH1): ?>
h1, .h1, .h1 p {
\tfont-weight: <?= \$this->headlineFontWeightH1; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontColorH1): ?>
h1, h1 a, .h1, .h1 a, .h1 p {
\tcolor: <?= \$this->headlineFontColorH1; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontFamilyH2): ?>
h2, .h2 {
\tfont-family: <?= \$this->headlineFontFamilyH2; ?>;
\tfont-weight: <?= \$this->headlineFontFamilyH2_weight; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontSizeH2): ?>
:root {
\t--h2-fontSize: <?= \$this->headlineFontSizeH2; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineLineHeightH2): ?>
h2, .h2, .h2 p {
\tline-height: <?= \$this->headlineLineHeightH2; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineLetterspacingH2): ?>
h2, .h2, .h2 p {
\tletter-spacing: <?= \$this->headlineLetterspacingH2; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineFontWeightH2): ?>
h2, .h2, .h2 p {
\tfont-weight: <?= \$this->headlineFontWeightH2; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontColorH2): ?>
h2, h2 a, .h2, .h2 a, .h2 p {
\tcolor: <?= \$this->headlineFontColorH2; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontFamilyH3): ?>
h3, .h3 {
\tfont-family: <?= \$this->headlineFontFamilyH3; ?>;
\tfont-weight: <?= \$this->headlineFontFamilyH3_weight; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontSizeH3): ?>
:root {
\t--h3-fontSize: <?= \$this->headlineFontSizeH3; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineLineHeightH3): ?>
h3, .h3, .h3 p {
\tline-height: <?= \$this->headlineLineHeightH3; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineLetterspacingH3): ?>
h3, .h3, .h3 p {
\tletter-spacing: <?= \$this->headlineLetterspacingH3; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineFontWeightH3): ?>
h3, .h3, .h3 p {
\tfont-weight: <?= \$this->headlineFontWeightH3; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontColorH3): ?>
h3, h3 a, .h3, .h3 a, .h3 p {
\tcolor: <?= \$this->headlineFontColorH3; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontFamilyH4): ?>
h4, .h4 {
\tfont-family: <?= \$this->headlineFontFamilyH4; ?>;
\tfont-weight: <?= \$this->headlineFontFamilyH4_weight; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontSizeH4): ?>
:root {
\t--h4-fontSize: <?= \$this->headlineFontSizeH4; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineLineHeightH4): ?>
h4, .h4, .h4 p {
\tline-height: <?= \$this->headlineLineHeightH4; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineLetterspacingH4): ?>
h4, .h4, .h4 p {
\tletter-spacing: <?= \$this->headlineLetterspacingH4; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineFontWeightH4): ?>
h4, .h4, .h4 p {
\tfont-weight: <?= \$this->headlineFontWeightH4; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontColorH4): ?>
h4, h4 a, .h4, .h4 a, .h4 p {
\tcolor: <?= \$this->headlineFontColorH4; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontFamilyH5): ?>
h5, .h5 {
\tfont-family: <?= \$this->headlineFontFamilyH5; ?>;
\tfont-weight: <?= \$this->headlineFontFamilyH5_weight; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontSizeH5): ?>
:root {
\t--h5-fontSize: <?= \$this->headlineFontSizeH5; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineLineHeightH5): ?>
h5, .h5, .h5 p {
\tline-height: <?= \$this->headlineLineHeightH5; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineLetterspacingH5): ?>
h5, .h5, .h5 p {
\tletter-spacing: <?= \$this->headlineLetterspacingH5; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineFontWeightH5): ?>
h5, .h5, .h5 p {
\tfont-weight: <?= \$this->headlineFontWeightH5; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontColorH5): ?>
h5, h5 a, .h5, .h5 a, .h5 p {
\tcolor: <?= \$this->headlineFontColorH5; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontFamilyH6): ?>
h6, .h6 {
\tfont-family: <?= \$this->headlineFontFamilyH6; ?>;
\tfont-weight: <?= \$this->headlineFontFamilyH6_weight; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontSizeH6): ?>
:root {
\t--h6-fontSize: <?= \$this->headlineFontSizeH6; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineLineHeightH6): ?>
h6, .h6, .h6 p {
\tline-height: <?= \$this->headlineLineHeightH6; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineLetterspacingH6): ?>
h6, .h6, .h6 p {
\tletter-spacing: <?= \$this->headlineLetterspacingH6; ?>px;
}
<?php endif; ?>

<?php if(\$this->headlineFontWeightH6): ?>
h6, .h6, .h6 p {
\tfont-weight: <?= \$this->headlineFontWeightH6; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontColorH6): ?>
h6, h6 a, .h6, .h6 a, .h6 p {
\tcolor: <?= \$this->headlineFontColorH6; ?>;
}
<?php endif; ?>

<?php if(\$this->headlineFontSizeH1Mob): ?>
@media only screen and (max-width: 767px) {
\th1, .h1, .h1 p {
\t\tfont-size: <?= \$this->headlineFontSizeH1Mob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->headlineLineHeightH1Mob): ?>
@media only screen and (max-width: 767px) {
\th1, .h1, .h1 p {
\t\tline-height: <?= \$this->headlineLineHeightH1Mob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->headlineFontSizeH2Mob): ?>
@media only screen and (max-width: 767px) {
\th2, .h2, .h2 p {
\t\tfont-size: <?= \$this->headlineFontSizeH2Mob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->headlineLineHeightH2Mob): ?>
@media only screen and (max-width: 767px) {
\th2, .h2, .h2 p {
\t\tline-height: <?= \$this->headlineLineHeightH2Mob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->headlineFontSizeH3Mob): ?>
@media only screen and (max-width: 767px) {
\th3, .h3, .h3 p {
\t\tfont-size: <?= \$this->headlineFontSizeH3Mob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->headlineLineHeightH3Mob): ?>
@media only screen and (max-width: 767px) {
\th3, .h3, .h3 p {
\t\tline-height: <?= \$this->headlineLineHeightH3Mob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->headlineFontSizeH4Mob): ?>
@media only screen and (max-width: 767px) {
\th4, .h4, .h4 p {
\t\tfont-size: <?= \$this->headlineFontSizeH4Mob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->headlineLineHeightH4Mob): ?>
@media only screen and (max-width: 767px) {
\th4, .h4, .h4 p {
\t\tline-height: <?= \$this->headlineLineHeightH4Mob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->headlineFontSizeH5Mob): ?>
@media only screen and (max-width: 767px) {
\th5, .h5, .h5 p {
\t\tfont-size: <?= \$this->headlineFontSizeH5Mob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->headlineLineHeightH5Mob): ?>
@media only screen and (max-width: 767px) {
\th5, .h5, .h5 p {
\t\tline-height: <?= \$this->headlineLineHeightH5Mob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->headlineFontSizeH6Mob): ?>
@media only screen and (max-width: 767px) {
\th6, .h6, .h6 p {
\t\tfont-size: <?= \$this->headlineFontSizeH6Mob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->headlineLineHeightH6Mob): ?>
@media only screen and (max-width: 767px) {
\th6, .h6, .h6 p {
\t\tline-height: <?= \$this->headlineLineHeightH6Mob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->layoutFullwidthContentWidth): ?>
:root {
\t--contentBoxedWidth: calc(100% - <?= \$this->layoutFullwidthContentWidth; ?>%);
\t--articlePaddingLeftRight: <?= \$this->layoutFullwidthContentWidth / 2; ?>%;
}
<?php endif; ?>

<?php if(\$this->layoutBoxedStyle1): ?>
#offcanvas-top,
#contentwrapper,
#top-wrapper,
#footer,
#bottom,
.header {
\tmax-width: 1210px;
\tmargin-left: auto;
\tmargin-right: auto;
}

body {
\tbackground-color: rgba(0,0,0,0.05);
}

@media only screen and (max-width: 1280px) {

\t#contentwrapper,
\t#top-wrapper {
\t\tmax-width: 1100px;
\t}

}
<?php endif; ?>

<?php if(\$this->layoutBoxedStyle1Shadow): ?>
#contentwrapper {
\tbox-shadow: 0 0 2px 2px rgba(0,0,0,0.1);
}
<?php endif; ?>

<?php if(\$this->layoutBoxedStyle1ContentWidth): ?>
#offcanvas-top,
#contentwrapper,
#top-wrapper,
#footer,
#bottom,
.header,
.mod_customcataloglist.cc_immorealty_slider .content-outside,
.mod_customcataloglist.cc_cardealer_slider .content-outside {
\tmax-width: <?= \$this->layoutBoxedStyle1ContentWidth; ?>px;
\tmargin-left: auto;
\tmargin-right: auto;
}

body {
\tbackground-color: rgba(0,0,0,0.05);
}
<?php endif; ?>

<?php if(\$this->layoutBoxedStyle1MarginTop): ?>
@media only screen and (min-width: 768px) {

#contentwrapper {
\tmargin-top: <?= \$this->layoutBoxedStyle1MarginTop; ?>px;
}

}
<?php endif; ?>

<?php if(\$this->layoutBoxedStyle2): ?>
#wrapper,
#footer,
#bottom {
\tmax-width: var(--contentBoxedWidth);
\tmargin-left: auto;
\tmargin-right: auto;
}

body {
\tbackground-color: rgba(0,0,0,0.05);
}

#contentwrapper {
\tbackground: none;
}

#wrapper {
\tmargin-top: -50px;
\tz-index: 1000;
}

#slider {
\tmin-height: 120px;
}

#titlebar {
\tmin-height: 120px;
}

.mod_breadcrumb {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->layoutBoxedStyle1BackgroundColor): ?>
body {
\tbackground-color: <?= \$this->layoutBoxedStyle1BackgroundColor; ?>!important;
}
<?php endif; ?>

<?php if(\$this->layoutBoxedStyle2ContentWidth): ?>
#wrapper,
#footer,
#bottom {
\tmax-width: <?= \$this->layoutBoxedStyle2ContentWidth; ?>px;
\tmargin-left: auto;
\tmargin-right: auto;
}
<?php endif; ?>

<?php if(\$this->layoutBoxedStyle2NegativeMargin): ?>
#wrapper {
\tmargin-top: -<?=\$this->layoutBoxedStyle2NegativeMargin; ?>px;
}
<?php endif; ?>

<?php if(\$this->layoutBoxedStyle2BackgroundColor): ?>
body {
\tbackground-color: <?= \$this->layoutBoxedStyle2BackgroundColor; ?>!important;
}
<?php endif; ?>

<?php if(\$this->layoutBoxedStyle3): ?>
@media only screen and (min-width: 768px) {

body {
\tbackground: #393939;
\tmargin: <?= \$this->layoutBoxedStyle3; ?>px;
}

.stickyheader {
   width: calc(100% - <?= \$this->layoutBoxedStyle3; ?>px  - <?= \$this->layoutBoxedStyle3; ?>px);
   left: <?= \$this->layoutBoxedStyle3; ?>px;
}

}
<?php endif; ?>

<?php if(\$this->layoutBoxedStyle3BackgroundColor): ?>
body {
\tbackground-color: <?= \$this->layoutBoxedStyle3BackgroundColor; ?>!important;
}
<?php endif; ?>

<?php if(\$this->backgroundUpload): ?>
body {
\tbackground-image: url(<?= \$this->backgroundUpload->file; ?>)!important;
}
<?php endif; ?>

<?php if(\$this->backgroundRepeatNone): ?>
body {
\tbackground-repeat: no-repeat;
}
<?php endif; ?>

<?php if(\$this->backgroundRepeatBoth): ?>
body {
\tbackground-repeat: repeat;
}
<?php endif; ?>

<?php if(\$this->backgroundRepeatX): ?>
body {
\tbackground-repeat: repeat-x;
}
<?php endif; ?>

<?php if(\$this->backgroundRepeatY): ?>
body {
\tbackground-repeat: repeat-y;
}
<?php endif; ?>

<?php if(\$this->backgroundPosition): ?>
body {
\tbackground-position: center top;
}
<?php endif; ?>

<?php if(\$this->backgroundFullsize): ?>
body {
\t-webkit-background-size: cover;
\tbackground-size: cover;
\tbackground-attachment: fixed;
\tbackground-position: center top;
}
<?php endif; ?>

<?php if(\$this->backgroundAttachment): ?>
body {
\tbackground-attachment: fixed;
}
<?php endif; ?>

<?php if(\$this->backgroundColor): ?>
body {
\tbackground-color: <?= \$this->backgroundColor; ?> !important;
}
<?php endif; ?>

<?php if(\$this->layoutMiscGrid): ?>
.autogrid_wrapper {
\tmargin-left: -2%;
\tmargin-right: -2%;
}

.autogrid {
\tpadding-left: 2%;
\tpadding-right: 2%;
}

.autogrid_wrapper.article .inner {
\tmargin-left: -2%;
\tmargin-right: -2%;
}
<?php endif; ?>

<?php if(\$this->layoutMiscGridPixel): ?>
.autogrid_wrapper {
\tmargin-left: -15px;
\tmargin-right: -15px;
}

.autogrid {
\tpadding-left: 15px;
\tpadding-right: 15px;
}

.autogrid_wrapper.article .inner {
\tmargin-left: -15px;
\tmargin-right: -15px;
}
<?php endif; ?>

<?php if(\$this->layoutMiscWhiteSpace): ?>
\t@media only screen and (min-width: 768px) {
\t\t.mod_article:not(.fullwidth).article-pt > .container {
\t\t\tpadding-top: <?= \$this->layoutMiscWhiteSpace; ?>px;
\t\t}
\t\t.mod_article:not(.fullwidth).article-pb > .container {
\t\t\tpadding-bottom: <?= \$this->layoutMiscWhiteSpace; ?>px;
\t\t}

\t}
<?php endif; ?>

<?php if(\$this->layoutMiscBreadcrumb): ?>
#breadcrumb,
.mod_breadcrumb {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->layoutHideToTopLink): ?>
#top_link {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->layoutHideOptOutLink): ?>
#privacy_optout_link {
\tdisplay: none;
}
<?php endif; ?>


<?php if(\$this->footerElementsHide): ?>
#footer  {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->footerElementsCol3): ?>
#footer div.autogrid {
\tflex: 0 0 33.33%;
}

.footer-col4 {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->footerElementsCol2): ?>
#footer div.autogrid {
\tflex: 0 0 50%;
}

.footer-col3,
.footer-col4 {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->footerElementsCol1): ?>
#footer div.autogrid {
\tflex: 0 0 100%;
}

.footer-col2,
.footer-col3,
.footer-col4 {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->footerElementsHeight): ?>
#footer .inside {
\tpadding-top: <?= \$this->footerElementsHeight; ?>%;
\tpadding-bottom: <?= \$this->footerElementsHeight; ?>%;
}
<?php endif; ?>

<?php if(\$this->footerElementsMarginLeftRight): ?>
#footer {
\tmargin-left: <?= \$this->footerElementsMarginLeftRight; ?>px;
\tmargin-right: <?= \$this->footerElementsMarginLeftRight; ?>px;
}
<?php endif; ?>


<?php if(\$this->footerElementsMarginTopBottom): ?>
#footer {
\tmargin-top: <?= \$this->footerElementsMarginTopBottom; ?>px;
\tmargin-bottom: <?= \$this->footerElementsMarginTopBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->footerBorderRadius): ?>
#footer {
\tborder-radius: <?= \$this->footerBorderRadius; ?>px;
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineSize1): ?>
:root {
\t--footer-h1-fontSize: <?= \$this->footerFontHeadlineSize1; ?>px;
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineSize2): ?>
:root {
\t--footer-h2-fontSize: <?= \$this->footerFontHeadlineSize2; ?>px;
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineSize3): ?>
:root {
\t--footer-h3-fontSize: <?= \$this->footerFontHeadlineSize3; ?>px;
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineSize4): ?>
:root {
\t--footer-h4-fontSize: <?= \$this->footerFontHeadlineSize4; ?>px;
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineSize5): ?>
:root {
\t--footer-h5-fontSize: <?= \$this->footerFontHeadlineSize5; ?>px;
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineSize6): ?>
:root {
\t--footer-h6-fontSize: <?= \$this->footerFontHeadlineSize6; ?>px;
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineSizeMob1): ?>
@media only screen and (max-width: 767px) {
\t#footer h1,
\t#footer .h1 {
\t\tfont-size: <?= \$this->footerFontHeadlineSizeMob1; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineSizeMob2): ?>
@media only screen and (max-width: 767px) {
\t#footer h2,
\t#footer .h2 {
\t\tfont-size: <?= \$this->footerFontHeadlineSizeMob2; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineSizeMob3): ?>
@media only screen and (max-width: 767px) {
\t#footer h3,
\t#footer .h3 {
\t\tfont-size: <?= \$this->footerFontHeadlineSizeMob3; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineSizeMob4): ?>
@media only screen and (max-width: 767px) {
\t#footer h4,
\t#footer .h4 {
\t\tfont-size: <?= \$this->footerFontHeadlineSizeMob4; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineSizeMob5): ?>
@media only screen and (max-width: 767px) {
\t#footer h5,
\t#footer .h5 {
\t\tfont-size: <?= \$this->footerFontHeadlineSizeMob5; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineSizeMob6): ?>
@media only screen and (max-width: 767px) {
\t#footer h6,
\t#footer .h6 {
\t\tfont-size: <?= \$this->footerFontHeadlineSizeMob6; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->footerFontHeadlineColor): ?>
:root {
\t--footer-headline-color: <?= \$this->footerFontHeadlineColor; ?>;
}
<?php endif; ?>

<?php if(\$this->footerFontSize): ?>
#footer {
\tfont-size: <?= \$this->footerFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->footerFontSizeMob): ?>
@media only screen and (max-width: 767px) {
\t#footer {
\t\tfont-size: <?= \$this->footerFontSizeMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->footerFontColor): ?>
#footer,
#footer a {
\tcolor: <?= \$this->footerFontColor; ?>;
}

#footer li:after {
\tborder-color: <?= \$this->footerFontColor; ?>;
}
<?php endif; ?>

<?php if(\$this->footerFontHoverColor): ?>
#footer a:hover:not(.ce_hyperlink a) {
\tcolor: <?= \$this->footerFontHoverColor; ?>;
}
<?php endif; ?>

<?php if(\$this->footerBackground): ?>
#footer {
\tbackground-color: <?= \$this->footerBackground; ?>;
}
<?php endif; ?>

<?php if(\$this->footerBackgroundImage): ?>
#footer {
\tbackground-image: url(<?= \$this->footerBackgroundImage->file; ?>);
\tbackground-position: center top;
\tbackground-repeat: no-repeat;
}
<?php endif; ?>

<?php if(\$this->footerBackgroundFullsize): ?>
#footer {
\t-webkit-background-size: cover;
\tbackground-size: cover;
\tbackground-attachment: fixed;
}
<?php endif; ?>

<?php if(\$this->footerBackgroundRepeat): ?>
#footer {
\tbackground-repeat: repeat!important;
}
<?php endif; ?>

<?php if(\$this->footerBorder): ?>
#footer {
\tborder-top: 1px solid <?= \$this->footerBorder; ?>;
}
<?php endif; ?>

<?php if(\$this->bottomElementsHide): ?>
#bottom {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->bottomElementsHeight): ?>
#bottom .inside {
\tpadding-top: <?= \$this->bottomElementsHeight; ?>%;
\tpadding-bottom: <?= \$this->bottomElementsHeight; ?>%;
}
<?php endif; ?>

<?php if(\$this->bottomElementsMarginLeftRight): ?>
#bottom {
\tmargin-left: <?= \$this->bottomElementsMarginLeftRight; ?>px;
\tmargin-right: <?= \$this->bottomElementsMarginLeftRight; ?>px;
}
<?php endif; ?>


<?php if(\$this->bottomElementsMarginTopBottom): ?>
#bottom {
\tmargin-top: <?= \$this->bottomElementsMarginTopBottom; ?>px;
\tmargin-bottom: <?= \$this->bottomElementsMarginTopBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->bottomElementsAlign): ?>
#bottom .inside .left,
#bottom .inside .right {
\tfloat: none;
\ttext-align: center;
}

#bottom .inside .left {
\tmargin-bottom: 1rem;
}

#bottom .inside .right a:first-child {
\tmargin-left: 0;
}
<?php endif; ?>


<?php if(\$this->bottomFontSize): ?>
#bottom {
\tfont-size: <?= \$this->bottomFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->bottomFontSizeMob): ?>
@media only screen and (max-width: 767px) {
\t#bottom {
\t\tfont-size: <?= \$this->bottomFontSizeMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->bottomFontColor): ?>
#bottom .inside,
#bottom .inside a {
\tcolor: <?= \$this->bottomFontColor; ?>;
}
<?php endif; ?>

<?php if(\$this->bottomFontHoverColor): ?>
#bottom .inside a:hover {
\tcolor: <?= \$this->bottomFontHoverColor; ?>;
}
<?php endif; ?>

<?php if(\$this->bottomBackground): ?>
#bottom {
\t background-color: <?= \$this->bottomBackground; ?>;
}
<?php endif; ?>

<?php if(\$this->bottomBackgroundImage): ?>
#bottom {
\tbackground-image: url(<?= \$this->bottomBackgroundImage->file; ?>);
\tbackground-position: center top;
\tbackground-repeat: no-repeat;
}
<?php endif; ?>

<?php if(\$this->bottomBackgroundFullsize): ?>
#bottom {
\tbackground-size: cover;
}
<?php endif; ?>

<?php if(\$this->bottomBackgroundRepeat): ?>
#bottom {
\tbackground-repeat: repeat!important;
}
<?php endif; ?>

<?php if(\$this->bottomBorder): ?>
#bottom {
\tborder-top: 1px solid <?= \$this->bottomBorder; ?>;
}
<?php endif; ?>

<?php if(\$this->bottomBorderRadius): ?>
#bottom {
\tborder-radius: <?= \$this->bottomBorderRadius; ?>px;
}
<?php endif; ?>

<?php if(\$this->headerElementsSearch): ?>
.header .mod_search {
\tdisplay: none!important;
}

.header .mod_langswitcher {
\tmargin-left: 40px;
}

.header .mod_socials {
\tmargin-left: 40px;
}
<?php endif; ?>

<?php if(\$this->headerElementsLangswitch): ?>
.header .mod_langswitcher {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->headerElementsSocials): ?>
@media only screen and (min-width: 768px) {
.header .mod_socials {
\tdisplay: block;
}

.header .mod_langswitcher {
\tmargin-left: 20px;
}

}
<?php endif; ?>

<?php if(\$this->headerElementsSticky): ?>
@media only screen and (min-width: 768px) {

.stickyheader {
\tdisplay: none!important;
}

html {
\tscroll-padding: 0;
}

}
<?php endif; ?>

<?php if(\$this->header1): ?>
#top .inside {
\tbackground: none!important;
}
<?php endif; ?>

<?php if(\$this->header1PositionAbsolute): ?>
@media only screen and (min-width: 768px) {

#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

}
<?php endif; ?>

<?php if(\$this->header1Background): ?>
.header {
\tbackground-color: <?= \$this->header1Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header1Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header1Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header1Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header1Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header1Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header1Border): ?>
.header.original {
\tborder-bottom: 1px solid <?= \$this->header1Border; ?>;
}
<?php endif; ?>

\t<?php if(\$this->header2): ?>
@media only screen and (min-width: 768px) {

.header.original {
\tline-height: 60px!important;
}

.header.original .mainmenu {
\tfloat: left;
}

.header.original .logo {
\tfloat: none;
}

.header.original .mainmenu ul {
\ttext-align: left;
}

.header.original .header_metanavi {
\tposition: absolute;
\tright: var(--headerPaddings);
\ttop: 20px;
\tdisplay: block;
}

.header.original .header_metanavi a {
\tmargin-left: 20px;
}

.header.original .header_metanavi a.last {
\tmargin-right: 0;
}

.header.original .mainmenu:before {
\tcontent: '';
\theight: 1px;
\tposition: absolute;
\tleft: var(--headerPaddings);
\tbottom: 60px;
\tright: var(--headerPaddings);
\tbackground: rgb(0,0,0);
\topacity: 0.15;
}

.header.original .smartmenu {
\tfloat: left;
\tmargin-left: 0;
}

.header.original .smartmenu .smartmenu-trigger {
\theight: 60px;
}

.mod_breadcrumb .mod_breadcrumb_inside:before,
.mod_breadcrumb .mod_breadcrumb_inside:after {
\tdisplay: block;
}

.mod_breadcrumb {
\tborder: 0;
}

#top .inside {
\tbackground: none!important;
}

}

.header {
\tbackground-color: #ffffff;
}
<?php endif; ?>

<?php if(\$this->header2PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

.header.original .mainmenu:after {
\tcontent: '';
\theight: 1px;
\tposition: absolute;
\tleft: 40px;
\tbottom: 0;
\tright: 40px;
\tbackground: rgba(0,0,0,0.1);
\topacity: 0.15;
}

}
<?php endif; ?>

<?php if(\$this->header2Background): ?>
.header {
\tbackground-color: <?= \$this->header2Background; ?>;
}
<?php endif; ?>


<?php if(\$this->header2Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header2Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header2Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header2Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header2Color; ?>;
}

.header.original .mainmenu:before,
.header.original .mainmenu:after {
\tbackground: <?= \$this->header2Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header3): ?>
@media only screen and (min-width: 768px) {

.header.original {
\tline-height: 60px!important;
}

.header.original .logo {
\tfloat: none;
\tmargin-left: auto;
\tmargin-right: 0;
}

.header.original .mainmenu ul {
\ttext-align: left;
}

.header.original .header_metanavi {
\tposition: absolute;
\tleft: var(--headerPaddings);
\ttop: 20px;
\tdisplay: block;
}

.header.original .header_metanavi a {
\tmargin-left: 0;
\tmargin-right: 20px;
}

.header.original .mainmenu:before {
\tcontent: '';
\theight: 1px;
\tposition: absolute;
\tleft: var(--headerPaddings);
\tbottom: 65px;
\tright: var(--headerPaddings);
\tbackground: rgb(0,0,0);
\topacity: 0.15;
}

.header.original .smartmenu {
\tfloat: left;
\tmargin-left: 0;
}

.header.original .smartmenu .smartmenu-trigger {
\theight: 60px;
}

.header.original .mainmenu {
\tfloat: left;
}

.mod_breadcrumb .mod_breadcrumb_inside:before,
.mod_breadcrumb .mod_breadcrumb_inside:after {
\tdisplay: block;
}

.mod_breadcrumb {
\tborder: 0;
}

#top .inside {
\tbackground: none!important;
}

}
<?php endif; ?>

<?php if(\$this->header3PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

.header.original .mainmenu:after {
\tcontent: '';
\theight: 1px;
\tposition: absolute;
\tleft: 40px;
\tbottom: 0;
\tright: 40px;
\tbackground: rgba(0,0,0,0.1);
\topacity: 0.15;
}

}
<?php endif; ?>

<?php if(\$this->header3Background): ?>
.header {
\tbackground-color: <?= \$this->header3Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header3Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header3Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header3Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header3Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header3Color; ?>;
}

.header.original .mainmenu:before,
.header.original .mainmenu:after {
\tbackground: <?= \$this->header3Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header4): ?>
@media only screen and (min-width: 768px) {

.header.original .logo {
\tfloat: none;
\tdisplay: block;
\tmargin-left: auto;
\tmargin-right: auto;
}

.header.original {
\tline-height: 65px!important;
}

.header.original .mainmenu:before {
\tcontent: '';
\theight: 1px;
\tposition: absolute;
\tleft: var(--headerPaddings);
\tbottom: 65px;
\tright: var(--headerPaddings);
\tbackground: rgb(0,0,0);
\topacity: 0.15;
}

.header.original .smartmenu {
\tfloat: left;
\tmargin-left: 0;
}

.header.original .smartmenu .smartmenu-trigger {
\theight: 60px;
}

.header.original .mainmenu {
\tfloat: left;
}

.mod_breadcrumb .mod_breadcrumb_inside:before,
.mod_breadcrumb .mod_breadcrumb_inside:after {
\tdisplay: block;
}

.mod_breadcrumb {
\tborder: 0;
}

#top .inside {
\tbackground: none!important;
}

}
<?php endif; ?>

<?php if(\$this->header4PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

.header.original .mainmenu:after {
\tcontent: '';
\theight: 1px;
\tposition: absolute;
\tleft: 40px;
\tbottom: 0;
\tright: 40px;
\tbackground: rgba(0,0,0,0.1);
\topacity: 0.15;
}

}
<?php endif; ?>

<?php if(\$this->header4Background): ?>
.header {
\tbackground-color: <?= \$this->header4Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header4Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header4Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header4Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header4Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header4Color; ?>;
}

.header.original .mainmenu:before,
.header.original .mainmenu:after {
\tbackground: <?= \$this->header4Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header5): ?>
@media only screen and (min-width: 768px) {

.header .mainmenu {
\tposition: absolute;
\ttop: 0;
\tleft: 50%;
\ttransform: translateX(-50%);
\t-webkit-transform: translateX(-50%);
\twidth: 100%;
}

.header .mainmenu ul {
\ttext-align: center;
}

.header .logo {
\tposition: relative;
\tz-index: 100;
}

#top .inside {
\tbackground: none!important;
}

}
<?php endif; ?>

<?php if(\$this->header5PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

}
<?php endif; ?>

<?php if(\$this->header5Background): ?>
.header {
\tbackground-color: <?= \$this->header5Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header5Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header5Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header5Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header5Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header5Color; ?>;
}

.header.original .mainmenu:before {
\tbackground: <?= \$this->header5Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header5Border): ?>
.header.original {
\tborder-bottom: 1px solid <?= \$this->header5Border; ?>;
}
<?php endif; ?>

<?php if(\$this->header6): ?>
@media only screen and (min-width: 768px) {

.header .mainmenu {
\tfloat: left;
}

.header .logo {
\tmargin-right: 40px;
}

#top .inside {
\tbackground: none!important;
}

}
<?php endif; ?>

<?php if(\$this->header6PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

}
<?php endif; ?>

<?php if(\$this->header6Background): ?>
.header {
\tbackground-color: <?= \$this->header6Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header6Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header6Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header6Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header6Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header6Color; ?>;
}

.header.original .mainmenu:before {
\tbackground: <?= \$this->header6Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header6Border): ?>
.header.original {
\tborder-bottom: 1px solid <?= \$this->header6Border; ?>;
}
<?php endif; ?>

<?php if(\$this->header7): ?>
@media only screen and (min-width: 768px) {

.header.original .logo {
\tfloat: none;
\tdisplay: block;
\tmargin-left: auto;
\tmargin-right: auto;
}

.header.original .mainmenu {
\tfloat: none;
\tmargin-left: auto;
\tmargin-right: auto;
}

.header.original .meta-nav {
\tdisplay: none;
}

.header.original .mainmenu ul {
\ttext-align: center;
}

.header.original .mainmenu ul,
.header.original .mainmenu ul li a {
\tline-height: 65px;
}

.header.original .mod_search {
\tdisplay: none!important;
}

.header .mod_socials {
\tdisplay: none!important;
}

#top .inside {
\tbackground: none!important;
}

.header.original .smartmenu {
\tposition: absolute;
\ttop: 0;
\tright: 40px;
}

}
<?php endif; ?>

<?php if(\$this->header7PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

}
<?php endif; ?>

<?php if(\$this->header7Background): ?>
.header {
\tbackground-color: <?= \$this->header7Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header7Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header7Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header7Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header7Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header7Color; ?>;
}

.header.original .mainmenu:before {
\tbackground: <?= \$this->header7Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header7Border): ?>
.header.original .mainmenu {
\tborder-top: 1px solid <?= \$this->header7Border; ?>;
\tborder-bottom: 1px solid <?= \$this->header7Border; ?>;
}
<?php endif; ?>

<?php if(\$this->header8): ?>
@media only screen and (min-width: 768px) {

.header .logo {
\tposition: absolute;
\tleft: 50%;
\t-webkit-transform: translateX(-50%);
  \ttransform: translateX(-50%);
}

.header .mainmenu {
\twidth: 100%;
}

.header .mainmenu li.float_left.floatbox {
\tfloat: left;
\tmargin: 0;
}

.header .mainmenu li.float_right.floatbox {
\tfloat: right;
\tmargin: 0;
}

.header .mod_langswitcher {
\tdisplay: none!important;
}

.header .mod_search {
\tdisplay: none!important;
}

body .header .mainmenu ul li.float_right.floatbox ol li:first-child a:before {
\tdisplay: none;
}

.header .mod_socials {
\tdisplay: none!important;
}

#top .inside {
\tbackground: none!important;
}

.header.original .mainmenu ul li.floatbox {
\tline-height:inherit;
}

}
<?php endif; ?>

<?php if(\$this->header8PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

}
<?php endif; ?>

<?php if(\$this->header8Background): ?>
.header {
\tbackground-color: <?= \$this->header8Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header8Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header8Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header8Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header8Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header8Color; ?>;
}

.header.original .mainmenu:before {
\tbackground: <?= \$this->header8Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header8Border): ?>
.header.original {
\tborder-bottom: 1px solid <?= \$this->header8Border; ?>;
}
<?php endif; ?>

<?php if(\$this->header9): ?>
@media only screen and (min-width: 768px) {

.header {
\tbackground: none;
}

.header.cloned {
\tbox-shadow: none;
}

.header.cloned .inside {
\tbox-shadow: 0 0 2px 2px rgba(0,0,0,0.1);
}

#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header .inside {
\tbackground: #ffffff;
}

#top {
\tbackground: none!important;
}

#top .inside {
\tpadding-top: 10px;
\tpadding-bottom: 10px;
}

#slider {
\tmin-height: 156px;
}

}
<?php endif; ?>

<?php if(\$this->header9PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

}
<?php endif; ?>

<?php if(\$this->header9Background): ?>
.header .inside {
\tbackground-color: <?= \$this->header9Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header9Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header9Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header9Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header9Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header9Color; ?>;
}

.header.original .mainmenu:before {
\tbackground: <?= \$this->header9Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header10): ?>
@media only screen and (min-width: 768px) {

.header.original,
.header.original .inside {
\tbackground: none;
}

#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

body .header.original .logo {
\tfloat: none;
\tdisplay: block;
\tmargin-left: auto;
\tmargin-right: auto;
}

body .header.original .inside {
\ttext-align: center;
}

.header.original .mainmenu ul {
\ttext-align: center;
}

.header.original {
\tline-height: 70px!important;
}

.header.original .mainmenu {
\tbackground: #ffffff;
\tfloat: none;
\tpadding-left: 30px;
\tpadding-right: 30px;
\tborder-radius: 100px;
}

.header .mod_socials {
\tmargin-right: 40px;
}

.header .mod_socials:before {
\tdisplay: none;
}

#top .inside {
\tbackground: none!important;
}

.header .smartmenu {
\tdisplay: none!important;
}

.header.original .mod_search {
\tfloat: left;
\tpadding-left: 0;
\tmargin-left: 40px;
}

.header.original .mod_langswitcher {
\tmargin-right: 40px;
\tmargin-left: 0;
}

.stickyheader {
\twidth: calc(100%  - 80px);
\tmargin-top: 20px;
\tleft: 40px;
}

.stickyheader .header {
\tborder-radius: 100px;
}

.header .mainmenu {
\tdisplay: block!important;
\tfloat: none;
}

.stickyheader .header .logo {
\tdisplay: none;
}

.stickyheader {
\ttop: -300px;
}

.stickyheader .mod_search {
\tfloat: left;
\tmargin-right: 40px;
\tmargin-left: 0;
}

.mainmenu ul {
\ttext-align: center;
}

}
<?php endif; ?>

<?php if(\$this->header10PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

}
<?php endif; ?>

<?php if(\$this->header10Background): ?>
.header.original .mainmenu,
.header.cloned {
\tbackground-color: <?= \$this->header10Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header10Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header10Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header10Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header10Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header10Color; ?>;
}

.header.original .mainmenu:before {
\tbackground: <?= \$this->header10Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header11): ?>
@media only screen and (min-width: 768px) {

.header.original .logo {
\tfloat: none;
\tdisplay: block;
\tmargin-left: auto;
\tmargin-right: auto;
}

.header.original .mainmenu {
\tfloat: none;
\tmargin-left: auto;
\tmargin-right: auto;
\tborder-top: 1px solid rgba(0,0,0,0.1);
\tborder-bottom: 1px solid rgba(0,0,0,0.1);
}

.header.original .mainmenu ul {
\ttext-align: center;
}

.header.original .mainmenu {
\tline-height: 65px;
}

.header.original .inside {
\tmax-width: 100%;
\tpadding: 0;
}

.header.original .mod_langswitcher {
\tposition: absolute;
\ttop: 0;
\tleft: 40px;
}

.header.original .mod_search {
\tposition: absolute;
\ttop: 0;
\tright: 40px;
}

.header.original .mainmenu ul li.megamenu .megamenu-wrapper {
\twidth: calc(100% - 80px)!important;
}

.header.original .mainmenu .level_1 {
\tmax-width: 1280px;
\tmargin-left: auto;
\tmargin-right: auto;
\tposition: relative;
}

.mod_breadcrumb {
\tborder-top: 0;
}

.header.original .mainmenu ul li {
\tmargin-left: 0!important;
\tmargin-right: 0!important;
\tletter-spacing: -4px;
}

.header.original .mainmenu ul li.float_right ol {
\tmargin-left: -4px;
}

.header.original .mainmenu ul li a.first {
\tborder-left: 1px solid rgba(0,0,0,0.1);
}

.header.original .mainmenu ul li ul li a.first {
\tborder-left: none;
}

.header.original .mainmenu ul li a {
\tborder-right: 1px solid rgba(0,0,0,0.1);
\tpadding-left: 40px;
\tpadding-right: 40px;
\tletter-spacing: 0;
}

.header.original .mainmenu ul li ul li a {
\tborder: 0;
}

.header.original .mainmenu ul .megamenu-wrapper {
\tz-index: 100;
\tborder-top: 0;
}

.header.original .mainmenu ul .megamenu-wrapper ul {
\tmargin-top: 0;
}

.header.original .mainmenu ul ul {
\tborder-top: 1px solid rgb(229,229,229);
\tmargin-top: 0;
}

.header.original .mainmenu ul ul ul {
\tborder-top: 0;
}

.header .mod_socials {
\tdisplay: none!important;
}

#top .inside {
\tbackground: none!important;
}

.header.original .smartmenu {
\tposition: absolute;
\ttop: 0;
\tright: 100px;
}

}
<?php endif; ?>

<?php if(\$this->header11PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

}
<?php endif; ?>

<?php if(\$this->header11Background): ?>
.header {
\tbackground-color: <?= \$this->header11Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header11Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header11Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header11Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header11Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header11Color; ?>;
}

<?php endif; ?>

<?php if(\$this->header11LineColor): ?>
.header.original .inside .mainmenu,
.header.original .mainmenu ul li a,
.header.original .mainmenu ul li a.first {
\tborder-color:  <?= \$this->header11LineColor; ?>;
}
<?php endif; ?>

<?php if(\$this->header12): ?>
@media only screen and (min-width: 768px) {

.header.original {
\tbackground: none;
}

#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

#top {
\tbackground: none!important;
}

#top .inside {
\tpadding-top: 10px;
\tpadding-bottom: 10px;
}

.header .inside {
\tbackground: #ffffff;
}

.header .mainmenu {
\tborder-left: 1px solid rgba(0,0,0,0.1);
\tpadding-left: 35px;
}

.header .mod_search {
\tborder-left: 1px solid rgba(0,0,0,0.1);
\tpadding-left: 40px;
}

.header .mainmenu {
\tfloat: left;
}

.header .mod_socials:before {
\tdisplay: none;
}

#slider {
\tmin-height: 180px;
}

.logo {
\tmargin-right: 35px;
}

.header.cloned {
\tbox-shadow: none;
\tbackground: none;
}

}
<?php endif; ?>

<?php if(\$this->header12Background): ?>
.header.original .inside,
.header.cloned .inside {
\tbackground-color: <?= \$this->header12Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header12Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header12Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header12Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header12Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header12Color; ?>;
}

<?php endif; ?>

<?php if(\$this->header12PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

}
<?php endif; ?>

<?php if(\$this->header12LineColor): ?>
.header.original .mainmenu,
.header.original .mod_search {
\tborder-color:  <?= \$this->header12LineColor; ?>;
}
<?php endif; ?>

<?php if(\$this->header13): ?>
@media only screen and (min-width: 768px) {

.header.original {
\tbackground: none;
\tmargin-top: 50px;
}

.header.original .mainmenu {
\tbackground: #ffffff;
\tfloat: right;
\tborder-radius: 100px;
\tpadding-left: 30px;
\tpadding-right: 30px;
\tbox-shadow: 0 4px 20px rgba(0,0,0,.1);
}

.header.original .mainmenu ul li a {
\tpadding-left: 20px;
\tpadding-right: 20px;
}

.header.original .mainmenu ul li a.last {
\tborder-right: 0;
}

.header.original .mainmenu ul li {
\tmargin-left: 0;
\tmargin-right: 0;
}

.header.original .mainmenu ul li.last {
\tborder-right: 0;
}

.header.original .smartmenu .smartmenu-trigger {
\twidth: 56px;
\tpadding: 0 10px;
\tbackground: rgba(255,255,255,0.95);
}

#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header .meta-nav,
.header .mod_search {
\tdisplay: none!important;
}

.header.original .logo {
\theight: 79px;
}

.header.original {
\tline-height: 79px;
}

#slider {
\tmin-height: 200px;
}

.header .mod_socials {
\tdisplay: none!important;
}

#top .inside {
\tbackground: none!important;
}

}
<?php endif; ?>

<?php if(\$this->header13Background): ?>
.header.original .mainmenu,
.header.cloned {
\tbackground-color: <?= \$this->header13Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header13Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header13Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header13Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header13Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header13Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header13PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

}
<?php endif; ?>

<?php if(\$this->header14): ?>
@media only screen and (min-width: 768px) {

.header.original {
\tline-height: 60px!important;
}

.header.original .logo {
\tfloat: none;
}

.header.original .mainmenu ul {
\ttext-align: left;
}

.header.original .header_metanavi {
\tposition: absolute;
\tright: var(--headerPaddings);
\ttop: 20px;
\tdisplay: block;
}

.header.original .header_metanavi a {
\tmargin-left: 20px;
}

.header.original .header_metanavi a.last {
\tmargin-right: 0;
}

.header.original .smartmenu {
\tfloat: left;
\tmargin-left: 0;
}

.header.original .smartmenu .smartmenu-trigger {
\theight: 60px;
}

.header.original .mainmenu {
\tfloat: left;
}

.mod_breadcrumb .mod_breadcrumb_inside:before,
.mod_breadcrumb .mod_breadcrumb_inside:after {
\tdisplay: block;
}

.mod_breadcrumb {
\tborder: 0;
}

.header.original:before {
\tcontent: '';
\tposition: absolute;
\tbottom: 0;
\tleft: 0;
\twidth: 100%;
\theight: 63px;
\tbackground: #000000;
}

#top .inside {
\tbackground: none!important;
}

}
<?php endif; ?>

<?php if(\$this->header14Background): ?>
.header.original:before,
.header.cloned {
\tbackground-color: <?= \$this->header14Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header14Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .mod_socials a {
\tcolor: <?= \$this->header14Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header14Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header14Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header14Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header15): ?>
@media only screen and (min-width: 768px) {

.smartmenu {
\tdisplay: block;
}

.mainmenu {
\tdisplay: none;
}

#top .inside {
\tbackground: none!important;
}

}
<?php endif; ?>

<?php if(\$this->header15PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

}
<?php endif; ?>

<?php if(\$this->header15Background): ?>
.header {
\tbackground-color: <?= \$this->header15Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header15Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header15Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header15Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header15Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header15Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header15Border): ?>
.header.original {
\tborder-bottom: 1px solid <?= \$this->header15Border; ?>;
}
<?php endif; ?>

<?php if(\$this->header16): ?>
@media only screen and (min-width: 768px) {

.smartmenu {
\tdisplay: block;
}

.mainmenu {
\tdisplay: none;
}

.smartmenu .smartmenu-trigger .line,
.smartmenu .smartmenu-trigger .line:before,
.smartmenu .smartmenu-trigger .line:after {
\theight: 2px;
\twidth: 20px;
}

.smartmenu .smartmenu-trigger .line {
\twidth: 15px;
}

.smartmenu .smartmenu-trigger .line:before {
\tmargin-top: 5px;
}

.smartmenu .smartmenu-trigger .line:after {
\tmargin-top: -7px;
}

#top .inside {
\tbackground: none!important;
}

}
<?php endif; ?>

<?php if(\$this->header16PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

}
<?php endif; ?>

<?php if(\$this->header16Background): ?>
.header {
\tbackground-color: <?= \$this->header16Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header16Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header16Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header16Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header16Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header16Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header16Border): ?>
.header.original {
\tborder-bottom: 1px solid <?= \$this->header16Border; ?>;
}
<?php endif; ?>

<?php if(\$this->header17): ?>
@media only screen and (min-width: 768px) {
   
#top {
     display: none;
}

.header .inside {
\theight: 100vh;
\tpadding-left: 20px;
\tpadding-right: 20px;
}

.header.original .mainmenu ul .megamenu-wrapper {
\ttop: 0!important;
}

.mainmenu ul li, .mainmenu ul ul li {
\tline-height: 45px;
}

.mainmenu {
\tfloat: none;
\tmargin-bottom: 40px;
\tdisplay: block;
\tbackground: #fff;
\tposition: relative;
\tz-index: 10;
}

.mainmenu ul {
\ttext-align: left;
}

.mainmenu ul li {
\tdisplay: block;
\ttext-align: left;
\tposition: relative;
\tright: auto;
}

body .header .mainmenu ul li {
\tmargin-left: 0;
\tmargin-right: 0;
}

body .header.original .mainmenu ul li a:before {
\tdisplay: none;
}

.mainmenu ul li ul li {
\tpadding-left: 0;
\tpadding-right: 0;
}

.mainmenu ul li a {
\ttext-align: left;
}

.mainmenu ul ul {
\tleft: 100%;
\ttop: 0;
}

.mainmenu .vlist.level_1 > li {
\tmargin-top: 0;
}

.mainmenu ul .megamenu-wrapper {
\tleft: 100%;
\ttop: 0;
\twidth: auto!important;
}

.mainmenu ul li:not(.floatbox) {
\tborder-bottom: 1px solid rgba(0,0,0,0.1);
}

.mainmenu ul li.first:not(.floatbox) {
\tborder-top: 1px solid rgba(0,0,0,0.1);
}

.mainmenu ul li ul li.first,
.mainmenu ul li ul li {
\tborder-top: 0!important;
\tborder-bottom: 0!important;
}

.mainmenu ul ul {
\tborder-top: 0;
\tmargin-top: 0;
}

nav.mainmenu li.megamenu ul li {
\tmin-width: 180px;
}

body .mainmenu ul ul li.open-left ul {
\tleft: 100%;
\tright: auto!important;
}

#fix-wrapper {
\twidth: 300px;
\tposition: fixed;
\tbox-shadow: 5px 0px 10px -2px rgba(0, 0, 0, 0.1);
\ttop: 0;
}

#slider,
#wrapper,
#bottom,
#offcanvas-top,
#footer,
.mod_breadcrumb {
\tmargin-left: 300px;
}

.logo {
\tfloat: none;
\theight: 200px;
}

#fix-wrapper.fixed .header {
\tposition: relative;
}

#fix-wrapper {
\theight: 100%!important;
}

#fix-wrapper.fixed .header {
\tbox-shadow: none;
}

#top .meta-nav {
\tdisplay: none;
}

.mainmenu ul li a {
\tpadding-left: 0;
}

#top-wrapper {
\theight: 100%;
}

.offcanvas-trigger {
\tdisplay: none;
}

.stickyheader {
\tdisplay: none!important;
}

.header .mainmenu ul li a span {
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
\tdisplay: inline-block;
}

.header .mainmenu ul li a i.fa {
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
\tposition: static;
\twidth: 20px;
}

nav.mainmenu li.megamenu ul {
\tpadding: 20px;
}

.smartmenu {
\tdisplay: none!important;
}

.ce_revolutionslider .rs-container {
\tleft: 0!important;
\twidth: 100%!important;
}

.header .mod_socials {
\tdisplay: none!important;
}

body .header .mainmenu ul li[class*=\"highlight\"].last {
\tmargin-top: 40px;
\tborder-bottom: 0;
}

body .header .mainmenu ul li a[class*=\"highlight\"] span {
\tpadding: 0px 15px;
}

body .header .mainmenu ul li a[class*=\"highlight\"]:not(.last) span {
\tline-height: 2rem;
}

#fix-wrapper {
   left: 0;
   transition: all 0.3s ease;
\t-webkit-transition: all 0.3s ease;
}\t

.mod_pct_megamenu {
   top: 50%!important;
   transform: translateY(-50%);
   margin-left: 285px;
   margin-right: 25px;
   position: fixed;
}

.header .mainmenu a.pct_megamenu:after, 
.header .mainmenu a.submenu:after {
   position: absolute;
   right: 10px;
}

.header .mod_search {
\tposition: absolute;
\tz-index: 1;
\tright: 20px;
\tbottom: 20px;
\tline-height: 37px;
\tpadding: 0;
}

.header .mod_langswitcher {
\tposition: absolute;
\tz-index: 1;
\tleft: 0;
\tbottom: 20px;
\tmargin-left: 20px;
\tmargin-right: 20px;
\tline-height: 35px;
}

.header .mod_langswitcher ul {
\tleft: 0;
\tright: auto;
\ttop: auto;
\tbottom: 100%;
\tborder-radius: 5px;
}
}
<?php endif; ?>

<?php if(\$this->header17vCenter): ?>
.mainmenu {
\tposition: relative;
\ttop: 50%;
\ttransform: translateY(-50%);
\tmargin-top: calc((-1 * var(--logoHeight)) - 55px);
}
<?php endif; ?>

<?php if(\$this->header17Background): ?>
.header,
.mainmenu {
\tbackground-color: <?= \$this->header17Background; ?>;
}

.mod_langswitcher ul {
\tbackground-color: <?= \$this->header17Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header17Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header17Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header17Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header17Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header17Color; ?>;
}


.sidebar_trigger .burger .burger_lines:after,
.sidebar_trigger .burger .burger_lines:before {
   background: <?= \$this->header17Color; ?>;
}

<?php endif; ?>

<?php if(\$this->header17LineColor): ?>
@media only screen and (min-width: 768px) {

.mainmenu ul li:not(.floatbox),
.mainmenu ul li.first:not(.floatbox) {
\tborder-color: <?= \$this->header17LineColor; ?>;
}

}
<?php endif; ?>

<?php if(\$this->header17BackgroundImage): ?>
@media only screen and (min-width: 768px) {

.header {
\tbackground-image: url(<?= \$this->header17BackgroundImage->file; ?>);
\tbackground-size: cover;
\tbackground-position: left top:
}

}
<?php endif; ?>

<?php if(\$this->header17TriggerSmallview): ?>
@media only screen and (min-width: 768px) {

.sidebar_trigger {
\tdisplay: block;
}

}
<?php endif; ?>

<?php if(\$this->header18): ?>
@media only screen and (min-width: 768px) {
   
#top {
     display: none;
}

.header .inside {
\theight: 100vh;
\tpadding-left: 20px;
\tpadding-right: 20px;
\ttext-align: center;
}

.header.original .mainmenu ul .megamenu-wrapper {
\ttop: 0!important;
}

.mainmenu ul li, .mainmenu ul ul li {
\tline-height: 45px;
}

.mainmenu {
\tfloat: none;
\tmargin-bottom: 40px;
\tdisplay: block;
\tbackground: #fff;
\tposition: relative;
\tz-index: 10;
}

.mainmenu ul {
\ttext-align: left;
}

.mainmenu ul li {
\tdisplay: block;
\ttext-align: left;
\tposition: relative;
\tright: auto;
\tpadding-left: 0;
\tpadding-right: 0;
}

body .header .mainmenu ul li {
\tmargin-left: 0;
\tmargin-right: 0;
}

body .header.original .mainmenu ul li a:before {
\tdisplay: none;
}

.mainmenu ul li ul li {
\tpadding-left: 0;
\tpadding-right: 0;
}

.mainmenu ul li a {
\ttext-align: center;
}

.mainmenu ul ul {
\tleft: 100%;
\ttop: 0;
}

.mainmenu .vlist.level_1 > li {
\tmargin-top: 0;
}

.mainmenu ul .megamenu-wrapper {
\tleft: 100%;
\ttop: 0;
\twidth: auto!important;
}

.mainmenu ul li:not(.floatbox) {
\tborder-bottom: 1px solid rgba(0,0,0,0.1);
}

.mainmenu ul li:not(.float_left) li:last-of-type {
\tborder: none;
}

.mainmenu ul li ul li.first,
.mainmenu ul li ul li {
\tborder-top: 0!important;
\tborder-bottom: 0!important;
}

.mainmenu ul ul {
\tborder-top: 0;
\tmargin-top: 0;
}

nav.mainmenu li.megamenu ul li {
\tmin-width: 180px;
}

body .mainmenu ul ul li.open-left ul {
\tleft: 100%;
\tright: auto!important;
}

#fix-wrapper {
\twidth: 300px;
\tposition: fixed;
\tbox-shadow: 5px 0px 10px -2px rgba(0, 0, 0, 0.1);
\ttop: 0;
}

#slider,
#wrapper,
#bottom,
#offcanvas-top,
#footer,
.mod_breadcrumb {
\tmargin-left: 300px;
}

.logo {
\tfloat: none;
\theight: 200px;
\tdisplay: inline-block;
}

#fix-wrapper.fixed .header {
\tposition: relative;
}

#fix-wrapper {
\theight: 100%!important;
}

#fix-wrapper.fixed .header {
\tbox-shadow: none;
}

#top .meta-nav {
\tdisplay: none;
}

.mainmenu ul li a {
\tpadding-left: 0;
}

#top-wrapper {
\theight: 100%;
}

.offcanvas-trigger {
\tdisplay: none;
}

.stickyheader {
\tdisplay: none!important;
}

.header .mainmenu ul li a span {
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
\tdisplay: inline-block;
}

.header .mainmenu ul li a i.fa {
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
\tposition: static;
\twidth: 20px;
}

nav.mainmenu li.megamenu ul {
\tpadding: 20px;
}

.smartmenu {
\tdisplay: none!important;
}

.ce_revolutionslider .rs-container {
\tleft: 0!important;
\twidth: 100%!important;
}

.header .mod_socials {
\tdisplay: none!important;
}

body .header .mainmenu ul li[class*=\"highlight\"].last {
\tmargin-top: 40px;
\tborder-bottom: 0;
}

body .header .mainmenu ul li a[class*=\"highlight\"] span {
\tpadding: 0px 15px;
}

body .header .mainmenu ul li a[class*=\"highlight\"]:not(.last) span {
\tline-height: 2rem;
}

#fix-wrapper {
   left: 0;
   transition: all 0.3s ease;
\t-webkit-transition: all 0.3s ease;
}\t

.mod_pct_megamenu {
   top: 50%!important;
   transform: translateY(-50%);
   margin-left: 285px;
   margin-right: 25px;
   position: fixed;
}

.header .mainmenu a.pct_megamenu:after, 
.header .mainmenu a.submenu:after {
   position: absolute;
   right: 10px;
}

.header .mod_search {
\tposition: absolute;
\tz-index: 1;
\tright: 20px;
\tbottom: 20px;
\tline-height: 37px;
\tpadding: 0;
}

.header .mod_langswitcher {
\tposition: absolute;
\tz-index: 1;
\tleft: 0;
\tbottom: 20px;
\tmargin-left: 20px;
\tmargin-right: 20px;
\tline-height: 35px;
}

.header .mod_langswitcher ul {
\tleft: 0;
\tright: auto;
\ttop: auto;
\tbottom: 100%;
\tborder-radius: 5px;
}
}
<?php endif; ?>

<?php if(\$this->header18vCenter): ?>
.mainmenu {
\tposition: relative;
\ttop: 50%;
\ttransform: translateY(-50%);
\tmargin-top: calc((-1 * var(--logoHeight)) - 55px);
}
<?php endif; ?>

<?php if(\$this->header18Background): ?>
.header,
.mainmenu {
\tbackground-color: <?= \$this->header18Background; ?>;
}

.mod_langswitcher ul {
\tbackground-color: <?= \$this->header18Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header18Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header18Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header18Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header18Color; ?>;
}

.sidebar_trigger .burger .burger_lines:after,
.sidebar_trigger .burger .burger_lines:before {
   background: <?= \$this->header18Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header18LineColor): ?>
@media only screen and (min-width: 768px) {

.mainmenu ul li.first,
.mainmenu ul li:not(.floatbox) {
\tborder-color: <?= \$this->header18LineColor; ?>;
}

}
<?php endif; ?>

<?php if(\$this->header18BackgroundImage): ?>
@media only screen and (min-width: 768px) {

.header {
\tbackground-image: url(<?= \$this->header18BackgroundImage->file; ?>);
\tbackground-size: cover;
\tbackground-position: left top:
}

}
<?php endif; ?>

<?php if(\$this->header19): ?>
@media only screen and (min-width: 768px) {

.header.original .mainmenu ul .megamenu-wrapper {
\ttop: 0!important;
}

.mainmenu ul li, .mainmenu ul ul li {
\tline-height: 2.5;
}

.mainmenu {
\tfloat: none;
\tmargin-bottom: 40px;
\tdisplay: table;
\tmargin-bottom: 170px;
\theight: calc(100% - var(--logoHeight));
\twidth: 100%;
\tbackground: #fff;
\tposition: relative;
}

.mainmenu .vlist.level_1 > li {
\tmargin-top: 0;
}

.mainmenu ul.level_1 {
\tpadding-bottom: 170px;
\tdisplay: table-cell;
\tvertical-align: middle;
}

.mainmenu ul {
\ttext-align: left;
}

.mainmenu ul li {
\tdisplay: block;
\ttext-align: left;
\tposition: relative;
\tright: auto;
\tpadding-left: 15px;
\tpadding-right: 15px;
}

body .header .mainmenu ul li {
\tmargin-left: 0;
\tmargin-right: 0;
}

.mainmenu ul li a:before {
\ttransition: All 0.3s ease;
\t-webkit-transition: All 0.3s ease;
\tcontent: '';
\twidth: 1px;
\tposition: absolute;
\tbackground-color: rgba(255,255,255,0.2);
\tleft: -30px;
\ttop: 0;
\theight: 0;
}

.mainmenu ul li a:hover:before {
\theight: 100%;
}

.mainmenu ul li a.trail:before,
.mainmenu ul li a.active:before {
\tcontent: '';
\twidth: 1px;
\tposition: absolute;
\tbackground-color: rgba(255,255,255,0.2);
\tleft: -30px;
\ttop: 0;
\theight: 100%;
}

.mainmenu ul li ul li a:hover:before {
\tdisplay: none;
}

.mainmenu ul li a.submenu:after {
\tfont-family: \"FontAwesome\";
\tcontent: \"\\f105\";
\tposition: absolute;
\ttop: 0;
\tright: 0;
}

.mainmenu ul li ul li {
\tpadding-left: 0;
\tpadding-right: 0;
}

.mainmenu ul li a {
\ttext-align: left;
}

.mainmenu ul ul {
\tleft: 100%;
\ttop: 0;
}

.mainmenu ul .megamenu-wrapper {
\tleft: 100%;
\ttop: 0;
\twidth: auto!important;
}

.mainmenu ul ul {
\tmargin-top: 0;
}

nav.mainmenu li.megamenu ul li {
\tmin-width: 180px;
}

body .mainmenu ul ul li.open-left ul {
\tleft: 100%;
\tright: auto!important;
}

.header.original {
\theight: 100%;
}

#header .inside {
\tpadding-right: 0;
\tpadding-left: 0;
\theight: 100%;
}

#fix-wrapper {
\twidth: 270px;
\tposition: fixed;
\tbackground: rgb(255,255,255);
\ttop: 0;
}

#slider,
#wrapper,
#bottom,
#offcanvas-top,
#footer,
.mod_breadcrumb {
\tmargin-left: 270px;
}

.logo {
\tfloat: none;
\theight: 170px;
\tmargin-left: 30px;
}

#fix-wrapper.fixed .header {
\tposition: relative;
}

#fix-wrapper {
\theight: 100%!important;
}

#fix-wrapper.fixed .header {
\tbox-shadow: none;
}

#top {
\tdisplay: none!important;
}

.mainmenu ul li a {
\tpadding-left: 0;
}

.header .mod_search {
\tposition: absolute;
\tleft: 160px;
\tbottom: 50px;
\tline-height: 37px;
\tpadding: 0;
}

.header .mod_langswitcher {
\tposition: absolute;
\tleft: 0;
\tbottom: 50px;
\tmargin-left: 30px;
\tmargin-right: 20px;
\tline-height: 35px;
}

.header .mod_langswitcher ul {
\tleft: 0;
\tright: auto;
\twidth: 210px;
\tborder-radius: 0 3px 3px 3px;
\tborder: 1px solid rgba(0,0,0,0.05);
\tbox-shadow: none;
}

.header .mod_langswitcher ul li {
\tdisplay: inline-block;
}

.header .mod_langswitcher ul li a {
\tborder-bottom: 0;
\tpadding: 10px 15px;
}

#nav-open-btn {
\tdisplay: none;
}

#top-wrapper {
\theight: 100%;
}

.offcanvas-trigger {
\tdisplay: none;
}

.stickyheader {
\tdisplay: none!important;
}

.header .mainmenu ul li a span {
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
\tdisplay: inline-block;
}

.header .mainmenu ul li a i.fa {
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
\tposition: static;
\twidth: 20px;
}

nav.mainmenu li.megamenu ul {
\tpadding: 20px;
}

.smartmenu {
\tdisplay: none!important;
}

.ce_revolutionslider .rs-container {
\tleft: 0!important;
\twidth: 100%!important;
}

.header .mod_socials {
\tdisplay: none!important;
}

body .header .mainmenu ul li[class*=\"highlight\"].last {
\tmargin-top: 40px;
\tborder-bottom: 0;
}

body .header .mainmenu ul li a[class*=\"highlight\"] span {
\tpadding: 5px 15px;
}

body .header .mainmenu ul li a[class*=\"highlight\"]:not(.last) span {
\tline-height: 2rem;
}

#fix-wrapper {
   left: 0;
}

.sidebar_trigger {
   display: block;
   line-height: 1;
   height: 35px;
}

.sidebar_trigger {
\tposition: relative;
\tcolor: rgb(0,0,0);
\tdisplay: none;
}

.sidebar_trigger .burger {
\theight: 21px;
\twidth: 21px;
\tposition: absolute;
\tright: 15px;
\ttop: 10px;
\tfont-size: 7px;
\tcursor: pointer;
\ttransition: .2s all;
\ttransform: rotate(180deg);
}

.sidebar_trigger .burger .burger_lines:after {
   left: 0;
   top: 0; 
   transform: rotate(45deg);
   background: rgb(0,0,0);
}

.sidebar_trigger .burger .burger_lines:before {
   left: 0;
   top: 0; 
   transform: rotate(-45deg);
   background: rgb(0,0,0);
}

.sidebar_trigger .burger:after {
\tcontent: '';
    display: block;
    position: absolute;
    height: 150%;
    width: 150%;
    top: -25%;
    left: -25%; 
}
  
.sidebar_trigger .burger .burger_lines {
\ttop: 50%;
\tmargin-top: -1px;
\tbackground-color: transparent;
 }
 
.sidebar_trigger .burger .burger_lines, 
.sidebar_trigger .burger .burger_lines:after, 
.sidebar_trigger .burger .burger_lines:before {
    pointer-events: none;
    display: block;
    content: '';
    width: 100%;
    border-radius: 10px;
    height: 2px;
    position: absolute;
}

.sidebar_trigger .burger.rotate .burger_lines, 
.sidebar_trigger .burger.rotate .burger_lines:after, 
.sidebar_trigger .burger.rotate .burger_lines:before {
\ttransition: all .2s; 
}

.mod_pct_megamenu {
   top: 50%!important;
   transform: translateY(-50%);
   margin-left: 250px;
   margin-right: 25px;
   position: fixed;
}
}
<?php endif; ?>

<?php if(\$this->header19TriggerSmallview): ?>
@media only screen and (min-width: 768px) {

.sidebar_trigger {
\tdisplay: block;
}

}
<?php endif; ?>

<?php if(\$this->header19Background): ?>
.header,
.mainmenu {
\tbackground-color: <?= \$this->header19Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header19Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header19Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header19Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header19Color; ?>;
}

.sidebar_trigger .burger .burger_lines:after,
.sidebar_trigger .burger .burger_lines:before {
   background: <?= \$this->header19Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header19BackgroundImage): ?>
@media only screen and (min-width: 768px) {

.header {
\tbackground-image: url(<?= \$this->header19BackgroundImage->file; ?>);
\tbackground-size: cover;
\tbackground-position: left top:
}

}
<?php endif; ?>

<?php if(\$this->header20): ?>
@media only screen and (min-width: 768px) {

.header {
\tbackground: none;
}

#fix-wrapper {
\tposition: absolute;
\tleft: 0;
\ttop: 40px;
}

.header .inside {
\tbackground: #ffffff;
}

.header {
\tmargin-left: auto;
\tmargin-right: auto;
}

.header {
\tmax-width: var(--contentBoxedWidth);
}

.header.cloned {
\tbox-shadow: none;
}

#slider {
\tmin-height: 156px;
}

#top {
\tdisplay: none;
}

}
<?php endif; ?>

<?php if(\$this->header20Background): ?>
.header .inside,
.header .inside {
\tbackground-color: <?= \$this->header20Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header20Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header20Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header20Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header20Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header20Color; ?>;
}

.header.original .mainmenu:before {
\tbackground: <?= \$this->header20Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header19BackgroundImage): ?>
@media only screen and (min-width: 768px) {

.header {
\tbackground-image: url(<?= \$this->header19BackgroundImage->file; ?>);
\tbackground-size: cover;
\tbackground-position: left top:
}

}
<?php endif; ?>

<?php if(\$this->header21): ?>
@media only screen and (min-width: 768px) {

.mainmenu ul li,
.mainmenu ul ul li {
\tline-height: 2.5;
}

.mainmenu {
\tfloat: none;
\tmargin-bottom: 40px;
\tdisplay: block;
}

.mainmenu ul {
\ttext-align: left;
}

.mainmenu ul li {
\tdisplay: block;
\ttext-align: left;
\tposition: relative;
\tright: auto;
\tpadding-left: 15px;
\tpadding-right: 15px;
}

body .header .mainmenu ul li {
\tmargin-left: 0;
\tmargin-right: 0;
}

.mainmenu ul li a:hover:before,
.mainmenu ul li a.trail:before,
.mainmenu ul li a.active:before {
\tcontent: '';
\twidth: 3px;
\tposition: absolute;
\tbackground-color: rgb(160,160,160);
\tleft: -30px;
\ttop: 0;
\theight: 100%;
}

.mainmenu ul li ul li a:hover:before {
\tdisplay: none;
}

.mainmenu ul li a.submenu:after {
\tfont-family: \"FontAwesome\";
\tcontent: \"\\f105\";
\tposition: absolute;
\ttop: 0;
\tright: 0;
}

.mainmenu ul li ul li {
\tpadding-left: 0;
\tpadding-right: 0;
}

.mainmenu ul li a {
\ttext-align: left;
}

.mainmenu ul ul {
\tleft: 100%;
\ttop: 0;
}

.mainmenu ul .megamenu-wrapper {
\tleft: 100%;
\ttop: 0;
\twidth: auto!important;
}

.mainmenu ul ul {
\tmargin-top: 0;
}

nav.mainmenu li.megamenu ul li {
\tmin-width: 180px;
}

body .mainmenu ul ul li.open-left ul {
\tleft: 100%;
\tright: auto!important;
}

.header.original {
\theight: 100%;
}

#header .inside {
\tpadding-right: 0;
\tpadding-left: 0;
\theight: 100%;
}

#fix-wrapper {
\twidth: 270px;
\tposition: fixed;
\tbackground: rgb(255,255,255);
\ttop: 0;
}

#slider,
#wrapper,
#bottom,
#offcanvas-top,
#footer,
.mod_breadcrumb {
\tmargin-left: 270px;
}

#top .inside {
\tpadding-left: 30px;
\tpadding-right: 30px;
}

#top .mod_socials {
\tmargin-left: 0;
}

.logo {
\tfloat: none;
\theight: 200px;
\tmargin-left: 30px;
}

#fix-wrapper.fixed .header {
\tposition: relative;
}

#fix-wrapper {
\theight: 100%!important;
}

#fix-wrapper.fixed .header {
\tbox-shadow: none;
}

#top .meta-nav {
\tdisplay: none;
}

#top .mod_socials {
\tfloat: none;
}

.mainmenu ul li a {
\tpadding-left: 0;
}

.header .mod_search {
\tposition: absolute;
\tleft: 160px;
\tbottom: 80px;
\tline-height: 37px;
\tpadding: 0;
}

.header .mod_langswitcher {
\tposition: absolute;
\tleft: 0;
\tbottom: 80px;
\tmargin-left: 30px;
\tmargin-right: 20px;
\tline-height: 35px;
}

.header .mod_langswitcher ul {
\tleft: 0;
\tright: auto;
\twidth: 210px;
\tborder-radius: 0 3px 3px 3px;
\tborder: 1px solid rgba(0,0,0,0.05);
\tbox-shadow: none;
}

.header .mod_langswitcher ul li {
\tdisplay: inline-block;
}

.header .mod_langswitcher ul li a {
\tborder-bottom: 0;
\tpadding: 10px 15px;
}

#nav-open-btn {
\tdisplay: none;
}

#top-wrapper {
\theight: 100%;
}

.offcanvas-trigger {
\tdisplay: none;
}

body.fixed-header .header.cloned {
\theight: 0!important;
\tline-height: 0!important;
\tdisplay: none!important;
}

.header .mainmenu ul li a span {
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
\tdisplay: inline-block;
}

.header .mainmenu ul li a i.fa {
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
\tposition: static;
\twidth: 20px;
}

#top .top_metanavi {
\tdisplay: none;
}

nav.mainmenu li.megamenu ul {
\tpadding: 20px;
}

.smartmenu {
\tdisplay: none;
}

.ce_revolutionslider .rs-container {
\tleft: 0!important;
\twidth: 100%!important;
}

.header.original {
\tbackground: #ffffff;
}

}
<?php endif; ?>

<?php if(\$this->header21BackgroundImage): ?>
@media only screen and (min-width: 768px) {

.header {
\tbackground-image: url(<?= \$this->header21BackgroundImage->file; ?>);
\tbackground-size: cover;
\tbackground-position: left top:
}

}
<?php endif; ?>

<?php if(\$this->header22): ?>
@media only screen and (min-width: 768px) {
   
#top {
     display: none;
}

.header.original .mainmenu ul .megamenu-wrapper {
\ttop: 0!important;
}

.mainmenu ul li, .mainmenu ul ul li {
\tline-height: 45px;
}

.mainmenu {
\tfloat: none;
\tmargin-bottom: 40px;
\tdisplay: block;
\tbackground: #fff;
\tposition: relative;
\tz-index: 10;
}

.mainmenu ul {
\ttext-align: left;
}

.mainmenu ul li {
\tdisplay: block;
\ttext-align: left;
\tposition: relative;
\tright: auto;
\tpadding-left: 15px;
\tpadding-right: 15px;
}

.mainmenu .vlist.level_1 > li {
\tmargin-top: 0;
}

body .header .mainmenu ul li {
\tmargin-left: 0;
\tmargin-right: 0;
}

.mainmenu ul li ul li {
\tpadding-left: 0;
\tpadding-right: 0;
}

body .header.original .mainmenu ul li a:before {
\tdisplay: none;
}

.mainmenu ul li a {
\ttext-align: left;
}

.mainmenu ul ul {
\tleft: 100%;
\ttop: 0;
}

.mainmenu ul .megamenu-wrapper {
\tleft: 100%;
\ttop: 0;
\twidth: auto!important;
\tborder: 0;
\tbox-shadow: 1px 8px 15px rgba(0,0,0,0.1);
}

.mainmenu ul li:not(.floatbox) {
\tborder-bottom: 1px solid rgba(0,0,0,0.1);
}

.mainmenu ul li.first {
\tborder-top: 1px solid rgba(0,0,0,0.1);
}

.mainmenu ul li ul li.first,
.mainmenu ul li ul li {
\tborder-top: 0!important;
\tborder-bottom: 0!important;
}

.mainmenu ul ul {
\tborder-top: 0;
\tmargin-top: 0;
}

nav.mainmenu li.megamenu ul li {
\tmin-width: 180px;
}

.header .inside {
\tpadding-right: 0;
\tpadding-left: 0;
}

#fix-wrapper {
\twidth: 300px;
\tposition: fixed;
\tbackground: rgba(255,255,255,1);
\tbox-shadow: 5px 0px 10px 6px rgba(0, 0, 0, 0.1);
\ttop: 0;
\tright: 0;
}

#slider,
#wrapper,
#bottom,
#offcanvas-top,
#footer,
.mod_breadcrumb {
\tmargin-right: 300px;
}

.logo {
\tfloat: none;
\theight: 200px;
\tmargin-left: 30px;
}

#fix-wrapper.fixed .header {
\tposition: relative;
}

#fix-wrapper {
\theight: 100%!important;
}

#fix-wrapper.fixed .header {
\tbox-shadow: none;
}

.mainmenu ul li a {
\tpadding-left: 0;
}

.header .mod_search {
\tposition: absolute;
\tz-index: 1;
\tright: 30px;
\tbottom: 20px;
\tline-height: 37px;
\tpadding: 0;
}

.header .mod_langswitcher {
\tposition: absolute;
\tz-index: 1;
\tleft: 0;
\tbottom: 20px;
\tmargin-left: 30px;
\tmargin-right: 20px;
\tline-height: 35px;
}

.header .mod_langswitcher ul {
\tleft: 0;
\tright: auto;
\ttop: auto;
\tbottom: 100%;
\tborder-radius: 5px;
}

#top-wrapper {
\theight: 100%;
}

.offcanvas-trigger {
\tdisplay: none;
}

.stickyheader {
\tdisplay: none!important;
}

.header .mainmenu ul li a span {
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
\tdisplay: inline-block;
}

.header .mainmenu ul li a i.fa {
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
\tposition: static;
\twidth: 20px;
}

.mainmenu ul ul,
.mainmenu ul .megamenu-wrapper {
\tleft: auto!important;
\tright: 100%!important;
}

nav.mainmenu li.megamenu .megamenu-wrapper ul,
nav.mainmenu li.megamenu .megamenu-wrapper ul a {
\tbox-shadow: none;
}

.mainmenu ul .megamenu-wrapper {
\tmax-width: 980px;
}

nav.mainmenu li.megamenu ul {
\tpadding: 20px;
}

.smartmenu {
\tdisplay: none!important;
}

.ce_revolutionslider .rs-container {
\tleft: 0!important;
\twidth: 100%!important;
}

.header .mod_socials {
\tfloat: none;
\tline-height: 1;
\tpadding: 5px 0;
\tmargin: 5px 0 25px 20px;
\tborder-top: 1px solid rgba(0,0,0,0.05);
\tborder-bottom: 1px solid rgba(0,0,0,0.05);
}

.header .mod_socials a {
\tdisplay: inline-block;
\tfloat: none;
}

.header .mod_socials:before {
\tdisplay: none;
}

body .header .mainmenu ul li[class*=\"highlight\"].last {
\tmargin-top: 40px;
\tborder-bottom: 0;
}

body .header .mainmenu ul li a[class*=\"highlight\"] span {
\tpadding: 0px 15px;
}

body .header .mainmenu ul li a[class*=\"highlight\"]:not(.last) span {
\tline-height: 2rem;
}

.mod_pct_megamenu {
   top: 50%!important;
   transform: translateY(-50%);
   margin-right: 285px;
   margin-left: 25px;
   position: fixed;
   left: auto;
}

.mod_pct_megamenu .item.active {
   box-shadow: 0 0 11px 5px rgba(0,0,0,0.1);
}

.header .mainmenu a.pct_megamenu:after, 
.header .mainmenu a.submenu:after {
   position: absolute;
   right: 10px;
}

.header .inside {
\theight: 100vh;
}
}
<?php endif; ?>

<?php if(\$this->header22vCenter): ?>
.mainmenu {
\tposition: relative;
\ttop: 50%;
\ttransform: translateY(-50%);
\tmargin-top: calc((-1 * var(--logoHeight)) - 55px);
}
<?php endif; ?>

<?php if(\$this->header22Background): ?>
.header,
.mainmenu {
\tbackground-color: <?= \$this->header22Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header22Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header22Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header22Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header22LineColor): ?>
@media only screen and (min-width: 768px) {

.mainmenu ul li.first,
.mainmenu ul li:not(.floatbox) {
\tborder-color: <?= \$this->header22LineColor; ?>;
}

}
<?php endif; ?>

<?php if(\$this->header22BackgroundImage): ?>
@media only screen and (min-width: 768px) {

.header {
\tbackground-image: url(<?= \$this->header22BackgroundImage->file; ?>);
\tbackground-size: cover;
\tbackground-position: left top:
}

}
<?php endif; ?>

<?php if(\$this->header23): ?>
@media only screen and (min-width: 768px) {

.header.original .logo {
\tfloat: none;
\tdisplay: block;
\tmargin-left: auto;
\tmargin-right: auto;
}

.header.original .mainmenu {
\tfloat: none;
\tmargin-left: auto;
\tmargin-right: auto;
\tbackground: #fff;
}

.header.original .mod_langswitcher {
\tposition: absolute;
\ttop: 0;
\tleft: var(--headerPaddings);
\tmargin-left: 0;
}

.header.original .mainmenu ul {
\ttext-align: center;
}

.header.original .mainmenu ul,
.header.original .mainmenu ul li a {
\tline-height: 90px;
}

.header.original .mod_search {
\tposition: absolute;
\tright: var(--headerPaddings);
\ttop: 0;
}

.header {
\tbackground: #f8f8f8;
}

.header.original .mainmenu {
\tbackground: #fff;
}

.header .mod_socials {
\tdisplay: none!important;
}

#top .inside {
\tbackground: none!important;
}

.header.original .smartmenu {
\tposition: absolute;
\ttop: 0;
\tright: 100px;
}

}
<?php endif; ?>

<?php if(\$this->header23Background): ?>
.header {
\tbackground-color: <?= \$this->header23Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header23Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header23Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header23Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header23Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header23Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header24): ?>
#top .inside {
\tbackground: none!important;
}

.logo {
\tposition: absolute;
}

.header {
\tline-height: 70px!important;
}

.smartmenu .smartmenu-trigger {
\theight: 70px!important;
}

@media only screen and (max-width: 767px) {

.stickyheader .header.cloned .inside,
.header .inside {
\theight: 70px!important;
}

}
<?php endif; ?>

<?php if(\$this->header24PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

}
<?php endif; ?>

<?php if(\$this->header24Background): ?>
.header {
\tbackground-color: <?= \$this->header24Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header24Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header24Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header24Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header24Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header24Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header24Border): ?>
.header.original {
\tborder-bottom: 1px solid <?= \$this->header24Border; ?>;
}
<?php endif; ?>

<?php if(\$this->header25): ?>
@media only screen and (min-width: 768px) {

.header .inside {
\tmax-width: calc(var(--contentBoxedWidth) - (var(--headerPaddings) * 2));
}

.header {
\theight: 75px;
\tbackground: #000;
\tmargin-left: auto;
\tmargin-right: auto;
}

#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header .inside {
\tbackground: #ffffff;
}

.header.cloned {
\tbackground: none;
\tbox-shadow: none;
}

#slider {
\tmin-height: 156px;
}

}
<?php endif; ?>

<?php if(\$this->header25Background): ?>
@media only screen and (min-width: 768px) {
\t.header {
\t\tbackground-color: <?= \$this->header25Background; ?>;
\t}
}
<?php endif; ?>

<?php if(\$this->header25Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header25Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header25Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header25Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header25Color; ?>;
}

.header.original .mainmenu:before {
\tbackground: <?= \$this->header25Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header26): ?>
#top .inside {
\tbackground: none!important;
}

.header .inside {
\tmax-width: 100%;
\tpadding-left: 0;
}

#top .inside {
\tmax-width: 100%;
}
<?php endif; ?>

<?php if(\$this->header26PositionAbsolute): ?>
@media only screen and (min-width: 768px) {
\t
#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

.header {
\tbackground-color: transparent;
}

}
<?php endif; ?>

<?php if(\$this->header26Background): ?>
.header {
\tbackground-color: <?= \$this->header26Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header26Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header26Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header26Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header26Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header26Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header26Border): ?>
.header.original {
\tborder-bottom: 1px solid <?= \$this->header26Border; ?>;
}
<?php endif; ?>

<?php if(\$this->headerStickyBackground): ?>
@media only screen and (min-width: 768px) {

.header.cloned {
\tbackground: <?= \$this->headerStickyBackground; ?>;
}

}
<?php endif; ?>

<?php if(\$this->header27): ?>
.header {
\tbackground: none!important;
\tmargin-top: 10px;
\tmargin-bottom: 10px;
}

.header .inside {
\tbox-shadow: 0 0 10px 2px rgba(0,0,0,0.1);
\tborder-radius: 100px;
\tbackground: #fff;
}

.header.cloned {
\tbox-shadow: none!important;
\tpadding-left: 10px;
\tpadding-right: 10px;
}

.header.cloned .inside {
\tbox-shadow: 0 0 10px 10px rgba(0,0,0,0.1);
}

<?php endif; ?>

<?php if(\$this->header27PositionAbsolute): ?>
@media only screen and (min-width: 768px) {

#fix-wrapper {
\tposition: absolute;
\tleft: 0;
}

}
<?php endif; ?>

<?php if(\$this->header27Background): ?>
.header .inside {
\tbackground-color: <?= \$this->header27Background; ?>;
}
<?php endif; ?>

<?php if(\$this->header27Color): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->header27Color; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->header27Color; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->header27Color; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->header27Color; ?>;
}
<?php endif; ?>

<?php if(\$this->header27ShadowNone): ?>
.header .inside {
\tbox-shadow: none;
}
<?php endif; ?>


<?php if(\$this->headerStickyFontSize): ?>
@media only screen and (min-width: 768px) {

.header.cloned,
.header.cloned .mainmenu ul li a,
.header.cloned .mod_langswitcher {
\tfont-size: <?= \$this->headerStickyFontSize; ?>px;
}

}
<?php endif; ?>

<?php if(\$this->headerStickyColor): ?>
@media only screen and (min-width: 768px) {

.header.cloned .mainmenu ul li a,
.header.cloned .ce_search_label i,
.header.cloned .mod_langswitcher .mod_langswitcher_inside,
.header.cloned .mod_socials a {
\tcolor: <?= \$this->headerStickyColor; ?>;
}

.header.cloned .mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->headerStickyColor; ?>;
}

.header.cloned .mod_socials:before {
\tborder-color: <?= \$this->headerStickyColor; ?>;
}

.header.cloned .smartmenu .smartmenu-trigger .line,
.header.cloned .smartmenu .smartmenu-trigger .line:before,
.header.cloned .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->headerStickyColor; ?>;

}

}
<?php endif; ?>

<?php if(\$this->headerMobileBackground): ?>
@media only screen and (max-width: 767px) {

.header {
\tbackground: <?= \$this->headerMobileBackground; ?>;
}

}
<?php endif; ?>

<?php if(\$this->headerMobileTriggerColor): ?>
.mmenu_trigger {
\tcolor: <?= \$this->headerMobileTriggerColor; ?>;
}

.mmenu_trigger .burger .burger_lines, 
.mmenu_trigger .burger .burger_lines:after, 
.mmenu_trigger .burger .burger_lines:before {
\tbackground-color: <?= \$this->headerMobileTriggerColor; ?>;
}
<?php endif; ?>


<?php if(\$this->headerMobileColor): ?>
@media only screen and (max-width: 767px) {

.header .mod_langswitcher .mod_langswitcher_inside {
\tcolor: <?= \$this->headerMobileColor; ?>;
}

.header .mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->headerMobileColor; ?>;
}

}
<?php endif; ?>

<?php if(\$this->logo_desktop): ?>
.logo a {
\tbackground-image: url(<?= \$this->logo_desktop->file; ?>);
}
<?php endif; ?>


<?php if(\$this->logo_sticky): ?>
.stickyheader .logo a {
\tbackground-image: url(<?= \$this->logo_sticky->file; ?>);
}
<?php endif; ?>

<?php if(\$this->logo_mobile): ?>
@media only screen and (max-width: 767px) {
\t.logo a {
\t\tbackground-image: url(<?= \$this->logo_mobile->file; ?>);
\t}
}
<?php endif; ?>

<?php if(\$this->logo_sticky_mob): ?>
@media only screen and (max-width: 767px) {
\t.stickyheader .logo a {
\t\tbackground-image: url(<?= \$this->logo_sticky_mob->file; ?>);
\t}
}
<?php endif; ?>


<?php if(\$this->logo_width): ?>
@media only screen and (min-width: 768px) {

\t.header.original .logo {
\t\twidth: <?= \$this->logo_width; ?>px;
\t}
\t
\t\t:root {
\t\t--logoWidth: <?= \$this->logo_height; ?>px;
\t}

}
<?php endif; ?>


<?php if(\$this->logo_height): ?>
@media only screen and (min-width: 768px) {

\t.header.original .logo {
\t\theight: <?= \$this->logo_height; ?>px;
\t}

\t.header.original {
\t\tline-height: <?= \$this->logo_height; ?>px;
\t}

\t.smartmenu .smartmenu-trigger {
\t\theight: <?= \$this->logo_height; ?>px;
\t}
\t
\t:root {
\t\t--logoHeight: <?= \$this->logo_height; ?>px;
\t}

}
<?php endif; ?>


<?php if(\$this->logo_width_sticky): ?>
@media only screen and (min-width: 768px) {

\t.stickyheader .header .logo {
\t\twidth: <?= \$this->logo_width_sticky; ?>px;
\t}

}
<?php endif; ?>

<?php if(\$this->logo_height_sticky): ?>
@media only screen and (min-width: 768px) {

\t.stickyheader .header .logo {
\t\theight: <?= \$this->logo_height_sticky; ?>px;
\t}

\t.stickyheader .header.cloned {
\t\tline-height: <?= \$this->logo_height_sticky; ?>px;
\t}
\t
\t.header.cloned .smartmenu .smartmenu-trigger {
\t\theight: <?= \$this->logo_height_sticky; ?>px;
\t}
\t
\thtml {
\t\tscroll-padding: <?= \$this->logo_height_sticky; ?>px 0 0 0;
\t}

}
<?php endif; ?>

<?php if(\$this->logo_width_tablet): ?>
@media only screen and (min-width : 768px) and (max-width : 1024px) {

\t.header.original .logo {
\t\twidth: <?= \$this->logo_width_tablet; ?>px;
\t}

}
<?php endif; ?>

<?php if(\$this->logo_height_tablet): ?>
@media only screen and (min-width : 768px) and (max-width : 1024px) {

\t.header.original .logo {
\t\theight: <?= \$this->logo_height_tablet; ?>px;
\t}

}
<?php endif; ?>



<?php if(\$this->logo_width_sticky_tablet): ?>
@media only screen and (min-width : 768px) and (max-width : 1024px) {

\t.stickyheader .header .logo {
\t\twidth: <?= \$this->logo_width_sticky_tablet; ?>px;
\t}

}
<?php endif; ?>

<?php if(\$this->logo_height_sticky_tablet): ?>
@media only screen and (min-width : 768px) and (max-width : 1024px) {

\t.stickyheader .header .logo {
\t\theight: <?= \$this->logo_height_sticky_tablet; ?>px;
\t}

}
<?php endif; ?>




<?php if(\$this->logo_width_mobile): ?>
@media only screen and (max-width: 767px) {

\t.header .logo {
\t\twidth: <?= \$this->logo_width_mobile; ?>px;
\t}

}
<?php endif; ?>


<?php if(\$this->logo_height_mobile): ?>
@media only screen and (max-width: 767px) {

\t.header .logo {
\t\theight: <?= \$this->logo_height_mobile; ?>px;
\t}
\t
\t.header {
\t\tline-height: <?= \$this->logo_height_mobile; ?>px;
\t}

}
<?php endif; ?>

<?php if(\$this->logo_width_sticky_mob): ?>
@media only screen and (max-width: 767px) {

\t.stickyheader .header .logo {
\t\twidth: <?= \$this->logo_width_sticky_mob; ?>px;
\t}
\t
}
<?php endif; ?>


<?php if(\$this->logo_height_sticky_mob): ?>
@media only screen and (max-width: 767px) {

\t.stickyheader .header .logo {
\t\theight: <?= \$this->logo_height_sticky_mob; ?>px;
\t}
\t
\thtml {
\t\tscroll-padding: <?= \$this->logo_height_sticky_mob; ?>px 0 0 0;
\t}

}
<?php endif; ?>

<?php if(\$this->menuFontFamily): ?>
.mainmenu ul li a  {
\tfont-family: <?= \$this->menuFontFamily; ?>;
}
<?php endif; ?>

<?php if(\$this->menuFontFamily_weight): ?>
.mainmenu ul li a  {
\tfont-weight: <?= \$this->menuFontFamily_weight; ?>;
}
<?php endif; ?>

<?php if(\$this->menuFontSize): ?>
.mainmenu ul li a  {
\tfont-size: <?= \$this->menuFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->menuFontColor): ?>
.header .mainmenu ul li a,
.header .mainmenu ul li ul a.active,
.header .ce_search_label i,
.header .mod_langswitcher .mod_langswitcher_inside,
.header .header_metanavi a,
.header .mod_socials a {
\tcolor: <?= \$this->menuFontColor; ?>;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->menuFontColor; ?>;
}

.header .mod_socials:before {
\tborder-color: <?= \$this->menuFontColor; ?>;
}

.header .smartmenu .smartmenu-trigger .line,
.header .smartmenu .smartmenu-trigger .line:before,
.header .smartmenu .smartmenu-trigger .line:after {
\tbackground: <?= \$this->menuFontColor; ?>;
}

.header.original .mainmenu:before {
\tbackground: <?= \$this->menuFontColor; ?>;
}
<?php endif; ?>

<?php if(\$this->menuFontColorActive): ?>
.header.original .mainmenu ul li a.trail.a-level_1,
.header.original .mainmenu ul li a.active.a-level_1,
.header.cloned .mainmenu ul li a.trail.a-level_1,
.header.cloned .mainmenu ul li a.active.a-level_1,
.mod_pct_megamenu .mod_navigation a.active.a-level_1 {
\tcolor: <?= \$this->menuFontColorActive; ?>;
}
<?php endif; ?>

<?php if(\$this->menuFontColorHover): ?>
.header .mainmenu ul li a.a-level_1:hover  {
\tcolor: <?= \$this->menuFontColorHover; ?>;
}
<?php endif; ?>

<?php if(\$this->menuFontUppercase): ?>
.mainmenu ul li a {
\ttext-transform: uppercase;
}
<?php endif; ?>

<?php if(\$this->menuFontLineHeight): ?>
.header.original .mainmenu ul li {
\tline-height: <?= \$this->menuFontLineHeight; ?>px;
}
.header.original .mainmenu ul .megamenu-wrapper {
\ttop: auto;
}
<?php endif; ?>

<?php if(\$this->menuFontLetterSpacing): ?>
.header .mainmenu ul li {
\tletter-spacing: <?= \$this->menuFontLetterSpacing; ?>px;
}
<?php endif; ?>


<?php if(\$this->dropdownFontFamily): ?>
.mainmenu ul li ul li a,
.mod_pct_megamenu .mod_navigation a {
\tfont-family: <?= \$this->dropdownFontFamily; ?>;
}
<?php endif; ?>

<?php if(\$this->dropdownFontSize): ?>
.mainmenu ul li ul li a,
.mod_pct_megamenu .mod_navigation a  {
\tfont-size: <?= \$this->dropdownFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->dropdownFontLineHeight): ?>
.mainmenu ul li ul li a,
.mod_pct_megamenu .mod_navigation a  {
\tline-height: <?= \$this->dropdownFontLineHeight; ?>px!important;
}
<?php endif; ?>

<?php if(\$this->dropdownFontUppercase): ?>
.mainmenu ul li ul li a,
.mod_pct_megamenu .mod_navigation a {
\ttext-transform: uppercase;
}
<?php endif; ?>

<?php if(\$this->dropdownFontBorderNone): ?>
.mainmenu ul li ul li a {
\tborder: none;
}
<?php endif; ?>

<?php if(\$this->menuMargin): ?>
.mainmenu ul li {
\tmargin-left: <?= \$this->menuMargin; ?>px;
\tmargin-right: <?= \$this->menuMargin; ?>px;
}

.mainmenu ul li a:after {
\tright: -<?= \$this->menuMargin; ?>px;
}
<?php endif; ?>

<?php if(\$this->menuBreakpoint): ?>
@media only screen and (min-width: 768px) and (max-width: <?= \$this->menuBreakpoint; ?>px) {

\t.smartmenu {
\t\tdisplay: block;
\t}

\t.mainmenu {
\t\tdisplay: none;
\t}
}
<?php endif; ?>

<?php if(\$this->menuBreakpoint && \$this->header10): ?>
@media only screen and (min-width: 768px) and (max-width: <?= \$this->menuBreakpoint; ?>px) {
\t.header.original .mod_langswitcher {
\t\tposition: absolute;
\t\ttop: 50%;
\t\tright: 100px;
\t\tmargin-right: 0;
\t\ttransform: translateY(-50%);
\t\t-webkit-transform: translateY(-50%);
\t}

\t.header.original .mod_search {
\t\tposition: absolute;
\t\ttop: 50%;
\t\tleft: 0;
\t\ttransform: translateY(-50%);
\t\t-webkit-transform: translateY(-50%);
\t}
}
<?php endif; ?>

<?php if(\$this->menuLayoutIconV2): ?>
.mainmenu ul li a.nav-icon span {
\tline-height: inherit;
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
}

.mainmenu ul li a i.fa {
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
\tposition: static;
\twidth: auto;
\tmargin-right: 7px;
}
<?php endif; ?>

<?php if(\$this->menuLayoutDividerV1): ?>
.header.original .mainmenu ul li a:before {
\tcontent: '';
\twidth: 2px;
\tbackground: <?= \$this->menuLayoutDividerV1; ?> !important;
\theight: 2px;
\tposition: absolute;
\tleft: -15px;
\ttop: 50%
}

.header.original .mainmenu ul li ul li a:before,
.header.original .mainmenu ul li.first a:before,
.header.original .mainmenu ul li.float_left.floatbox li:first-child a:before {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->menuLayoutDividerV2): ?>
.header.original .mainmenu ul li a:before {
\tcontent: '';
\twidth: 1px;
\tbackground: <?= \$this->menuLayoutDividerV2; ?> !important;
\ttransform: rotate(35deg);
\t-webkit-transform: rotate(35deg);
\theight: 20px;
\tposition: absolute;
\tleft: -15px;
\ttop: 50%;
\tmargin-top: -10px;
}

.header.original .mainmenu ul li ul li a:before,
.header.original .mainmenu ul li.first a:before,
.header.original .mainmenu ul li.float_left.floatbox li:first-child a:before {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->menuLayoutDividerV3): ?>
.header.original .mainmenu ul li a:before {
\tcontent: '';
\twidth: 1px;
\tbackground: <?= \$this->menuLayoutDividerV3; ?> !important;
\theight: 20px;
\tposition: absolute;
\tleft: -15px;
\ttop: 50%;
\tmargin-top: -10px;
}

.header.original .mainmenu ul li ul li a:before,
.header.original .mainmenu ul li.first a:before,
.header.original .mainmenu ul li.float_left.floatbox li:first-child a:before {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->menuLayoutArrows): ?>
.header .mainmenu a.pct_megamenu:after,
.header .mainmenu a.submenu:after {
   font-family: FontAwesome;
   content: \"\\f107\";
   margin-left: 5px;
   transition: all 0.3s;
   display: inline-block;
   transform-origin: center center;
}

.header .mainmenu a.pct_megamenu.active:after,
.header .mainmenu a.active.submenu:after,
.header .mainmenu a.submenu:not(.click_open):not(.pct_megamenu):hover:after,
.header .mainmenu li.submenu:not(.click_open):not(.pct_megamenu):hover a:after {
   transform: rotate(180deg);
}

.header .mainmenu ul ul li.submenu a:after {
   transform: rotate(-90deg)!important;
}
<?php endif; ?>

<?php if(\$this->menuActiveColor): ?>
.header.original .mainmenu ul li a.trail,
.header.original .mainmenu ul li a.active,
.header.cloned .mainmenu ul li a.trail,
.header.cloned .mainmenu ul li a.active,
.mod_pct_megamenu .mod_navigation a.active {
\tcolor: <?= \$this->menuActiveColor; ?>;
}
<?php endif; ?>

<?php if(\$this->menuActiveStyle2): ?>
.header .mainmenu ul li a.a-level_1.trail:not(.highlight),
.header .mainmenu ul li a.a-level_1.active:not(.highlight) {
\tbackground: <?= \$this->menuActiveStyle2; ?>;
\tpadding-left: 15px;
\tpadding-right: 15px;
}

<?php endif; ?>

<?php if(\$this->menuActiveStyle3): ?>
.header .mainmenu ul li a.a-level_1.trail:not(.highlight):after,
.header .mainmenu ul li a.a-level_1.active:not(.highlight):after {
\tborder: 2px solid <?= \$this->menuActiveStyle3; ?>;
\tpadding-left: 15px;
\tpadding-right: 15px;
\tcontent: '';
\tposition: absolute;
\ttop: 50%;
\tmargin-top: -20px;
\tmargin-bottom: -20px;
\tbottom: 50%;
\tleft: 0;
\tright: 0;
\tz-index: 1;
\tbackground: none!important;
}

.header .mainmenu ul li a.trail:not(.highlight),
.header .mainmenu ul li a.active:not(.highlight) {
\tpadding-left: 20px;
\tpadding-right: 20px;
}

.header .mainmenu ul li a.nav-icon span {
\tline-height: inherit;
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
}

.header .mainmenu ul li a i.fa {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->menuActiveStyle4): ?>
.header ul li a.a-level_1.trail:not(.highlight):before,
.header ul li a.a-level_1.active:not(.highlight):before {
\tcontent: '';
\tposition: absolute;
\ttop: 0;
\theight: 3px;
\twidth: 100%!important;
\tbackground: <?= \$this->menuActiveStyle4; ?> !important;
\tleft: 0;
}

.header ul li a.a-level_1:not(.highlight):before  {
\tcontent: '';
\theight: 3px;
\tbackground: <?= \$this->menuActiveStyle4; ?> !important;
\tposition: absolute;
\tleft: 50%;
\ttop: 0;
\twidth: 0;
\ttransition: All 0.3s ease;
\t-webkit-transition: All 0.3s ease;
}

.header.original ul li ul li a:not(.highlight):before {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->menuActiveStyle5): ?>
.header .mainmenu ul li a.a-level_1.trail:not(.highlight) span,
.header .mainmenu ul li a.a-level_1.active:not(.highlight) span {
\tborder-bottom: 1px solid <?= \$this->menuActiveStyle5; ?>;
\tpadding-bottom: 8px;
}

.header .mainmenu ul ul li a.a-level_1.trail:not(.highlight) span,
.header .mainmenu ul ul li a.a-level_1.active:not(.highlight) span {
\tborder-bottom: none;
}
<?php endif; ?>

<?php if(\$this->menuActiveStyle6): ?>
@media only screen and (min-width: 768px) {

.header .mainmenu ul li a.a-level_1.trail:not(.highlight) span,
.header .mainmenu ul li a.a-level_1.active:not(.highlight) span {
\tbackground: <?= \$this->menuActiveStyle6; ?>;
\tpadding: 10px 25px;
\tborder-radius: 100px;
}

.header .mainmenu ul ul li a.a-level_1.trail:not(.highlight) span,
.header .mainmenu ul ul li a.a-level_1.active:not(.highlight) span {
\tbackground: none;
\tpadding: 0;
}

.mainmenu ul li a.nav-icon span {
\tline-height: inherit;
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
}

.mainmenu ul li a i.fa {
\tdisplay: none;
}

}

<?php endif; ?>

<?php if(\$this->menuActiveStyle7): ?>
@media only screen and (min-width: 768px) {

.header .mainmenu ul li a.a-level_1.trail:not(.highlight) span,
.header .mainmenu ul li a.a-level_1.active:not(.highlight) span {
\tbackground: <?= \$this->menuActiveStyle7; ?>;
\tpadding: 10px 15px;
}

.header .mainmenu ul ul li a.a-level_1.trail:not(.highlight) span,
.header .mainmenu ul ul li a.a-level_1.active:not(.highlight) span {
\tbackground: none;
\tpadding: 0;
}

.mainmenu ul li a.nav-icon span {
\tline-height: inherit;
\ttransform: translateY(0);
\t-webkit-transform: translateY(0);
}

.mainmenu ul li a i.fa {
\tdisplay: none;
}

}

<?php endif; ?>

<?php if(\$this->highlightfontWeight): ?>
:root {
\t--menu-highlight-font-weight: <?= \$this->highlightfontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->highlightfontSize): ?>
:root {
\t--menu-highlight-font-size: <?= \$this->highlightfontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->highlightColor): ?>
:root {
\t--menu-highlight-color: <?= \$this->highlightColor; ?>;
}
<?php endif; ?>

<?php if(\$this->highlightBgColor): ?>
:root {
\t--menu-highlight-bg-color: <?= \$this->highlightBgColor; ?>;
}
<?php endif; ?>

<?php if(\$this->highlightBorderColor): ?>
:root {
\t--menu-highlight-border-color: <?= \$this->highlightBorderColor; ?>;
}
<?php endif; ?>

<?php if(\$this->highlightBorderRadius): ?>
:root {
\t--menu-highlight-border-radius: <?= \$this->highlightBorderRadius; ?>px;
}
<?php endif; ?>

<?php if(\$this->highlightBorderWidth): ?>
:root {
\t--menu-highlight-border-width: <?= \$this->highlightBorderWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->highlightPaddingLR): ?>
:root {
\t--menu-highlight-padding-lr: <?= \$this->highlightPaddingLR; ?>px;
}
<?php endif; ?>

<?php if(\$this->highlightPaddingTB): ?>
:root {
\t--menu-highlight-padding-tb: <?= \$this->highlightPaddingTB; ?>px;
}
<?php endif; ?>

<?php if(\$this->highlightMarginLeft): ?>
:root {
\t--menu-highlight-margin-left: <?= \$this->highlightMarginLeft; ?>px;
}
<?php endif; ?>

<?php if(\$this->highlightMarginRight): ?>
:root {
\t--menu-highlight-margin-right: <?= \$this->highlightMarginRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->dropdownColor): ?>
.mainmenu ul ul li a,
nav.mainmenu a.menuheader,
.mod_pct_megamenu .mod_navigation a,
#top .mod_navigation li ul li a {
\tcolor: <?= \$this->dropdownColor; ?>!important;
}

.header .mainmenu ul ul li a:not(.menuheader):not(.megamenu) span:before,
.header .mainmenu ul ul li a.active span:before,
.header .mainmenu ul ul li a.trail:not(.megamenu) span:before,
.mod_pct_megamenu .mod_navigation a:before {
   background: <?= \$this->dropdownColor; ?>;
}
<?php endif; ?>

<?php if(\$this->dropdownActiveColor): ?>
nav.mainmenu ul ul a.active,
.mod_pct_megamenu .mod_navigation a.active,
#top .mod_navigation li ul li a.active {
\tcolor: <?= \$this->dropdownActiveColor; ?>!important;
}

.mod_pct_megamenu .mod_navigation a.active:before,
.header .mainmenu ul ul li a.active span:before {
   background-color: <?= \$this->dropdownActiveColor; ?>!important;
}
<?php endif; ?>

<?php if(\$this->dropdownMMHeadlines): ?>
.mod_pct_megamenu .ce_headline {
   color: <?= \$this->dropdownMMHeadlines; ?>;
}
<?php endif; ?>

<?php if(\$this->dropdownNoUnderline): ?>
.header .mainmenu ul ul li a:hover span:before,
.header .mainmenu ul ul li a.active span:before,
.header .mainmenu ul ul li a.trail span:before,
.mod_pct_megamenu .mod_navigation a:hover:before,
.mod_pct_megamenu .mod_navigation a.active:before {
   display: none;
}
<?php endif; ?>

<?php if(\$this->dropdownRoundedCorners): ?>
.mainmenu ul ul,
#top .mod_navigation li ul,
.mod_pct_megamenu {
   border-radius: 5px;
}

.mod_pct_megamenu .column:last-of-type .attributes {
\tborder-radius: 0 5px 5px 0;
}
<?php endif; ?>

<?php if(\$this->dropdownBackground): ?>
.mainmenu ul ul,
#top .mod_navigation li ul {
\tbackground-color: <?= \$this->dropdownBackground; ?>
}

#top .mod_navigation li ul:before {
\tborder-color: transparent transparent <?= \$this->dropdownBackground; ?> transparent;
}

nav.mainmenu a.menuheader {
\tbackground-color: <?= \$this->dropdownBackground; ?>!important;
}

.mainmenu ul .megamenu-wrapper ul ul {
\tbackground: none;
}

.mod_pct_megamenu {
\tbackground-color: <?= \$this->dropdownBackground; ?>
}

.mod_langswitcher ul {
\tbackground-color: <?= \$this->dropdownBackground; ?>
}

<?php endif; ?>

<?php if(\$this->dropdownBorderColor): ?>
.mainmenu ul ul li a,
nav.mainmenu li.megamenu > .last,
.mainmenu ul .megamenu ul li,
.mainmenu ul li.megamenu .megamenu-wrapper {
\tborder-color: <?= \$this->dropdownBorderColor; ?>;
}
<?php endif; ?>


<?php if(\$this->mobileMenuSearch): ?>
.mm-menu .mod_search {
\tdisplay: none;
}

.mm-navbars_top {
\theight: 0;
}

.mm-navbars_top .mm-panels {
\ttop: 0px;
}
<?php endif; ?>

<?php if(\$this->mobileMenuLangswitch): ?>
.mm-menu .mod_langswitcher {
\tdisplay: none;
}

.mm-navbars_bottom {
\theight: 40px;
}
<?php endif; ?>

<?php if(\$this->mobileMenuSocials): ?>
.mm-menu .mod_socials {
\tdisplay: none;
}

.mm-navbars_bottom {
\theight: 40px;
}
<?php endif; ?>

<?php if(\$this->headerStickyColorActive): ?>
.header.cloned .mainmenu ul li a.trail.a-level_1,
.header.cloned .mainmenu ul li a.active.a-level_1 {
\tcolor: <?= \$this->headerStickyColorActive; ?>;
}
<?php endif; ?>

<?php if(\$this->headerStickyHighlightPaddingLR): ?>
:root {
\t--menu-highlight-padding-lr-sticky: <?= \$this->headerStickyHighlightPaddingLR; ?>px;
}
<?php endif; ?>

<?php if(\$this->headerStickyHighlightPaddingTB): ?>
:root {
\t--menu-highlight-padding-tb-sticky: <?= \$this->headerStickyHighlightPaddingTB; ?>px;
}
<?php endif; ?>

<?php if(\$this->headerStickyHighlightMarginLeft): ?>
:root {
\t--menu-highlight-margin-left-sticky: <?= \$this->headerStickyHighlightMarginLeft; ?>px;
}
<?php endif; ?>

<?php if(\$this->headerStickyHighlightMarginRight): ?>
:root {
\t--menu-highlight-margin-right-sticky: <?= \$this->headerStickyHighlightMarginRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->noSmartmenu): ?>
@media only screen and (min-width: 768px) {

\t.mainmenu {
\t\tdisplay: block;
\t}

\t.smartmenu {
\t\tdisplay: none;
\t}

}
<?php endif; ?>

<?php if(\$this->langswitch_style2): ?>
.header .mod_langswitcher {
\tfont-size: 0.9rem;
}

.header .mod_langswitcher .mod_langswitcher_inside {
\tpadding-right: 0;
\tvertical-align: middle;
}

.mod_langswitcher ul {
\tleft: auto;
\tright: 0;
\twidth: auto;
}

.mod_langswitcher .mod_langswitcher_inside {
\tline-height: 1rem;
}

.mod_langswitcher span {
\tdisplay: inline-block
}

.mod_langswitcher img {
\tdisplay: none;
}

.mod_langswitcher .mod_langswitcher_inside:before {
\tdisplay: none;
}

#top .mod_langswitcher .mod_langswitcher_inside span:hover {
\tbackground: none;
}

.mm-menu .mod_langswitcher ul li img {
\tdisplay: none;
}

.mm-menu .mod_langswitcher .mod_langswitcher_inside > span {
\tdisplay: none;
}

<?php endif; ?>

<?php if(\$this->smartmenuFont): ?>
.smartmenu-content .mod_navigation li:not(.floatbox) {
\tfont-family:<?= \$this->smartmenuFont; ?>;
}
<?php endif; ?>

<?php if(\$this->smartmenuFontSize): ?>
.smartmenu-content .mod_navigation li:not(.floatbox) {
\tfont-size:<?= \$this->smartmenuFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->smartmenuFontLineHeight): ?>
.smartmenu-content .mod_navigation li:not(.floatbox) {
\tline-height:<?= \$this->smartmenuFontLineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->smartmenuFontLineHeight): ?>
.smartmenu-content .mod_navigation li:not(.floatbox) {
\tline-height:<?= \$this->smartmenuFontLineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->smartmenuFontUppercase): ?>
.smartmenu-content .mod_navigation li:not(.floatbox) {
\ttext-transform: uppercase;
}
<?php endif; ?>

<?php if(\$this->smartmenuFontColor): ?>
.smartmenu-content .mod_navigation a {
\tcolor:<?= \$this->smartmenuFontColor; ?>;
}

.smartmenu-content .mod_navigation a.active, .smartmenu-content .mod_navigation a.trail {
\tborder-color:<?= \$this->smartmenuFontColor; ?>;
}

.smartmenu-content .smartmenu-close:before, .smartmenu-content .smartmenu-close:after {
\tbackground:<?= \$this->smartmenuFontColor; ?>;
}

.smartmenu-content .subitems_trigger:before {
\tcolor: <?= \$this->smartmenuFontColor; ?>;
}
<?php endif; ?>

<?php if(\$this->smartmenuBackgroundColor): ?>
.smartmenu-content {
\tbackground-color:<?= \$this->smartmenuBackgroundColor; ?>;
}

body {
\tbackground-color:<?= \$this->smartmenuBackgroundColor; ?>;
}
<?php endif; ?>

<?php if(\$this->smartmenuHighlightPaddingLR): ?>
:root {
\t--menu-highlight-padding-lr-smartmenu: <?= \$this->smartmenuHighlightPaddingLR; ?>px;
}
<?php endif; ?>

<?php if(\$this->smartmenuHighlightFontSize): ?>
:root {
\t--menu-highlight-font-size-smartmenu: <?= \$this->smartmenuHighlightFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->smartmenuHighlightPaddingTB): ?>
:root {
\t--menu-highlight-padding-tb-smartmenu: <?= \$this->smartmenuHighlightPaddingTB; ?>px;
}
<?php endif; ?>

<?php if(\$this->smartmenuHighlightMarginTop): ?>
:root {
\t--menu-highlight-margin-top-smartmenu: <?= \$this->smartmenuHighlightMarginTop; ?>px;
}
<?php endif; ?>

<?php if(\$this->smartmenuHighlightMarginBottom): ?>
:root {
\t--menu-highlight-margin-bottom-smartmenu: <?= \$this->smartmenuHighlightMarginBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->smartmenuOff): ?>
@media only screen and (min-width : 768px) and (max-width : 1024px) {
\t.smartmenu {
\t\tdisplay: none;
\t}
\t.mainmenu {
\t\tdisplay: block;
\t}
}
<?php endif; ?>

<?php if(\$this->mmenuOnTablets): ?>
@media only screen and (min-width : 768px) and (max-width : 1024px) {
\t#top {
\t\tdisplay: none!important;
\t}

   .mmenu_trigger {
      float: right!important;
      display: flex!important;
      margin-left: 15px!important;
   }
   
   .smartmenu {
      display: none!important;
   }
   
   .mainmenu {
      display: none!important;
   }
   
   #mmenu {
      display: block!important;
   }

    #fix-wrapper {
\t\twidth: 100%!important; 
\t\theight:auto!important;
\t\ttop: 0!important;
\t}

\t.mmenu_trigger {
\t\tdisplay: flex!important;
\t\tright: 20px!important;
\t}
\t
\t.header .mainmenu,
\t.header .mod_socials,
\t.header .mod_langswitcher,
\t.header .mod_search,
\t.header .header_metanavi {
\t\tdisplay: none!important;
\t}
\t
\t#slider,
\t#wrapper, 
\t#bottom, 
\t#offcanvas-top, 
\t#footer {
\t\tmargin-left: auto!important;
\t\tmargin-right: auto!important;
\t}  

\t#mmenu {
\t\tdisplay: block!important;
\t\ttop: 0;
\t}

\t.logo {
\t\tfloat: left!important;
\t\tposition: static!important;
\t\ttransform: none!important;
\t\t-webkit-transform: none!important;
\t\tmargin: 0!important;
\t}

\t.header {
\t\tmargin: 0!important;
\t}

\t.header .inside {
\t\tpadding-left: 40px!important;
\t}

\t.header.original:before {
\t\tdisplay: none!important;
\t}

\t.header.original {
\t\theight: auto!important;
\t}
}

<?php endif; ?>

<?php if(\$this->mmenuOnTabletsColor): ?>
@media only screen and (min-width : 768px) and (max-width : 1024px) {
   .mmenu_trigger {
      color: <?= \$this->mmenuOnTabletsColor; ?>;
   }
   
   .mmenu_trigger .burger .burger_lines, 
   .mmenu_trigger .burger .burger_lines:after, 
   .mmenu_trigger .burger .burger_lines:before
    {
          background-color: <?= \$this->mmenuOnTabletsColor; ?>;
    }
}
<?php endif; ?>

<?php if(\$this->smartmenuForceTablets): ?>
@media only screen and (min-width : 768px) and (max-width : 1024px) {
\t.mainmenu {
\t\tdisplay: none;
\t}

\t.smartmenu {
\t\tdisplay: block;
\t}
}
<?php endif; ?>

<?php if(\$this->topbarMobile): ?>
@media only screen and (max-width: 767px) {
\t#top {
\t\tdisplay: block!important;
\t}
}
<?php endif; ?>

<?php if(\$this->topbarMobileHideLogin): ?>
@media only screen and (max-width: 767px) {
\t#top .mod_login_top {
\t\tdisplay: none;
\t}
}
<?php endif; ?>

<?php if(\$this->headerMobileShowLangswitch): ?>
@media only screen and (max-width: 767px) {
\t.header .mod_langswitcher {
\t\tdisplay: block;
\t}
}
<?php endif; ?>

<?php if(\$this->headerMobileHideTriggerlabel): ?>
.mmenu_trigger .label {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->headerMobileTriggerlabelUppercase): ?>
.mmenu_trigger .label {
\ttext-transform: uppercase;
}
<?php endif; ?>

<?php if(\$this->headerMobileTriggerlabelSize): ?>
.mmenu_trigger .label {
\tfont-size: <?= \$this->headerMobileTriggerlabelSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->headerMobileAbsoluteHome): ?>
@media only screen and (max-width: 767px) {
\tbody.home #fix-wrapper {
\t\t\tposition: absolute;
\t\t}
}
<?php endif; ?>

<?php if(\$this->headerMobileAbsoluteContent): ?>
@media only screen and (max-width: 767px) {
\tbody.content_page #fix-wrapper {
\t\t\tposition: absolute;
\t\t}
}
<?php endif; ?>

<?php if(\$this->headerMobileLogoCenter): ?>
@media only screen and (max-width: 767px) {
\t.logo {
\t\tfloat: none;
\t\tmargin-left: auto;
\t\tmargin-right: auto;
\t}
\t
\t.mmenu_trigger .label {
\t\tdisplay: none;
\t}
\t
\t.mmenu_trigger {
\t\ttop: 50%;
\t\tright: 20px;
\t\tposition: absolute;
\t\ttransform: translateY(-50%);
\t}
}
<?php endif; ?>

<?php if(\$this->stickyMobileBackground): ?>
@media only screen and (max-width: 767px) {

.stickyheader .header {
\tbackground: <?= \$this->stickyMobileBackground; ?>;
}

}
<?php endif; ?>

<?php if(\$this->stickyMobileTriggerColor): ?>
.stickyheader .mmenu_trigger {
\tcolor: <?= \$this->stickyMobileTriggerColor; ?>;
}

.stickyheader .mmenu_trigger .burger .burger_lines, 
.stickyheader .mmenu_trigger .burger .burger_lines:after, 
.stickyheader .mmenu_trigger .burger .burger_lines:before {
\tbackground-color: <?= \$this->stickyMobileTriggerColor; ?>;
}
<?php endif; ?>

<?php if(\$this->stickyMobileShowLangswitch): ?>
@media only screen and (max-width: 767px) {
\t.stickyheader .header .mod_langswitcher {
\t\tdisplay: block;
\t}
}
<?php endif; ?>

<?php if(\$this->stickyMobileTriggerV2): ?>
.stickyheader #nav-open-btn:before {
\tdisplay: none;
}

.stickyheader #nav-open-btn span {
\theight: 1px;
\tbackground: <?= \$this->stickyMobileTriggerV2; ?>;
\tdisplay: block;
}

.stickyheader #nav-open-btn span.line2 {
\tmargin: 8px 0;
}

.stickyheader #nav-open-btn {
\tmargin-top: -10px;
\theight: 20px;
}
<?php endif; ?>

<?php if(\$this->stickyMobileTriggerV3): ?>

.stickyheader #nav-open-btn {
\twidth: 75px;
}

.stickyheader #nav-open-btn:before {
\tdisplay: none;
}

.stickyheader #nav-open-btn span {
\theight: 1px;
\tbackground: <?= \$this->stickyMobileTriggerV3; ?>;
\tdisplay: block;
\twidth: 28px;
}

.stickyheader #nav-open-btn strong {
\tdisplay: block;
\tposition: absolute;
\ttop: 2px;
\tright: 0;
\tcolor: <?= \$this->stickyMobileTriggerV3; ?>;
\tline-height: 1;
}

.stickyheader #nav-open-btn span.line2 {
\tmargin: 7px 0;
}

.stickyheader #nav-open-btn {
\tmargin-top: -10px;
\theight: 20px;
}
<?php endif; ?>

<?php if(\$this->stickyMobileLogoCenter): ?>
@media only screen and (max-width: 767px) {
\t.stickyheader .logo {
\t\tfloat: none;
\t\tmargin-left: auto;
\t\tmargin-right: auto;
\t}
}
<?php endif; ?>

<?php if(\$this->stickyMobileHide): ?>
@media only screen and (max-width: 767px) {
\t.stickyheader {
\t\tdisplay: none;
\t}
\t
\thtml {
\t\tscroll-padding: 0;
\t}
}
<?php endif; ?>

<?php if(\$this->paragraphSize): ?>
p,
.ce_text ul,
.ce_text ol {
\tfont-size: <?= \$this->paragraphSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->paragraphLineHeight): ?>
p,
.ce_text ul,
.ce_text ol {
\tline-height: <?= \$this->paragraphLineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->paragraphColor): ?>
p, 
p a,
.ce_text {
\tcolor: <?= \$this->paragraphColor; ?>;
}
<?php endif; ?>

<?php if(\$this->paragraphSizeSmall): ?>
:root {
\t--paragraph-small-font-size: <?= \$this->paragraphSizeSmall; ?>px;
}
<?php endif; ?>

<?php if(\$this->paragraphLineHeightSmall): ?>
:root {
\t--paragraph-small-line-height: <?= \$this->paragraphLineHeightSmall; ?>px;
}
<?php endif; ?>

<?php if(\$this->paragraphColorSmall): ?>
.ce_text.format-p-small p,
.ce_text.format-p-small ul,
.ce_text.format-p-small ol,
.ce_text.format-p-small p a {
\tcolor: <?= \$this->paragraphColorSmall; ?>;
}
<?php endif; ?>

<?php if(\$this->paragraphSizeMedium): ?>
:root {
\t--paragraph-medium-font-size: <?= \$this->paragraphSizeMedium; ?>px;
}
<?php endif; ?>

<?php if(\$this->paragraphLineHeightMedium): ?>
:root {
\t--paragraph-medium-line-height: <?= \$this->paragraphLineHeightMedium; ?>px;
}
<?php endif; ?>

<?php if(\$this->paragraphColorMedium): ?>
.ce_text.format-p-medium p,
.ce_text.format-p-medium ul,
.ce_text.format-p-medium ol,
.ce_text.format-p-medium p a {
\tcolor: <?= \$this->paragraphColorMedium; ?>;
}
<?php endif; ?>

<?php if(\$this->paragraphSizeBig): ?>
:root {
\t--paragraph-large-font-size: <?= \$this->paragraphSizeBig; ?>px;
}
<?php endif; ?>

<?php if(\$this->paragraphLineHeightBig): ?>
:root {
\t--paragraph-large-line-height: <?= \$this->paragraphLineHeightBig; ?>px;
}
<?php endif; ?>

<?php if(\$this->paragraphColorBig): ?>
.ce_text.format-p-large p,
.ce_text.format-p-large ul,
.ce_text.format-p-large ol,
.ce_text.format-p-large p a {
\tcolor: <?= \$this->paragraphColorBig; ?>;
}
<?php endif; ?>

<?php if(\$this->paragraphMobSize): ?>
@media only screen and (max-width: 767px) {
\tp,
\t.ce_text ul,
\t.ce_text ol {
\t\tfont-size: <?= \$this->paragraphMobSize; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->paragraphMobLineHeight): ?>
@media only screen and (max-width: 767px) {
\tp,
\t.ce_text ul,
\t.ce_text ol {
\t\tline-height: <?= \$this->paragraphMobLineHeight; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->paragraphMobSizeSmall): ?>
@media only screen and (max-width: 767px) {
\t.ce_text.format-p-small p,
\t.ce_text.format-p-small ul,
\t.ce_text.format-p-small ol {
\t\tfont-size: <?= \$this->paragraphMobSizeSmall; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->paragraphMobLineHeightSmall): ?>
@media only screen and (max-width: 767px) {
\t.ce_text.format-p-small p,
\t.ce_text.format-p-small ul,
\t.ce_text.format-p-small ol {
\t\tline-height: <?= \$this->paragraphMobLineHeightSmall; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->paragraphMobSizeMedium): ?>
@media only screen and (max-width: 767px) {
\t.ce_text.format-p-medium p,
\t.ce_text.format-p-medium ul,
\t.ce_text.format-p-medium ol {
\t\tfont-size: <?= \$this->paragraphMobSizeMedium; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->paragraphMobLineHeightMedium): ?>
@media only screen and (max-width: 767px) {
\t.ce_text.format-p-medium p,
\t.ce_text.format-p-medium ul,
\t.ce_text.format-p-medium ol {
\t\tline-height: <?= \$this->paragraphMobLineHeightMedium; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->paragraphMobSizeBig): ?>
@media only screen and (max-width: 767px) {
\t.ce_text.format-p-large p,
\t.ce_text.format-p-large ul,
\t.ce_text.format-p-large ol {
\t\tfont-size: <?= \$this->paragraphMobSizeBig; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->paragraphMobLineHeightBig): ?>
@media only screen and (max-width: 767px) {
\t.ce_text.format-p-large p,
\t.ce_text.format-p-large ul,
\t.ce_text.format-p-large ol {
\t\tline-height: <?= \$this->paragraphMobLineHeightBig; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->paragraphLinksColorAccent): ?>
.ce_text a,
.ce_text p a {
\tcolor: var(--accentColor)!important;
}
<?php endif; ?>

<?php if(\$this->paragraphLinksColor): ?>
.ce_text a,
.ce_text p a {
\tcolor: <?= \$this->paragraphLinksColor; ?>!important;
}
<?php endif; ?>

<?php if(\$this->paragraphLinksUnderline): ?>
.ce_text a {
\ttext-decoration: underline;
}
<?php endif; ?>

<?php if(\$this->paragraphListStyle1): ?>
.ce_text ul li {
\tlist-style: circle;
}
<?php endif; ?>

<?php if(\$this->paragraphListStyle2): ?>
.ce_text ul li {
\tlist-style: square;
}
<?php endif; ?>

<?php if(\$this->paragraphListStyleNone): ?>
.ce_text ul {
\tpadding-left: 0;
}

.ce_text ul li {
\tlist-style: none;
}
<?php endif; ?>

<?php if(\$this->paragraphListPadding): ?>
.ce_text ul, 
.ce_text ol {
\tpadding-left: <?= \$this->paragraphListPadding; ?>px;
}
<?php endif; ?>

<?php if(\$this->paragraphListPaddingMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_text ul, 
\t.ce_text ol {
\t\tpadding-left: <?= \$this->paragraphListPaddingMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->paragraphListMargin): ?>
.ce_text ul li, 
.ce_text ol li {
\tmargin-bottom: <?= \$this->paragraphListMargin; ?>px;
}
<?php endif; ?>

<?php if(\$this->paragraphListMarginMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_text ul li, 
\t.ce_text ol li {
\t\tmargin-bottom: <?= \$this->paragraphListMarginMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->customFont1Family): ?>
:root {
\t--customFont1: <?= \$this->customFont1Family; ?>;
\t--customFont1Weight: <?= \$this->customFont1Family_weight; ?>;
}
<?php endif; ?>

<?php if(\$this->customFont1FontSize): ?>
:root {
\t--customFont1FontSize: <?= \$this->customFont1FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->customFont1FontSizeMob): ?>
:root {
\t--customFont1FontSizeMob: <?= \$this->customFont1FontSizeMob; ?>px;
}
<?php endif; ?>

<?php if(\$this->customFont1LineHeight): ?>
:root {
\t--customFont1LineHeight: <?= \$this->customFont1LineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->customFont1LineHeightMob): ?>
:root {
\t--customFont1LineHeightMob: <?= \$this->customFont1LineHeightMob; ?>px;
}
<?php endif; ?>

<?php if(\$this->customfont1StrokeColor): ?>
:root {
\t--customFont1-stroke-color: <?= \$this->customfont1StrokeColor; ?>;
}
<?php endif; ?>

<?php if(\$this->customfont1StrokeWidth): ?>
:root {
\t--customFont1-stroke-width: <?= \$this->customfont1StrokeWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->customfont1Color): ?>
:root {
\t--customFont1-text-color: <?= \$this->customfont1Color; ?>;
}
<?php endif; ?>

<?php if(\$this->customfont1LetterSpacing): ?>
:root {
\t--customFont1-letter-spacing: <?= \$this->customfont1LetterSpacing; ?>px;
}
<?php endif; ?>

<?php if(\$this->customFont2Family): ?>
:root {
\t--customFont2: <?= \$this->customFont2Family; ?>;
\t--customFont2Weight: <?= \$this->customFont2Family_weight; ?>;
}
<?php endif; ?>

<?php if(\$this->customFont2FontSize): ?>
:root {
\t--customFont2FontSize: <?= \$this->customFont2FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->customFont2FontSizeMob): ?>
:root {
\t--customFont2FontSizeMob: <?= \$this->customFont2FontSizeMob; ?>px;
}
<?php endif; ?>

<?php if(\$this->customFont2LineHeight): ?>
:root {
\t--customFont2LineHeight: <?= \$this->customFont2LineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->customFont2LineHeightMob): ?>
:root {
\t--customFont2LineHeightMob: <?= \$this->customFont2LineHeightMob; ?>px;
}
<?php endif; ?>

<?php if(\$this->customfont2StrokeColor): ?>
:root {
\t--customFont2-stroke-color: <?= \$this->customfont2StrokeColor; ?>;
}
<?php endif; ?>

<?php if(\$this->customfont2StrokeWidth): ?>
:root {
\t--customFont2-stroke-width: <?= \$this->customfont2StrokeWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->customfont2Color): ?>
:root {
\t--customFont2-text-color: <?= \$this->customfont2Color; ?>;
}
<?php endif; ?>

<?php if(\$this->customfont2LetterSpacing): ?>
:root {
\t--customFont2-letter-spacing: <?= \$this->customfont2LetterSpacing; ?>px;
}
<?php endif; ?>


<?php if(\$this->listStyle1StyleNone): ?>
.ce_list ul {
\tlist-style: none;
\tpadding-left: 0;
}

.ce_list ul li i {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->listStyle1FontSize): ?>
.ce_list ul {
\tfont-size: <?= \$this->listStyle1FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle1Margin): ?>
.ce_list li {
\tpadding-top: <?= \$this->listStyle1Margin; ?>px;
\tpadding-bottom: <?= \$this->listStyle1Margin; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle1Padding): ?>
.ce_list ol,
.ce_list ul,
.ce_list.hasIcon ul,
.ce_list.hasIcon ol {
\tpadding-left: <?= \$this->listStyle1Padding; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle1MarginMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list li {
\t\tpadding-top: <?= \$this->listStyle1MarginMob; ?>px;
\t\tpadding-bottom: <?= \$this->listStyle1MarginMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listStyle1PaddingMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list ol,
\t.ce_list ul,
\t.ce_list.hasIcon ul,
\t.ce_list.hasIcon ol {
\t\tpadding-left: <?= \$this->listStyle1PaddingMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listStyle1FontSize): ?>
.ce_list:not(.style2):not(.style3):not(.customStyle1):not(.customStyle2) li {
\tfont-size: <?= \$this->listStyle1FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle1FontSizeMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list:not(.style2):not(.style3):not(.customStyle1):not(.customStyle2) li {
\t\tfont-size: <?= \$this->listStyle1FontSizeMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listStyle1FontWeight): ?>
.ce_list:not(.style2):not(.style3):not(.customStyle1):not(.customStyle2) li {
\tfont-weight: <?= \$this->listStyle1FontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->listStyle1LineHeight): ?>
.ce_list:not(.style2):not(.style3):not(.customStyle1):not(.customStyle2) li {
\tline-height: <?= \$this->listStyle1LineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle1LineHeightMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list:not(.style2):not(.style3):not(.customStyle1):not(.customStyle2) li {
\t\tline-height: <?= \$this->listStyle1LineHeightMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listStyle1Divider): ?>
.ce_list:not(.style2):not(.style3):not(.customStyle1):not(.customStyle2) li:after {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->listStyle2StyleNone): ?>
.ce_list.style2 ul {
\tlist-style: none;
\tpadding-left: 0;
}

.ce_list.style2 ul li i {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->listStyle2FontSize): ?>
.ce_list.style2 ul {
\tfont-size: <?= \$this->listStyle2FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle2Margin): ?>
.ce_list.style2 li {
\tpadding-top: <?= \$this->listStyle2Margin; ?>px;
\tpadding-bottom: <?= \$this->listStyle2Margin; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle2Padding): ?>
.ce_list.style2 ol,
.ce_list.style2 ul,
.ce_list.style2.hasIcon ul,
.ce_list.style2.hasIcon ol {
\tpadding-left: <?= \$this->listStyle2Padding; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle2MarginMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.style2 li {
\t\tpadding-top: <?= \$this->listStyle2MarginMob; ?>px;
\t\tpadding-bottom: <?= \$this->listStyle2MarginMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listStyle2PaddingMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.style2 ol,
\t.ce_list.style2 ul,
\t.ce_list.style2.hasIcon ul,
\t.ce_list.style2.hasIcon ol {
\t\tpadding-left: <?= \$this->listStyle2PaddingMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listStyle2FontSize): ?>
.ce_list.style2 li {
\tfont-size: <?= \$this->listStyle2FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle2FontSizeMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.style2 li {
\t\tfont-size: <?= \$this->listStyle2FontSizeMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listStyle2FontWeight): ?>
.ce_list.style2 li {
\tfont-weight: <?= \$this->listStyle2FontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->listStyle2LineHeight): ?>
.ce_list.style2 li {
\tline-height: <?= \$this->listStyle2LineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle2LineHeightMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.style2 li {
\t\tline-height: <?= \$this->listStyle2LineHeightMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listStyle3StyleNone): ?>
.ce_list.style3 ul {
\tlist-style: none;
\tpadding-left: 0;
}

.ce_list.style3 li i {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->listStyle3FontSize): ?>
.ce_list.style3 ul {
\tfont-size: <?= \$this->listStyle3FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle3Margin): ?>
.ce_list.style3 li {
\tpadding-top: <?= \$this->listStyle3Margin; ?>px;
\tpadding-bottom: <?= \$this->listStyle3Margin; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle3Padding): ?>
.ce_list.style3 ol,
.ce_list.style3 ul,
.ce_list.style3.hasIcon ul,
.ce_list.style3.hasIcon ol {
\tpadding-left: <?= \$this->listStyle3Padding; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle3MarginMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.style3 li {
\t\tpadding-top: <?= \$this->listStyle3MarginMob; ?>px;
\t\tpadding-bottom: <?= \$this->listStyle3MarginMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listStyle3PaddingMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.style3 ol,
\t.ce_list.style3 ul,
\t.ce_list.style3.hasIcon ul,
\t.ce_list.style3.hasIcon ol {
\t\tpadding-left: <?= \$this->listStyle3PaddingMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listStyle3FontSize): ?>
.ce_list.style3 li {
\tfont-size: <?= \$this->listStyle3FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle3FontSizeMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.style3 li {
\t\tfont-size: <?= \$this->listStyle3FontSizeMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listStyle3FontWeight): ?>
.ce_list.style3 li {
\tfont-weight: <?= \$this->listStyle3FontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->listStyle3LineHeight): ?>
.ce_list.style3 li {
\tline-height: <?= \$this->listStyle3LineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->listStyle3LineHeightMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.style3 li {
\t\tline-height: <?= \$this->listStyle3LineHeightMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listStyle3Divider): ?>
.ce_list.style3 li:after {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle1StyleNone): ?>
.ce_list.customStyle1 ul {
\tlist-style: none;
\tpadding-left: 0;
}

.ce_list.customStyle1 li i {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle1FontSize): ?>
.ce_list.customStyle1 ul {
\tfont-size: <?= \$this->listCustomStyle1FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle1Margin): ?>
.ce_list.customStyle1 li {
\tpadding-top: <?= \$this->listCustomStyle1Margin; ?>px;
\tpadding-bottom: <?= \$this->listCustomStyle1Margin; ?>px;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle1Padding): ?>
.ce_list.customStyle1 ol,
.ce_list.customStyle1 ul,
.ce_list.customStyle1.hasIcon ul,
.ce_list.customStyle1t.hasIcon ol {
\tpadding-left: <?= \$this->listCustomStyle1Padding; ?>px;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle1MarginMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.customStyle1 li {
\t\tpadding-top: <?= \$this->listCustomStyle1MarginMob; ?>px;
\t\tpadding-bottom: <?= \$this->listCustomStyle1MarginMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listCustomStyle1PaddingMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.customStyle1 ol,
\t.ce_list.customStyle1 ul,
\t.ce_list.customStyle1.hasIcon ul,
\t.ce_list.customStyle1t.hasIcon ol {
\t\tpadding-left: <?= \$this->listCustomStyle1PaddingMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listCustomStyle1FontSize): ?>
.ce_list.customStyle1 li {
\tfont-size: <?= \$this->listCustomStyle1FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle1FontSizeMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.customStyle1 li {
\t\tfont-size: <?= \$this->listCustomStyle1FontSizeMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listCustomStyle1FontWeight): ?>
.ce_list.customStyle1 li {
\tfont-weight: <?= \$this->listCustomStyle1FontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle1LineHeight): ?>
.ce_list.customStyle1 li {
\tline-height: <?= \$this->listCustomStyle1LineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle1LineHeightMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.customStyle1 li {
\t\tline-height: <?= \$this->listCustomStyle1LineHeightMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listCustomStyle1Divider): ?>
.ce_list.customStyle1 li:after {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle2StyleNone): ?>
.ce_list.customStyle2 ul {
\tlist-style: none;
\tpadding-left: 0;
}


.ce_list.customStyle2 li i {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle2FontSize): ?>
.ce_list.customStyle2 ul {
\tfont-size: <?= \$this->listCustomStyle2FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle2Margin): ?>
.ce_list.customStyle2 li {
\tpadding-top: <?= \$this->listCustomStyle2Margin; ?>px;
\tpadding-bottom: <?= \$this->listCustomStyle2Margin; ?>px;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle2Padding): ?>
.ce_list.customStyle2 ol,
.ce_list.customStyle2 ul,
.ce_list.customStyle2.hasIcon ul,
.ce_list.customStyle12.hasIcon ol {
\tpadding-left: <?= \$this->listCustomStyle2Padding; ?>px;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle2MarginMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.customStyle2 li {
\t\tpadding-top: <?= \$this->listCustomStyle2MarginMob; ?>px;
\t\tpadding-bottom: <?= \$this->listCustomStyle2MarginMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listCustomStyle2PaddingMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.customStyle2 ol,
\t.ce_list.customStyle2 ul,
\t.ce_list.customStyle2.hasIcon ul,
\t.ce_list.customStyle2.hasIcon ol {
\t\tpadding-left: <?= \$this->listCustomStyle2PaddingMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listCustomStyle2FontSize): ?>
.ce_list.customStyle2 li {
\tfont-size: <?= \$this->listCustomStyle2FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle2FontSizeMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.customStyle2 li {
\t\tfont-size: <?= \$this->listCustomStyle2FontSizeMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listCustomStyle2FontWeight): ?>
.ce_list.customStyle2 li {
\tfont-weight: <?= \$this->listCustomStyle2FontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle2LineHeight): ?>
.ce_list.customStyle2 li {
\tline-height: <?= \$this->listCustomStyle2LineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->listCustomStyle2LineHeightMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_list.customStyle2 li {
\t\tline-height: <?= \$this->listCustomStyle2LineHeightMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->listCustomStyle2Divider): ?>
.ce_list.customStyle2 li:after {
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderFontSize): ?>
.ce_table.table-custom1 tr th {
\tfont-size: <?= \$this->tableCustomStyle1HeaderFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderFontSizeMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_table.table-custom1 tr th {
\t\tfont-size: <?= \$this->tableCustomStyle1HeaderFontSizeMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderFontLineHeight): ?>
.ce_table.table-custom1 tr th {
\tline-height: <?= \$this->tableCustomStyle1HeaderFontLineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderFontLineHeightMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_table.table-custom1 tr th {
\t\tline-height: <?= \$this->tableCustomStyle1HeaderFontLineHeightMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderFontWeight): ?>
.ce_table.table-custom1 tr th {
\tfont-weight: <?= \$this->tableCustomStyle1HeaderFontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderLastColumRight): ?>
.ce_table.table-custom1 tr th:last-child {
\ttext-align: right;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderColorFont): ?>
.ce_table.table-custom1 tr th {
\tcolor: <?= \$this->tableCustomStyle1HeaderColorFont; ?>;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderColorBg): ?>
.ce_table.table-custom1 tr th {
\tbackground-color: <?= \$this->tableCustomStyle1HeaderColorBg; ?>;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderPaddingLeft): ?>
.ce_table.table-custom1 tr th {
\tpadding-left: <?= \$this->tableCustomStyle1HeaderPaddingLeft; ?>px;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderPaddingLeftMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_table.table-custom1 tr th {
\t\tpadding-left: <?= \$this->tableCustomStyle1HeaderPaddingLeftMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderPaddingRight): ?>
.ce_table.table-custom1 tr th {
\tpadding-right: <?= \$this->tableCustomStyle1HeaderPaddingRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderPaddingRightMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_table.table-custom1 tr th {
\t\tpadding-right: <?= \$this->tableCustomStyle1HeaderPaddingRightMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderPaddingTop): ?>
.ce_table.table-custom1 tr th {
\tpadding-top: <?= \$this->tableCustomStyle1HeaderPaddingTop; ?>px;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderPaddingTopMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_table.table-custom1 tr th {
\t\tpadding-top: <?= \$this->tableCustomStyle1HeaderPaddingTopMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderPaddingBottom): ?>
.ce_table.table-custom1 tr th {
\tpadding-bottom: <?= \$this->tableCustomStyle1HeaderPaddingBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderPaddingBottomMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_table.table-custom1 tr th {
\t\tpadding-bottom: <?= \$this->tableCustomStyle1HeaderPaddingBottomMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderBorderLeftRight): ?>
.ce_table.table-custom1 tr th {
\tborder-left-width: <?= \$this->tableCustomStyle1HeaderBorderLeftRight; ?>px;
\tborder-left-style: solid;
\tborder-color: var(--tableCustom1HeaderBorderColor);
}

.ce_table.table-custom1 tr th:last-child {
\tborder-right-width: <?= \$this->tableCustomStyle1HeaderBorderLeftRight; ?>px;
\tborder-right-style: solid;
\tborder-color: var(--tableCustom1HeaderBorderColor);
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderBorderLeftRightV2): ?>
.ce_table.table-custom1 tr th {
\tborder-left-width: <?= \$this->tableCustomStyle1HeaderBorderLeftRightV2; ?>px;
\tborder-left-style: solid;
\tborder-color: var(--tableCustom1HeaderBorderColor);
}

.ce_table.table-custom1 tr th:first-child {
\tborder-left-width: 0;
}

.ce_table.table-custom1 tr th:last-child {
\tborder-right-width: 0;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderBorderTop): ?>
.ce_table.table-custom1 tr th {
\tborder-top-width: <?= \$this->tableCustomStyle1HeaderBorderTop; ?>px;
\tborder-top-style: solid;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderBorderColor): ?>
:root {
\t--tableCustom1HeaderBorderColor: <?= \$this->tableCustomStyle1HeaderBorderColor; ?>
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1HeaderBorderBottom): ?>
.ce_table.table-custom1 tr th {
\tborder-bottom-width: <?= \$this->tableCustomStyle1HeaderBorderBottom; ?>px;
\tborder-bottom-style: solid;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyFontSize): ?>
.ce_table.table-custom1 tr td {
\tfont-size: <?= \$this->tableCustomStyle1BodyFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyFontSizeMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_table.table-custom1 tr td {
\t\tfont-size: <?= \$this->tableCustomStyle1BodyFontSizeMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyFontLineHeight): ?>
.ce_table.table-custom1 tr td {
\tline-height: <?= \$this->tableCustomStyle1BodyFontLineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyFontLineHeightMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_table.table-custom1 tr td {
\t\tline-height: <?= \$this->tableCustomStyle1BodyFontLineHeightMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyFontWeight): ?>
.ce_table.table-custom1 tr td {
\tfont-weight: <?= \$this->tableCustomStyle1BodyFontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyLastColumRight): ?>
.ce_table.table-custom1 tr td:last-child {
\ttext-align: right;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyColorFont): ?>
.ce_table.table-custom1 tr td {
\tcolor: <?= \$this->tableCustomStyle1BodyColorFont; ?>;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyColorBg): ?>
.ce_table.table-custom1 tr td {
\tbackground-color: <?= \$this->tableCustomStyle1BodyColorBg; ?>;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyPaddingLeft): ?>
.ce_table.table-custom1 tr td {
\tpadding-left: <?= \$this->tableCustomStyle1BodyPaddingLeft; ?>px;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyPaddingLeftMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_table.table-custom1 tr td {
\t\tpadding-left: <?= \$this->tableCustomStyle1BodyPaddingLeftMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyPaddingRight): ?>
.ce_table.table-custom1 tr td {
\tpadding-right: <?= \$this->tableCustomStyle1BodyPaddingRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyPaddingRightMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_table.table-custom1 tr td {
\t\tpadding-right: <?= \$this->tableCustomStyle1BodyPaddingRightMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyPaddingTop): ?>
.ce_table.table-custom1 tr td {
\tpadding-top: <?= \$this->tableCustomStyle1BodyPaddingTop; ?>px;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyPaddingTopMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_table.table-custom1 tr td {
\t\tpadding-top: <?= \$this->tableCustomStyle1BodyPaddingTopMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyPaddingBottom): ?>
.ce_table.table-custom1 tr td {
\tpadding-bottom: <?= \$this->tableCustomStyle1BodyPaddingBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyPaddingBottomMob): ?>
@media only screen and (max-width: 767px) {
\t.ce_table.table-custom1 tr td {
\t\tpadding-bottom: <?= \$this->tableCustomStyle1BodyPaddingBottomMob; ?>px;
\t}
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyBorderLeftRight): ?>
.ce_table.table-custom1 tr td {
\tborder-left-width: <?= \$this->tableCustomStyle1BodyBorderLeftRight; ?>px;
\tborder-left-style: solid;
\tborder-color: var(--tableCustom1BodyBorderColor);
}

.ce_table.table-custom1 tr td:last-child {
\tborder-right-width: <?= \$this->tableCustomStyle1BodyBorderLeftRight; ?>px;
\tborder-right-style: solid;
\tborder-color: var(--tableCustom1BodyBorderColor);
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyBorderLeftRightV2): ?>
.ce_table.table-custom1 tr td {
\tborder-left-width: <?= \$this->tableCustomStyle1BodyBorderLeftRightV2; ?>px;
\tborder-left-style: solid;
\tborder-color: var(--tableCustom1BodyBorderColor);
}

.ce_table.table-custom1 tr td:first-child {
\tborder-left-width: 0;
}

.ce_table.table-custom1 tr td:last-child {
\tborder-right-width: 0;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyBorderTop): ?>
.ce_table.table-custom1 tr td {
\tborder-top-width: <?= \$this->tableCustomStyle1BodyBorderTop; ?>px;
\tborder-top-style: solid;
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyBorderColor): ?>
:root {
\t--tableCustom1BodyBorderColor: <?= \$this->tableCustomStyle1BodyBorderColor; ?>
}
<?php endif; ?>

<?php if(\$this->tableCustomStyle1BodyBorderBottom): ?>
.ce_table.table-custom1 tr td {
\tborder-bottom-width: <?= \$this->tableCustomStyle1BodyBorderBottom; ?>px;
\tborder-bottom-style: solid;
}
<?php endif; ?>


<?php if(\$this->linkDefaultFontSize): ?>
:root {
\t--hyperlink-default-font-size: <?= \$this->linkDefaultFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkDefaultFontWeight): ?>
:root {
\t--hyperlink-default-font-weight: <?= \$this->linkDefaultFontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->linkDefaultLineHeight): ?>
:root {
\t--hyperlink-default-line-height: <?= \$this->linkDefaultLineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkDefaultPaddingLeftRight): ?>
:root {
\t--hyperlink-default-padding-left: <?= \$this->linkDefaultPaddingLeftRight; ?>px;
\t--hyperlink-default-padding-right: <?= \$this->linkDefaultPaddingLeftRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkDefaultPaddingTopBottom): ?>
:root {
\t--hyperlink-default-padding-top: <?= \$this->linkDefaultPaddingTopBottom; ?>px;
\t--hyperlink-default-padding-bottom: <?= \$this->linkDefaultPaddingTopBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkDefaultBorderWidth): ?>
:root {
\t--hyperlink-default-border-width: <?= \$this->linkDefaultBorderWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkDefaultMinWidth): ?>
:root {
\t--hyperlink-default-min-width: <?= \$this->linkDefaultMinWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkSmallFontSize): ?>
:root {
\t--hyperlink-small-font-size: <?= \$this->linkSmallFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkSmallFontWeight): ?>
:root {
\t--hyperlink-small-font-weight: <?= \$this->linkSmallFontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->linkSmallLineHeight): ?>
:root {
\t--hyperlink-small-line-height: <?= \$this->linkSmallLineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkSmallPaddingLeftRight): ?>
:root {
\t--hyperlink-small-padding-left: <?= \$this->linkSmallPaddingLeftRight; ?>px;
\t--hyperlink-small-padding-right: <?= \$this->linkSmallPaddingLeftRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkSmallPaddingTopBottom): ?>
:root {
\t--hyperlink-small-padding-top: <?= \$this->linkSmallPaddingTopBottom; ?>px;
\t--hyperlink-small-padding-bottom: <?= \$this->linkSmallPaddingTopBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkSmallBorderWidth): ?>
:root {
\t--hyperlink-small-border-width: <?= \$this->linkSmallBorderWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkSmallMinWidth): ?>
:root {
\t--hyperlink-small-min-width: <?= \$this->linkSmallMinWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkMediumFontSize): ?>
:root {
\t--hyperlink-medium-font-size: <?= \$this->linkMediumFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkMediumFontWeight): ?>
:root {
\t--hyperlink-medium-font-weight: <?= \$this->linkMediumFontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->linkMediumLineHeight): ?>
:root {
\t--hyperlink-medium-line-height: <?= \$this->linkMediumLineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkMediumPaddingLeftRight): ?>
:root {
\t--hyperlink-medium-padding-left: <?= \$this->linkMediumPaddingLeftRight; ?>px;
\t--hyperlink-medium-padding-right: <?= \$this->linkMediumPaddingLeftRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkMediumPaddingTopBottom): ?>
:root {
\t--hyperlink-medium-padding-top: <?= \$this->linkMediumPaddingTopBottom; ?>px;
\t--hyperlink-medium-padding-bottom: <?= \$this->linkMediumPaddingTopBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkMediumBorderWidth): ?>
:root {
\t--hyperlink-medium-border-width: <?= \$this->linkMediumBorderWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkMediumMinWidth): ?>
:root {
\t--hyperlink-medium-min-width: <?= \$this->linkMediumMinWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkLargeFontSize): ?>
:root {
\t--hyperlink-large-font-size: <?= \$this->linkLargeFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkLargeFontWeight): ?>
:root {
\t--hyperlink-large-font-weight: <?= \$this->linkLargeFontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->linkLargeLineHeight): ?>
:root {
\t--hyperlink-large-line-height: <?= \$this->linkLargeLineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkLargePaddingLeftRight): ?>
:root {
\t--hyperlink-large-padding-left: <?= \$this->linkLargePaddingLeftRight; ?>px;
\t--hyperlink-large-padding-right: <?= \$this->linkLargePaddingLeftRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkLargePaddingTopBottom): ?>
:root {
\t--hyperlink-large-padding-top: <?= \$this->linkLargePaddingTopBottom; ?>px;
\t--hyperlink-large-padding-bottom: <?= \$this->linkLargePaddingTopBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkLargeBorderWidth): ?>
:root {
\t--hyperlink-large-border-width: <?= \$this->linkLargeBorderWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkLargeMinWidth): ?>
:root {
\t--hyperlink-large-min-width: <?= \$this->linkLargeMinWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle1FontSize): ?>
:root {
\t--ce_customlink-style1-font-size: <?= \$this->linkCustomStyle1FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle1FontWeight): ?>
:root {
\t--ce_customlink-style1-font-weight: <?= \$this->linkCustomStyle1FontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle1LineHeight): ?>
:root {
\t--ce_customlink-style1-line-height: <?= \$this->linkCustomStyle1LineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle1PaddingLeftRight): ?>
:root {
\t--ce_customlink-style1-padding-lr: <?= \$this->linkCustomStyle1PaddingLeftRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle1PaddingTopBottom): ?>
:root {
\t--ce_customlink-style1-padding-tb: <?= \$this->linkCustomStyle1PaddingTopBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle1BorderWidth): ?>
:root {
\t--ce_customlink-style1-border-width: <?= \$this->linkCustomStyle1BorderWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle1BorderRadius): ?>
:root {
\t--ce_customlink-style1-border-radius: <?= \$this->linkCustomStyle1BorderRadius; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle1BorderColor): ?>
:root {
\t--ce_customlink-style1-border-color: <?= \$this->linkCustomStyle1BorderColor; ?>;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle1BgColor): ?>
:root {
\t--ce_customlink-style1-bg-color: <?= \$this->linkCustomStyle1BgColor; ?>;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle1Color): ?>
:root {
\t--ce_customlink-style1-color: <?= \$this->linkCustomStyle1Color; ?>;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle1MinWidth): ?>
:root {
\t--ce_customlink-style1-min-width: <?= \$this->linkCustomStyle1MinWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle2FontSize): ?>
:root {
\t--ce_customlink-style2-font-size: <?= \$this->linkCustomStyle2FontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle2FontWeight): ?>
:root {
\t--ce_customlink-style2-font-weight: <?= \$this->linkCustomStyle2FontWeight; ?>;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle2LineHeight): ?>
:root {
\t--ce_customlink-style2-line-height: <?= \$this->linkCustomStyle2LineHeight; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle2PaddingLeftRight): ?>
:root {
\t--ce_customlink-style2-padding-lr: <?= \$this->linkCustomStyle2PaddingLeftRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle2PaddingTopBottom): ?>
:root {
\t--ce_customlink-style2-padding-tb: <?= \$this->linkCustomStyle2PaddingTopBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle2BorderWidth): ?>
:root {
\t--ce_customlink-style2-border-width: <?= \$this->linkCustomStyle2BorderWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle2BorderRadius): ?>
:root {
\t--ce_customlink-style2-border-radius: <?= \$this->linkCustomStyle2BorderRadius; ?>px;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle2BorderColor): ?>
:root {
\t--ce_customlink-style2-border-color: <?= \$this->linkCustomStyle2BorderColor; ?>;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle2BgColor): ?>
:root {
\t--ce_customlink-style2-bg-color: <?= \$this->linkCustomStyle2BgColor; ?>;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle2Color): ?>
:root {
\t--ce_customlink-style2-color: <?= \$this->linkCustomStyle2Color; ?>;
}
<?php endif; ?>

<?php if(\$this->linkCustomStyle2MinWidth): ?>
:root {
\t--ce_customlink-style2-min-width: <?= \$this->linkCustomStyle2MinWidth; ?>px;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle1BorderColor): ?>
.ce_image.customStyle1 figure img {
\tborder-color: <?= \$this->imageCustomStyle1BorderColor; ?>;
\tborder-width: 1px;
\tborder-style: solid;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle1BorderWidth): ?>
.ce_image.customStyle1 figure img {
\tborder-width: <?= \$this->imageCustomStyle1BorderWidth; ?>px;
\tborder-style: solid;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle1BorderRadiusTopLeft): ?>
.ce_image.customStyle1 figure img {
\tborder-top-left-radius: <?= \$this->imageCustomStyle1BorderRadiusTopLeft; ?>px;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle1BorderRadiusTopRight): ?>
.ce_image.customStyle1 figure img {
\tborder-top-right-radius: <?= \$this->imageCustomStyle1BorderRadiusTopRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle1BorderRadiusBottomLeft): ?>
.ce_image.customStyle1 figure img {
\tborder-bottom-left-radius: <?= \$this->imageCustomStyle1BorderRadiusBottomLeft; ?>px;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle1BorderRadiusBottomRight): ?>
.ce_image.customStyle1 figure img {
\tborder-bottom-right-radius: <?= \$this->imageCustomStyle1BorderRadiusBottomRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle1Padding): ?>
.ce_image.customStyle1 figure img {
\tpadding: <?= \$this->imageCustomStyle1Padding; ?>px;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle2BorderColor): ?>
.ce_image.customStyle2 figure img {
\tborder-color: <?= \$this->imageCustomStyle2BorderColor; ?>;
\tborder-width: 1px;
\tborder-style: solid;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle2BorderWidth): ?>
.ce_image.customStyle2 figure img {
\tborder-width: <?= \$this->imageCustomStyle2BorderWidth; ?>px;
\tborder-style: solid;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle2BorderRadiusTopLeft): ?>
.ce_image.customStyle2 figure img {
\tborder-top-left-radius: <?= \$this->imageCustomStyle2BorderRadiusTopLeft; ?>px;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle2BorderRadiusTopRight): ?>
.ce_image.customStyle2 figure img {
\tborder-top-right-radius: <?= \$this->imageCustomStyle2BorderRadiusTopRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle2BorderRadiusBottomLeft): ?>
.ce_image.customStyle2 figure img {
\tborder-bottom-left-radius: <?= \$this->imageCustomStyle2BorderRadiusBottomLeft; ?>px;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle2BorderRadiusBottomRight): ?>
.ce_image.customStyle2 figure img {
\tborder-bottom-right-radius: <?= \$this->imageCustomStyle2BorderRadiusBottomRight; ?>px;
}
<?php endif; ?>

<?php if(\$this->imageCustomStyle2Padding): ?>
.ce_image.customStyle2 figure img {
\tpadding: <?= \$this->imageCustomStyle2Padding; ?>px;
}
<?php endif; ?>


<?php if(\$this->mmenuLeft): ?>
#mmenu {
\tleft: 0;
\tright: auto;
\tbottom: 0;
\ttransform: translateY(0)!important;
\ttransform: translateX(-100%)!important;
}
<?php endif; ?>

<?php if(\$this->mmenuRight): ?>
#mmenu {
\tright: 0;
\tbottom: 0;
\tleft: auto;
\ttransform: translateY(0)!important;
\ttransform: translateX(100%)!important;
}
<?php endif; ?>

<?php if(\$this->mmenuTop): ?>
#mmenu {
\tbackground: none!important;
}

#mmenu #mmenu_bottom {
\tposition: static;
}
<?php endif; ?>

<?php if(\$this->mmenuTopFullscreen): ?>
#mmenu {
\tbottom: 0;
}
<?php endif; ?>


<?php if(\$this->mmenuHorizontal): ?>
#mmenu nav.mobile_vertical {
\tdisplay: none;
}

#mmenu nav.mobile_horizontal {
\tdisplay: block;
}

<?php endif; ?>

<?php if(\$this->mmenuFontFamily): ?>
#mmenu .mod_navigation li a {
\tfont-family: <?= \$this->mmenuFontFamily; ?>;
\tfont-weight: <?= \$this->mmenuFontFamily_weight; ?>;
}
<?php endif; ?>

<?php if(\$this->mmenuFontSize): ?>
:root {
\t--menu-highlight-font-size-mobile: <?= \$this->mmenuFontSize; ?>px;
}
#mmenu .mod_navigation li a {
\tfont-size: <?= \$this->mmenuFontSize; ?>px;
}

#mmenu .mod_navigation li.submenu .opener {
\twidth: calc(<?= \$this->mmenuFontSize; ?>px + 10px);
}
<?php endif; ?>

<?php if(\$this->mmenuLineHeight): ?>
#mmenu .mod_navigation li a {
\tline-height: <?= \$this->mmenuLineHeight; ?>px;
}

#mmenu .mod_navigation li.submenu .opener {
\theight: calc(<?= \$this->mmenuLineHeight; ?>px + 5px);
}
<?php endif; ?>

<?php if(\$this->mmenuSubmenuFontSize): ?>
#mmenu .mod_navigation li ul li a {
\tfont-size: <?= \$this->mmenuSubmenuFontSize; ?>px;
}

#mmenu .mod_navigation .level_2 li.submenu .opener {
\twidth: calc(<?= \$this->mmenuSubmenuFontSize; ?>px + 13px);
}
<?php endif; ?>

<?php if(\$this->mmenuSubmenuLineHeight): ?>
#mmenu .mod_navigation li ul li a {
\tline-height: <?= \$this->mmenuSubmenuLineHeight; ?>px;
}

#mmenu .mod_navigation .level_2 li.submenu .opener {
\theight: calc(<?= \$this->mmenuSubmenuLineHeight; ?>px + 5px);
}
<?php endif; ?>

<?php if(\$this->mmenuUppercase): ?>
#mmenu .mod_navigation li a {
\ttext-transform: uppercase;
}
<?php endif; ?>

<?php if(\$this->mmenuAlignCenter): ?>
#mmenu .mod_navigation li,
#mmenu .mod_navigation li a {
\ttext-align: center;
\tpadding: 4px 0;
}
<?php endif; ?>

<?php if(\$this->mmenuHighlightPaddingLR): ?>
:root {
\t--menu-highlight-padding-lr-mobile: <?= \$this->mmenuHighlightPaddingLR; ?>px;
}
<?php endif; ?>

<?php if(\$this->mmenuHighlightPaddingTB): ?>
:root {
\t--menu-highlight-padding-tb-mobile: <?= \$this->mmenuHighlightPaddingTB; ?>px;
}
<?php endif; ?>

<?php if(\$this->mmenuHighlightMarginTop): ?>
:root {
\t--menu-highlight-margin-top-mobile: <?= \$this->mmenuHighlightMarginTop; ?>px;
}
<?php endif; ?>

<?php if(\$this->mmenuHighlightMarginBottom): ?>
:root {
\t--menu-highlight-margin-bottom-mobile: <?= \$this->mmenuHighlightMarginBottom; ?>px;
}
<?php endif; ?>

<?php if(\$this->mmenuHighlightFontSize): ?>
:root {
\t--menu-highlight-font-size-mobile: <?= \$this->mmenuHighlightFontSize; ?>px;
}
<?php endif; ?>

<?php if(\$this->mmenuBackgroundColor): ?>
#mmenu {
\tbackground-color: <?= \$this->mmenuBackgroundColor; ?>;
}

#mmenu .mod_langswitcher ul {
\tbackground-color: <?= \$this->mmenuBackgroundColor; ?>;
}
<?php endif; ?>

<?php if(\$this->mmenuBackgroundImage): ?>
#mmenu {
\tbackground-image: url(<?= \$this->mmenuBackgroundImage->file; ?>);
}
<?php endif; ?>

<?php if(\$this->mmenuColor): ?>
#mmenu .mod_navigation li a,
#mmenu .mod_socials a,
#mmenu .mod_mmenu_custom_nav a,
#mmenu #mmenu_bottom .mod_langswitcher ul li span {
\tcolor: <?= \$this->mmenuColor; ?>;
}

#mmenu .mod_search input {
\tcolor: <?= \$this->mmenuColor; ?>;
}

#mmenu .mod_langswitcher .mod_langswitcher_inside:after {
\tcolor: <?= \$this->mmenuColor; ?>;
}

#mmenu .mod_langswitcher .mod_langswitcher_inside:before {
\tborder-color: <?= \$this->mmenuColor; ?>;
}
<?php endif; ?>

<?php if(\$this->mmenuActiveColor): ?>
#mmenu .mod_navigation li a.open, #mmenu .mod_navigation li a.active {
\tcolor: <?= \$this->mmenuActiveColor; ?>;
}
<?php endif; ?>

<?php if(\$this->mmenuSocials): ?>
#mmenu .mod_socials {
\tdisplay: none;
}

#mmenu .scrollable {
\theight: 100%;
}
<?php endif; ?>

<?php if(\$this->mmenuSocialsSize): ?>
#mmenu #mmenu_bottom .mod_socials a i {
\tline-height: <?= \$this->mmenuSocialsSize; ?>px;
\tfont-size: <?= \$this->mmenuSocialsSize; ?>px;
\twidth: calc(<?= \$this->mmenuSocialsSize; ?>px + 10px);
\theight: calc(<?= \$this->mmenuSocialsSize; ?>px + 10px);
}
<?php endif; ?>

<?php if(\$this->mmenuSocialsBorder): ?>
#mmenu .mod_socials {
\tborder-color: <?= \$this->mmenuSocialsBorder; ?>;
}
<?php endif; ?>


<?php if(\$this->mmenuLangswitch): ?>
#mmenu .mod_langswitcher {
\tdisplay: none;
}

#mmenu .mod_search {
\twidth: 100%;
}
<?php endif; ?>

<?php if(\$this->mmenuIconBackground): ?>
#mmenu .mod_navigation li.submenu .opener {
\tbackground-color: <?= \$this->mmenuIconBackground; ?>;
}
<?php endif; ?>

<?php if(\$this->mmenuIcon1): ?>
#mmenu .mod_navigation li a.submenu:after {
\tcontent: \"+\";
\tfont-family: Arial, Verdana, sans-serif;
}
<?php endif; ?>

<?php if(\$this->mmenuIcon2): ?>
#mmenu .mod_navigation li a.submenu:after {
\tcontent: \"\";
\tdisplay: none;
}
<?php endif; ?>

<?php if(\$this->mmenuCustomMenuLineHeight): ?>
#mmenu .mod_mmenu_custom_nav a {
\tline-height: <?= \$this->mmenuCustomMenuLineHeight; ?>px;
}
<?php endif; ?>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/css/stylesheet.html5";
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
        return new Source("", "@pct_themer/themedesigner/css/stylesheet.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/css/stylesheet.html5");
    }
}
