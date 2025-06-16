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

/* @pct_customelements_plugin_customcatalog/attributes/customelement_attr_googlemap.html5 */
class __TwigTemplate_10ae1d3576b4300d647713c4ab499f15 extends Template
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
 * Custom elements geolocation attribute googlemaps template
 */
?>

<?php

/**
 * To use google maps, please fill in your Google Maps API Key below
 */
\$GoogleMapsApiKey = '';


/**
 * DO NOT EDIT ANYTHING BELOW THIS LINE UNLESS YOU KNOW WHAT YOU ARE DOING!
 */
if(strlen(\$GoogleMapsApiKey) < 1)
{
\techo (\$GLOBALS['TL_LANGUAGE'] == 'de' ? 'Google Maps API Schlüssel benötigt. Bitte tragen Sie den API Schlüssel im Template customelement_attr_googlemap.html5 ein' : 'Google Maps requires a valid API Key!');\t
\treturn '';
}
?>

<?php
\$GLOBALS['TL_JAVASCRIPT'][] = '//maps.googleapis.com/maps/api/js?v=3.exp&key='.\$GoogleMapsApiKey;\t
\$strStyle = (\$this->size[0] > 0 ? 'width:'.\$this->size[0].'px;':'').(\$this->size[1] > 0 ? 'height:'.\$this->size[1].'px;' : '');
?>

<div id=\"<?php echo \$this->selector; ?>\" <?php if(\$this->class): ?>class=\"<?php echo \$this->class; ?>\"<?php endif; ?> <?php if(\$strStyle): ?>style=\"<?php echo \$strStyle; ?>\"<?php endif;?>>

<script>
/**
 * Initialize the googlemap
 */
function initializeMap() {

\tvar address = '<?php echo \$this->formattedAddress; ?>';
\t
\tvar mapOptions = 
\t{
\t\tzoom: 15,
\t\t<?php if(\$this->hasCoordinates): ?>
\t\tcenter: new google.maps.LatLng(<?php echo \$this->latitude; ?>, <?php echo \$this->longitude; ?>),
\t\t<?php endif; ?>
\t\tscrollwheel: false,
\t\tmapTypeId: google.maps.MapTypeId.ROADMAP
\t};
\t
\tvar map = new google.maps.Map(document.getElementById('<?php echo \$this->selector; ?>'),mapOptions);
\t
\t<?php if(\$this->hasCoordinates): ?>
\t
\t    var pos = {lat:<?php echo \$this->latitude; ?>, lng:<?php echo \$this->longitude; ?>};
\t    map.setCenter(pos);
\t    var marker = new google.maps.Marker({
\t        map: map,
\t        position: pos
\t    });
\t
\t<?php else: ?>\t
\t\t
\t\tvar geocoder = new google.maps.Geocoder;
\t\tvar geocoderOptions = {};
\t\tgeocoderOptions.address = address;
\t\t
\t\tgeocoder.geocode(geocoderOptions, function(results, status) 
\t\t{
\t\t\tif (status == google.maps.GeocoderStatus.OK) 
\t\t\t{
\t\t\t\tmap.setCenter(results[0].geometry.location);
\t\t\t\tvar marker = new google.maps.Marker(
\t\t\t\t{
\t\t\t\t  \tmap: map,
\t\t\t\t  \tposition: results[0].geometry.location
\t\t\t\t});
\t\t\t} 
\t\t\telse 
\t\t\t{
\t\t\t\tconsole.log('<?php echo \$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC']['mapLocationNotFound']; ?>');
\t\t\t}
\t\t});

\t<?php endif; ?>
}

google.maps.event.addDomListener(window, 'load', initializeMap);

</script>


</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/attributes/customelement_attr_googlemap.html5";
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
        return new Source("", "@pct_customelements_plugin_customcatalog/attributes/customelement_attr_googlemap.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/attributes/customelement_attr_googlemap.html5");
    }
}
