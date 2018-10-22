<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?><h1>View development details</h1>

<p>When working with a view you can access variables that are sent to the view from the route handler, or from the frontmatter. You will also have helper functions available. You can view all these by calling the following function.</p>

<pre>
// Show incoming variables and view helper functions
echo showEnvironment(get_defined_vars(), get_defined_functions());
</pre>

<p>The output will look something like this and may be useful for debugging and development.</p>

<?= showEnvironment(get_defined_vars(), get_defined_functions());
