<?php

/**
 * @return boolean true if PHP is thread safe
 */
function isThreadSafe()
{
    ob_start();
    phpinfo(INFO_GENERAL);
    return preg_match('/Thread\s*Safety\s*enabled/i', strip_tags(ob_get_clean()));
}



/**
 * @return string as architecture
 */
function whatArchitecture()
{
    if (2147483647 == PHP_INT_MAX) {
        return 'i386 (x86) 32-bit';
    }

    return 'amd64 (x64) 64-bit';
}



/**
 * @return string as result
 */
function exampleYaml()
{
    if (function_exists("yaml_emit")) {
        return yaml_emit(["a" => "b", "c" => "d"]);
    }
    return "Function yaml_emit() does not exists.";
}



// Check what system is running
echo "<h1>Installation of php-yaml</h1>";
echo "<h2>System environment</h2>";
echo "<p>PHP version is: " . phpversion();
echo "<p>Thread safety is: " . (isThreadSafe() ? "ON" : "OFF");
echo "<p>Architecture is: " . whatArchitecture();



// Status of Apache and php-yaml
echo "<h2>Check status of php-yaml (Apache)</h2>";
echo "<p>The php.ini-file is: <code>" . php_ini_loaded_file() . "</code>";

$yes = "<span style='color: green'>YES</span>";
$no = "<span style='color: red'>NO</span>";
$loaded = extension_loaded("yaml") ? $yes : $no;
echo "<p>The extension php-yaml is loaded: $loaded";
echo "<p>Testing function <code>yaml_emit()</code>.<pre>" . exampleYaml() . "</pre>";


// Status of php-cli and php-yaml
echo "<h2>Check status of php-yaml (php cli)</h2>";
echo "<p>Trying to detect php.ini for PHP CLI.";
$phpini = system("php -r \"echo php_ini_loaded_file();\"");
echo "<p>The php.ini-file is: <code>$phpini</code>";

echo "<p>Trying to detect if php-yaml is loaded for PHP CLI.";
$loaded = system("php -r \"echo extension_loaded('yaml');\"") ? $yes : $no;
echo "<p>The extension php-yaml is loaded: $loaded";

echo "<p>Testing function <code>yaml_emit()</code>.";
$code = <<<'EOD'
function exampleYaml()
{
    if (function_exists('yaml_emit')) {
        return yaml_emit(['a' => 'b', 'c' => 'd']);
    }
    return 'Function yaml_emit() does not exists.';
}
echo exampleYaml();
EOD;

$code = trim(preg_replace('/\s+/', ' ', $code));
$output = [];
$result = exec("php -r \"$code\"", $output);
echo "<pre>" . implode("\n", $output) . "</pre>";
