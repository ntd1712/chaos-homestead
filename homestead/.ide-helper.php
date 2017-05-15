<?php

namespace
{
    phpinfo();
    die('This file should not be included, only analyzed by your IDE');

    class JRegistry extends \Joomla\Registry\Registry {}

    abstract class JRegistryFormat extends \Joomla\Registry\AbstractRegistryFormat {}

    class JRegistryFormatIni extends \Joomla\Registry\Format\Ini {}

    class JRegistryFormatJson extends \Joomla\Registry\Format\Json {}

    class JRegistryFormatPhp extends \Joomla\Registry\Format\Php {}

    class JRegistryFormatXml extends \Joomla\Registry\Format\Xml {}

    class JStringInflector extends \Joomla\String\Inflector {}

    class JStringNormalise extends \Joomla\String\Normalise {}

    class JApplicationWebClient extends \Joomla\Application\Web\WebClient {}
}